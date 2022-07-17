<!-- Begin Page Content -->
<div class="container-fluid">
<<<<<<< HEAD
=======

>>>>>>> b602367239ff619e6e1c5c41ba1080a108b7fc96
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
<<<<<<< HEAD
                <div class="col-6 text-left">
                    <a class="btn btn-primary" href="#"><i class="fa fa-refresh"></i>&nbsp;Rekonsiliasi</a>
                </div>
=======
                <div class="col-2 text-left">
                    <a class="btn btn-primary" href="#"><i class="fa fa-refresh"></i>&nbsp;Rekonsiliasi</a>
                </div>
                <div class="col-4 text-left">
                    <select class="form-control">
                        <option selected="selected" disabled>Download for</option>
                        <option value="1">one month</option>
                        <option value="2">one day</option>
                    </select>
                </div>
                <div class="col-2">
                    <a href="#" class="btn btn-primary">Download</a>
                </div>
>>>>>>> b602367239ff619e6e1c5c41ba1080a108b7fc96
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
<<<<<<< HEAD
=======
                            <th>Aksi</th>
>>>>>>> b602367239ff619e6e1c5c41ba1080a108b7fc96
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
<<<<<<< HEAD
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>20/06/2022</td>
                            <td>PT. Mencari Cinta Sejati</td>
                            <td>69420</td>
                            <td>12345</td>
                            <td>Rp. 69.000</td>
                            <td>
                                <div class="row">
                                    <div class="col-12">
                                        <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-fw fa-eye"></i> Detail</a>
=======
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach($response as $key => $transaksi) : ?>
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
>>>>>>> b602367239ff619e6e1c5c41ba1080a108b7fc96
                                    </div>
                                </div>
                            </td>
                            <td>
<<<<<<< HEAD
                                <span class="badge badge-success">Sukses</span>
                            </td>
                        </tr>
                        <tr>
                            <td>20/06/2022</td>
                            <td>PT. Mencari Jodoh Sejati</td>
                            <td>69420</td>
                            <td>12345</td>
                            <td>Rp. 69.000</td>
                            <td>
                                <div class="row">
                                    <div class="col-12">
                                        <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-fw fa-eye"></i> Detail</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge badge-success">Sukses</span>
                            </td>
                        </tr>
=======
                                <?php if($transaksi->status == 'failed') : ?>
                                <span class="badge badge-danger"><?= $transaksi->status; ?></span>
                                <?php elseif($transaksi->status == 'advice' || $transaksi->status == 'rekonsiliasi') : ?>
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
>>>>>>> b602367239ff619e6e1c5c41ba1080a108b7fc96
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

