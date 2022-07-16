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
                <!-- <tfoot>
                    <tr>
                        <th>Tgl. Transaksi</th>
                        <th>Biller</th>
                        <th>TrxID</th>
                        <th>BillID</th>
                        <th>Total Bayar</th>
                        <th>Detail</th>
                        <th>Status</th>
                    </tr>
                </tfoot> -->
                <tbody>
                    <tr>
                        <td>22/10/2020</td>
                        <td>PBB Tebingtinggi</td>
                        <td>112233</td>
                        <td>12345678</td>
                        <td>Rp. 22.8000</td>
                        <td>
                            <div class="row">
                                <div class="col-12">
                                    <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-fw fa-eye"></i> Detail</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-success">Success</span>
                        </td>
                    </tr>
                    <tr>
                        <td>23/10/2020</td>
                        <td>PBB Tebingtinggi</td>
                        <td>112233</td>
                        <td>12345678</td>
                        <td>Rp. 22.800</td>
                        <td>
                            <div class="row">
                                <div class="col-12">
                                    <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-fw fa-eye"></i> Detail</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-warning">Pending</span>
                        </td>
                    </tr>
                    <tr>
                        <td>24/10/2020</td>
                        <td>PBB Tebingtinggi</td>
                        <td>112233</td>
                        <td>12345678</td>
                        <td>Rp. 22.800</td>
                        <td>
                            <div class="row">
                                <div class="col-12">
                                    <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-fw fa-eye"></i> Detail</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-danger">Error</span>
                        </td>
                    </tr>
                    <tr>
                        <td>25/10/2020</td>
                        <td>PBB Tebingtinggi</td>
                        <td>112233</td>
                        <td>12345678</td>
                        <td>Rp. 22.800</td>
                        <td>
                            <div class="row">
                                <div class="col-12">
                                    <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-fw fa-eye"></i> Detail</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-success">Success</span>
                        </td>
                    </tr>
                    <tr>
                        <td>26/10/2020</td>
                        <td>PBB Tebingtinggi</td>
                        <td>112233</td>
                        <td>12345678</td>
                        <td>Rp. 22.800</td>
                        <td>
                            <div class="row">
                                <div class="col-12">
                                    <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-fw fa-eye"></i> Detail</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-warning">Pending</span>
                        </td>
                    </tr>
                    <tr>
                        <td>27/10/2020</td>
                        <td>PBB Tebingtinggi</td>
                        <td>112233</td>
                        <td>12345678</td>
                        <td>Rp. 22.800</td>
                        <td>
                            <div class="row">
                                <div class="col-12">
                                    <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-fw fa-eye"></i> Detail</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-danger">Error</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>