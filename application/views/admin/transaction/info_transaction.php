<h1><?= $judul; ?></h1>
<div class="main-panel" style="font-family: quicksand;">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title"><?= $judul; ?></h4>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <?= $this->session->flashdata('message') ?>
                </div>
            </div>
            <div class="container-fluid col">
                <div class="card border border-secondary">
                    <div class="card-body">
                        <h5 style="text-align: center;" class="card-title mt-1"><?= $judul; ?></h5>
                        <hr>
                        <form action="<?= base_url('transaction/edit_transaction/') . $transaction['id']; ?>" method="POST">
                            <p style="font-weight: bold;">Transaksi penyerahan ini berstatus <?= $transaction['status']; ?></p>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="idstaff">ID Member</label>
                                        <input type="text" class="form-control" id="jenis_sampah" name="jenis_sampah" autocomplete="off" value="<?= $transaction['id_member']; ?>" readonly style="color: black; font-weight:bold;">
                                        <!-- <?= form_error('jenis_sampah', '<small class="text-danger">', '</small>'); ?> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="idstaff">Username</label>
                                        <input type="text" class="form-control" id="jenis_sampah" name="jenis_sampah" autocomplete="off" value="<?= $transaction['username']; ?>" readonly style="color: black; font-weight: bold;">
                                    </div>
                                    <div class="form-group">
                                        <label for="idstaff">Tanggal</label>
                                        <input type="text" class="form-control" id="tanggal" name="tanggal" autocomplete="off" value="<?= $transaction['tanggal']; ?>" readonly style="color: black; font-weight: bold;">
                                    </div>
                                    <div class="form-group">
                                        <label for="idstaff">Lokasi</label>
                                        <input type="text" class="form-control" id="lokasi" name="lokasi" autocomplete="off" value="<?= $transaction['lokasi']; ?>" readonly style="color: black; font-weight: bold;">
                                    </div>
                                    <div class="form-group">
                                        <label for="idstaff">Catatan</label>
                                        <input type="text" class="form-control" id="catatan" name="catatan" autocomplete="off" value="<?= $transaction['catatan']; ?>" readonly style="color: black; font-weight: bold;">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="idstaff">Jumlah Botol</label>
                                        <input type="text" class="form-control" id="jumlah_botol" name="jumlah_botol" autocomplete="off" value="<?= $transaction['jumlah_botol']; ?>" readonly style="color: black; font-weight: bold;">
                                    </div>
                                    <div class="form-group">
                                        <label for="idstaff">Jumlah Kaleng</label>
                                        <input type="text" class="form-control" id="jumlah_kaleng" name="jumlah_kaleng" autocomplete="off" value="<?= $transaction['jumlah_kaleng']; ?>" readonly style="color: black; font-weight: bold;">
                                    </div>
                                    <div class="form-group">
                                        <label for="idstaff">Jumlah Kardus</label>
                                        <input type="text" class="form-control" id="jumlah_kardus" name="jumlah_kardus" autocomplete="off" value="<?= $transaction['jumlah_kardus']; ?>" readonly style="color: black; font-weight: bold;">
                                    </div>
                                    <div class="form-group">
                                        <label for="idstaff">Jumlah Limbah (Satuan)</label>
                                        <input type="text" class="form-control" id="total" name="total" autocomplete="off" value="<?= $transaction['total']; ?>" readonly style="color: black; font-weight: bold;">
                                    </div>
                                    <div class="form-group">
                                        <label for="idstaff">Jumlah Saldo Koin yang dapat ditukar</label>
                                        <input type="text" class="form-control" id="totalkoin" name="totalkoin" autocomplete="off" value="Rp <?= number_format( $transaction['totalkoin'], 0, ',', '.') ?>" readonly style="color: black; font-weight: bold;">
                                    </div>
                                </div>
                                <div class="col-sm-12" style="display: flex; justify-content: space-evenly; align-items: center; margin-top: 10px">
                                    <a style="width: 100px;" href="<?= base_url('transaction'); ?>" class="btn btn-warning">Kembali</a>
                                </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>