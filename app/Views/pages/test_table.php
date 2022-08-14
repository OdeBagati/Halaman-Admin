<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-2 text-left">
                    <a class="btn btn-primary" href="#"><i class="fa fa-refresh"></i>&nbsp;Rekonsiliasi</a>
                </div>

                <div class="col-8">
                    <form action="<?= base_url('transaksi/download'); ?>" method="post">
                        <div class="row">
                            <div class="col-4">
                                <?= csrf_field(); ?>
                                <select class="form-control custom-select">
                                    <option selected="selected" disabled>Download for</option>
                                    <option value="1">one month</option>
                                    <option value="2">one day</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <input type="date" name="date" class="form-control">
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-primary">Download</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tgl. Transaksi</th>
                            <th>Biller</th>
                            <th>TrxID</th>
                            <th>BillID</th>
                            <th>Total Bayar</th>
                            <th>Detail</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tgl. Transaksi</th>
                            <th>Biller</th>
                            <th>TrxID</th>
                            <th>BillID</th>
                            <th>Total Bayar</th>
                            <th>Detail</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($response as $key => $transaksi) : ?>
                            <tr>
                                <td><?= (string)$transaksi->ts; ?></td>
                                <td><?= $transaksi->trx_type; ?></td>
                                <td><?= $transaksi->trx_id; ?></td>
                                <td><?= $transaksi->product_code; ?></td>
                                <td>Rp. <?= number_format($transaksi->amount, 0, ',', '.'); ?></td>
                                <td>
                                    <div class="row">
                                        <div class="col-12">
                                            <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-fw fa-eye"></i> Detail</a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <?php if ($transaksi->status == 'rejected') : ?>
                                        <span class="badge badge-danger"><?= $transaksi->status; ?></span>
                                    <?php elseif ($transaksi->status == 'unpaid') : ?>
                                        <span class="badge badge-warning"><?= $transaksi->status; ?></span>
                                    <?php else : ?>
                                        <span class="badge badge-success"><?= $transaksi->status; ?></span>
                                    <?php endif; ?>
                                </td>
                                <?php if ($transaksi->status != 'rejected' && $transaksi->status != 'done') : ?>
                                    <td>
                                        <form action="changeStatus/<?= $transaksi->trx_id; ?>" id="ubahStatus" method="post">
                                            <?= csrf_field(); ?>
                                            <button type="submit" name="status" class="btn btn-success btn-sm" value="flag"><i class="fas fa-fw fa-check"></i>&nbsp;Accept</button>
                                            <button type="submit" name="status" class="btn btn-danger btn-sm" value="reject"><i class="fas fa-fw fa-times"></i>&nbsp;Reject</button>
                                            <input type="hidden" name="amount" value="<?= $transaksi->amount; ?>">
                                        </form>
                                    </td>
                                <?php else : ?>
                                    <td></td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function changeStatus(id, amount) {
            console.log(id);
            $.ajax({
                type: "POST", //type of method
                url: "changeStatus", //your page
                data: {
                    id: id,
                    amount: amount
                }, // passing the values
                success: function(res) {
                    //do what you want here...
                }
            });
            $('form#ubahStatus').submit();
        }
    </script>

</div>
<!-- /.container-fluid -->