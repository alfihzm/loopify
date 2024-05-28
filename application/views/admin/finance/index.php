<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header" style="font-family: quicksand;">
                <h4 class="page-title"><?= $judul; ?></h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="fa-solid fa-wallet"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Manajemen Keuangan</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Index</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <?= $this->session->flashdata('message') ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card border border-info" style="border-radius: 10px; overflow: hidden;">
                        <div class="card-header" style="background-color: #01E7f4; color: #1A2035; text-align: center; font-size: 24px; padding: 5px 0;">
                            <b>Modal Awal</b>
                        </div>
                        <div class="card-body" style="padding-bottom: 1px; background-color: #1A2035;">
                            <div style="text-align: center; font-family: Montserrat;">
                                <h1 style="color: #fff;">Rp. <?= number_format($saldoModalAwal, 0, ',', '.') ?></h1>
                                <a href="" data-toggle="modal" data-target="#newFinanceModal" class="btn btn-info mb-3" style="color:white;"><b>Perbarui Saldo Modal</b></a>
                                <a href="#" class="btn btn-info mb-3" data-toggle="modal" data-target="#tambahSaldoModal"><b>Tambah Saldo Modal</b></a>
                                <br>Terakhir diperbarui oleh <?= $username_update1 ?> tanggal <?= $tgl_update1 ?> pukul <?= $jam_update1 ?>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card border border-info" style="border-radius: 10px; overflow: hidden;">
                        <div class="card-header" style="background-color: #01E7f4; color: #1A2035; text-align: center; font-size: 24px; padding: 5px 0;">
                            <b>Kas Saat ini</b>
                        </div>
                        <div class="card-body" style="padding-bottom: 1px; background-color: #1A2035;">
                            <div style="text-align: center; font-family: Montserrat;">
                                <h1 style="color: #fff;">Rp. <?= number_format($saldoKasSaatIni, 0, ',', '.') ?></h1>
                                <a href="" data-toggle="modal" data-target="#newFinanceModal2" class="btn btn-info mb-3" style="color:white;"><b>Perbarui Saldo Kas</b></a>
                                <a href="#" class="btn btn-info mb-3" data-toggle="modal" data-target="#tambahSaldoArusKas"><b>Tambah Saldo Kas</b></a>
                                <br>Terakhir diperbarui oleh <?= $username_update2 ?> tanggal <?= $tgl_update2 ?> pukul <?= $jam_update2 ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal Edit kolom saldo yang memiliki ID = 1  -->
<div class="modal fade" id="newFinanceModal" tabindex="-1" aria-labelledby="newFinanceModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="background-color: #1A2035; border-radius: 10px;">
        <div class="modal-content" style="background-color: #1A2035;">
            <div class="modal-header">
                <h2 class="modal-title text-white" id="newFinanceModalLabel"><b>Perbarui Keuangan</b></h2>
                <button type="button" class="btn btn-close btn-small btn-cross" data-dismiss="modal" aria-label="Close">
                    X
                </button>
            </div>
            <form action="<?= base_url('finance') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label style="color: #01E7f4 !important;" for="formGroupExampleInput">Perbarui Modal</label>
                        <input type="hidden" name="id" value="1">
                        <input style="background: #01E7f4; color: #1A2035; font-weight: 600;" type="text" class="form-control" id="saldo" name="saldo" value="<?= isset($saldoModalAwal) ? $saldoModalAwal : '' ?>">
                        <?= form_error('saldo', '<small class="text-light">', '</small>'); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit kolom saldo yang memiliki ID = 2  -->
<div class="modal fade" id="newFinanceModal2" tabindex="-1" aria-labelledby="newFinanceModalLabel2" aria-hidden="true">
    <div class="modal-dialog" style="background-color: #1A2035; border-radius: 10px;">
        <div class="modal-content" style="background-color: #1A2035;">
            <div class="modal-header">
                <h2 class="modal-title text-white" id="newFinanceModalLabel2"><b>Perbarui Keuangan</b></h2>
                <button type="button" class="btn btn-close btn-small btn-cross" data-dismiss="modal" aria-label="Close">
                    X
                </button>
            </div>
            <form action="<?= base_url('finance') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label style="color: #01E7f4 !important;" for="formGroupExampleInput">Perbarui Kas saat ini</label>
                        <input type="hidden" name="id" value="2">
                        <input style="background: #01E7f4; color: #1A2035; font-weight: 600;" type="text" class="form-control" id="saldo" name="saldo" value="<?= isset($saldoKasSaatIni) ? $saldoKasSaatIni : '' ?>">
                        <?= form_error('saldo', '<small class="text-light">', '</small>'); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Tambah saldo berdasarkan nominal input -->
<div class="modal fade" id="tambahSaldoModal" tabindex="-1" aria-labelledby="tambahSaldoModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="background-color: #1A2035; border-radius: 10px;">
        <div class="modal-content" style="background-color: #1A2035;">
            <div class="modal-header">
                <h2 class="modal-title text-white" id="tambahSaldoModalLabel"><b>Tambah Saldo</b></h2>
                <button type="button" class="btn btn-close btn-small btn-cross" data-dismiss="modal" aria-label="Close">
                    X
                </button>
            </div>
            <form action="<?= base_url('finance/tambahSaldo') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label style="color: #01E7f4 !important;" for="jumlah">Jumlah Saldo Tambahan</label>
                        <input type="hidden" name="id" value="1">
                        <input style="background: #01E7f4; color: #1A2035; font-weight: 600;" type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan jumlah saldo tambahan">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Tambah arus kas berdasarkan nominal input -->
<div class="modal fade" id="tambahSaldoArusKas" tabindex="-1" aria-labelledby="tambahSaldoArusKasLabel" aria-hidden="true">
    <div class="modal-dialog" style="background-color: #1A2035; border-radius: 10px;">
        <div class="modal-content" style="background-color: #1A2035;">
            <div class="modal-header">
                <h2 class="modal-title text-white" id="tambahSaldoArusKasLabel"><b>Tambah Saldo</b></h2>
                <button type="button" class="btn btn-close btn-small btn-cross" data-dismiss="modal" aria-label="Close">
                    X
                </button>
            </div>
            <form action="<?= base_url('finance/tambahSaldo') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label style="color: #01E7f4 !important;" for="jumlah">Jumlah Saldo Tambahan</label>
                        <input type="hidden" name="id" value="2">
                        <input style="background: #01E7f4; color: #1A2035; font-weight: 600;" type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan jumlah saldo tambahan">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
</script>