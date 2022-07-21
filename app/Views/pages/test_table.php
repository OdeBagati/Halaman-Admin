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
                <form action="<?= base_url(); ?>/transaksi/download" method="post">
                    <div class="col-4 text-left">
                        <select class="form-control custom-select">
                            <option selected="selected" disabled>Download for</option>
                            <option value="1">one month</option>
                            <option value="2">one day</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Download</button>
                    </div>
                </form>

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
                                <td><?= $transaksi->ts; ?></td>
                                <td><?= $transaksi->trx_type; ?></td>
                                <td><?= $transaksi->trx_id; ?></td>
                                <td><?= $transaksi->product_code; ?></td>
                                <td>Rp. <?= $transaksi->amount; ?></td>
                                <td>
                                    <div class="row">
                                        <div class="col-12">
                                            <a class="btn btn-info btn-sm" href="#"><i class="fas fa-fw fa-eye"></i> Detail</a>
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
                                <td>
                                    <a class="btn btn-primary" href="#">Download</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->