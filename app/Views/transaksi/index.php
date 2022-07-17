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
                    <tfoot>
                        <tr>
                            <th>Tgl. Transaksi</th>
                            <th>Biller</th>
                            <th>TrxID</th>
                            <th>BillID</th>
                            <th>Total Bayar</th>
                            <th>Detail</th>
                            <th>Status</th>
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
                                    </div>
                                </div>
                            </td>
                            <td>
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
                    </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
<?= $this->endSection(); ?>