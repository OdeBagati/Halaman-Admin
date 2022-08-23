<style>
    #satu_bulan{
        display: none;
    }

    #satu_hari{
        display: none;
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="container">
                <div class="row d-flex">
                    <div class="co-lg-2">
                        <a class="btn btn-primary" href="#"><i class="fa fa-refresh"></i>&nbsp;Rekonsiliasi</a>
                    </div>

                    <div class="col-lg-10 pl-5">
                        <div class="row">
                            <div class="col-lg-3">
                                <select name="pilihan_download" id="pil_donlot" class="form-control" onchange="getForm()">
                                    <option selected disabled>Download for</option>
                                    <option value="day">One Day</option>
                                    <option value="month">One Month</option>
                                </select>
                            </div>
                            <div class="col-lg-8">
                                <form action="<?= base_url('transaksi/download-tanggal'); ?>" method="post" id="satu_hari">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <input type="date" name="date" class="form-control">
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="submit" class="btn btn-primary">Download</button>
                                        </div>
                                    </div>
                                </form>

                                <form action="<?= base_url('transaksi/download-bulan'); ?>" method="post" id="satu_bulan">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <input type="month" name="month" class="form-control" >
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="submit" class="btn btn-primary">Download</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
                        <?php foreach ($dataTransaksi as $key => $transaksi) : ?>
                            <tr>
                                <td><?= date('d-m-Y H:i:s',strtotime($transaksi->ts)); ?></td>
                                <td><?= strtoupper(str_replace("_"," ",$transaksi->trx_type)); ?></td>
                                <td><?= $transaksi->trx_id; ?></td>
                                <td><?= $transaksi->product_code; ?></td>
                                <td>Rp. <?= number_format($transaksi->amount, 0, ',', '.'); ?></td>
                                <td>
                                    <div class="row">
                                        <div class="col-12">
                                            <a class="btn btn-info btn-sm" href="<?= base_url(); ?>/detail-transaksi/<?= $transaksi->trx_id; ?>"><i class="fas fa-fw fa-eye"></i> Detail</a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <?php if ($transaksi->status == 'rejected' || $transaksi->status == 'failed') : ?>
                                        <span class="badge badge-danger"><?= $transaksi->status; ?></span>
                                    <?php elseif ($transaksi->status == 'unpaid') : ?>
                                        <span class="badge badge-warning"><?= $transaksi->status; ?></span>
                                    <?php else : ?>
                                        <span class="badge badge-success"><?= $transaksi->status; ?></span>
                                    <?php endif; ?>
                                </td>
                                <?php if ($transaksi->status != 'rejected' && $transaksi->status != 'done' && $transaksi->status != 'failed') : ?>
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

</div>
<!-- /.container-fluid -->

<script>
    function getForm() {
        var pilihan = document.getElementById("pil_donlot").value;
        var download = {"bulan":document.getElementById("satu_bulan"),"hari":document.getElementById("satu_hari")}

        if (pilihan == "month") {
            download.bulan.style.display = "block";
            download.hari.style.display = "none";  
        } else {
            download.bulan.style.display = "none";
            download.hari.style.display = "block";
        }
    }
</script>