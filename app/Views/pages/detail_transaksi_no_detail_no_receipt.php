<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Transer ID. <?= $response->trx_id; ?></h1>

    <div class="row">
        
        <div class="col-lg-4 col-sm-12 my-5">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td><b>No. Akun</b></td>
                                <td><?= $response->account; ?></td>
                            </tr>
                            <tr>
                                <td><b>Username</b></td>
                                <td><?= $response->username; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-sm-12 my-5">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td><b>ID Transer</b></td>
                                <td><?= $response->trx_id; ?></td>
                            </tr>
                            <tr>
                                <td><b>Tipe Transer</b></td>
                                <td><?= strtoupper(str_replace("_"," ",$response->trx_type)); ?></td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Transer</b></td>
                                <td><?= date('d-m-Y H:i:s',strtotime($response->ts)); ?></td>
                            </tr>
                            <tr>
                                <td><b>Amount</b></td>
                                <td><?= $response->amount; ?></td>
                            </tr>
                            <tr>
                                <td><b>Channel</b></td>
                                <td><?= $response->channel; ?></td>
                            </tr>
                            <tr>
                                <td><b>Kode Produk</b></td>
                                <td><?= $response->product_code; ?></td>
                            </tr>
                            <tr>
                                <td><b>Nama Produk</b></td>
                                <td><?= strtoupper($response->product_name); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-sm-12 my-5">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td><b>ID Pelanggan</b></td>
                                <td><?= $dataTransaksi->cust_id; ?></td>
                            </tr>
                            <tr>
                                <td><b>No. Unik Pembayaran</b></td>
                                <td><?= $dataHarga->verification_digit; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->