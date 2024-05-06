<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
        /* Untuk Firefox */
    }
</style>

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

            <div class="container-fluid col-md-8">

                <div class="card border border-secondary">
                    <div class="card-body">
                        <h5 style="text-align: center;" class="card-title mt-1"><?= $judul; ?></h5>
                        <hr>
                        <form action="<?= base_url('admin/ubah_gift/') . $cinderamata['id']; ?>" method="POST">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="nama_gift">Nama Cinderamata</label>
                                        <input type="text" class="form-control" id="nama_gift" name="nama_gift" autocomplete="off" value="<?= $cinderamata['nama_gift']; ?>">
                                        <?= form_error('nama_gift', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="number" class="form-control" id="harga" name="harga" autocomplete="off" value="<?= $cinderamata['harga']; ?>">
                                        <?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" autocomplete="off" value="<?= $cinderamata['deskripsi']; ?>">
                                        <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-12" style="display: flex; justify-content: space-evenly; align-items: center; margin-top: 10px">
                                    <button type="submit" class="btn btn-danger">Simpan</button>
                                    <a style="width: 100px;" href="<?= base_url('admin/cinderamata'); ?>" class="btn btn-warning">
                                        Batal </a>
                                </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            var passwordInput = document.getElementById('password');
            var icon = document.getElementById('togglePassword');

            if (passwordInput.getAttribute('type') === 'password') {
                passwordInput.setAttribute('type', 'text');
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                passwordInput.setAttribute('type', 'password');
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        });
    </script>