<?= $this->extend('layout/index'); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12 mb-3">
        <a href="#" class="btn btn-primary"><i class="fas fa-fw fa-download"></i> Rekonsiliasi</a>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
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
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($response as $key => $transaksi) : ?>
                    <tr>
                        <td><?= $transaksi->date_created; ?></td>
                        <td><?= $transaksi->username; ?></td>
                        <td><?= $transaksi->id; ?></td>
                        <td>(coming soon)</td>
                        <td>Rp. <?= $transaksi->price; ?></td>
                        <td>
                            <div class="row">
                                <div class="col-12">
                                    <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-fw fa-eye"></i> Detail</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php if($transaksi->status =='requested') : ?>
                                <span class="badge badge-warning"><?= $transaksi->status ?></span>
                            <?php elseif($transaksi->status =='success') : ?>
                                <span class="badge badge-primary"><?= $transaksi->status ?></span>
                            <?php else : ?>
                                <span class="badge badge-danger"><?= $transaksi->status ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>