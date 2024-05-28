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
                        <form action="<?= base_url('withdraw/edit_withdraw/') . $withdraw['id']; ?>" method="POST">
                            <!-- <p style="font-weight: bold;">Transaksi penyerahan ini berstatus <?= $withdraw['status']; ?></p> -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="idstaff">ID Member</label>
                                        <input type="text" class="form-control" id="jenis_sampah" name="jenis_sampah" autocomplete="off" value="<?= $withdraw['id_member']; ?>" readonly style="color: black; font-weight:bold;">
                                        <!-- <?= form_error('jenis_sampah', '<small class="text-danger">', '</small>'); ?> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="idstaff">Username</label>
                                        <input type="text" class="form-control" id="jenis_sampah" name="jenis_sampah" autocomplete="off" value="<?= $withdraw['username']; ?>" readonly style="color: black; font-weight: bold;">
                                    </div>
                                    <div class="form-group">
                                        <label for="idstaff">Tanggal</label>
                                        <input type="text" class="form-control" id="tanggal" name="tanggal" autocomplete="off" value="<?= $withdraw['tanggal']; ?>" readonly style="color: black; font-weight: bold;">
                                    </div>
                                    <div class="form-group">
                                        <label for="idstaff">Jam</label>
                                        <input type="text" class="form-control" id="jam" name="jam" autocomplete="off" value="<?= $withdraw['jam']; ?>" readonly style="color: black; font-weight: bold;">
                                    </div>
                                    <div class="form-group">
                                        <label for="idstaff">Lokasi</label>
                                        <input type="text" class="form-control" id="lokasi" name="lokasi" autocomplete="off" value="<?= $withdraw['lokasi']; ?>" readonly style="color: black; font-weight: bold;">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="idstaff">Metode</label>
                                        <input type="text" class="form-control" id="jumlah_botol" name="jumlah_botol" autocomplete="off" value="<?= $withdraw['metode']; ?>" readonly style="color: black; font-weight: bold;">
                                    </div>
                                    <div class="form-group">
                                        <label for="idstaff">Nomor Rekening</label>
                                        <input type="text" class="form-control" id="jumlah_kaleng" name="jumlah_kaleng" autocomplete="off" value="<?= $withdraw['norek']; ?>" readonly style="color: black; font-weight: bold;">
                                    </div>
                                    <div class="form-group">
                                        <label for="idstaff">Koin Sebelum</label>
                                        <input type="text" class="form-control" id="jumlah_kardus" name="jumlah_kardus" autocomplete="off" value="<?= $withdraw['koin1']; ?>" readonly style="color: black; font-weight: bold;">
                                    </div>
                                    <div class="form-group">
                                        <label for="idstaff">Koin Saat Ini</label>
                                        <input type="text" class="form-control" id="total" name="total" autocomplete="off" value="<?= $withdraw['koin2']; ?>" readonly style="color: black; font-weight: bold;">
                                    </div>
                                    <div class="form-group">
                                        <label for="idstaff">Nominal Yang ditarik tunai</label>
                                        <input type="text" class="form-control" id="totalkoin" name="totalkoin" autocomplete="off" value="Rp <?= number_format( $withdraw['nominal'], 0, ',', '.') ?>" readonly style="color: black; font-weight: bold;">
                                    </div>
                                </div>
                                <div class="col-sm-12" style="display: flex; justify-content: space-evenly; align-items: center; margin-top: 10px">
                                    <a style="width: 100px;" href="<?= base_url('withdraw'); ?>" class="btn btn-warning">Kembali</a>
                                </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>