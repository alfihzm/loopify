<style>
    .row {
        opacity: 0;
        filter: blur(5px);
        transform: translateX(-10%);
        transition: all 1s;
    }

    .show {
        opacity: 1;
        filter: blur(0);
        transform: translateX(0);
    }

    @media(prefers-reduced-motion) {
        .hidden {
            transition: none;
        }
    }
</style>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">


        <div class="container col-lg-8" style="margin-top: 7vh; margin-bottom: 7vh; opacity: 94%;">
            <div class="row">
                <div class="col-lg">
                    <div class="p-5" style="background: #1D243C; border-radius: 10px; box-shadow: 0px 0px 15px 0px rgba(28,39,66,0.75);">
                        <div class="text-center">
                            <h1 style="color: #FFF;" class="h4 mb-4"> <?= $judul; ?> </h1>
                        </div>

                        <div class="flash_data">
                            <?= $this->session->flashdata('message'); ?>
                        </div>

                        <form class="user" method="post" action="<?= base_url('auth/register'); ?>" autocomplete="off">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <p> Nama Lengkap </p>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group" style="width: 50px; display: flex; justify-content: center; align-items: center; background: #2d3a67; border-radius: 6px 0px 0px 6px">
                                                    <i class="fas fa-solid fa-id-card" style="font-size: 18px;"></i>
                                                </span>
                                            </div>
                                            <input style="border-radius: 0px 5px 5px 0px; border: 0px; background: #262E49; color: #23C78D;" type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" value="<?= set_value('nama') ?>">
                                        </div>
                                        <?= form_error('nama', '<small class="text-danger">', '</small'); ?>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <p> Email </p>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group" style="width: 50px; display: flex; justify-content: center; align-items: center; background: #2d3a67; border-radius: 6px 0px 0px 6px">
                                                    <i class="fas fa-solid fa-envelope" style="font-size: 18px;"></i>
                                                </span>
                                            </div>
                                            <input style="border-radius: 0px 5px 5px 0px; border: 0px; background: #262E49; color: #23C78D;" type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Email" value="<?= set_value('email') ?>">
                                        </div>
                                        <?= form_error('email', '<small class="text-danger">', '</small'); ?>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <p> Username </p>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group" style="width: 50px; display: flex; justify-content: center; align-items: center; background: #2d3a67; border-radius: 6px 0px 0px 6px">
                                                    <i class="fas fa-solid fa-signature" style="font-size: 18px;"></i>
                                                </span>
                                            </div>
                                            <input style="border-radius: 0px 5px 5px 0px; border: 0px; background: #262E49; color: #23C78D;" type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukkan Username" value="<?= set_value('username') ?>">
                                        </div>
                                        <?= form_error('username', '<small class="text-danger">', '</small'); ?>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <p> Password </p>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group" style="width: 50px; display: flex; justify-content: center; align-items: center; background: #2d3a67; border-radius: 6px 0px 0px 6px">
                                                    <i class=" fas fa-solid fa-key" style="font-size: 18px;"></i>
                                                </span>
                                            </div>
                                            <input style="border-radius: 0px 5px 5px 0px; border: 0px; background: #262E49; color: #23C78D;" type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan Password">
                                        </div>
                                        <?= form_error('password', '<small class="text-danger">', '</small'); ?>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <p> Tanggal Lahir </p>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group" style="width: 50px; display: flex; justify-content: center; align-items: center; background: #2d3a67; border-radius: 6px 0px 0px 6px">
                                                    <i class="fas fa-solid fa-calendar" style="font-size: 18px;"></i>
                                                </span>
                                            </div>
                                            <input style="border-radius: 0px 5px 5px 0px; border: 0px; background: #262E49; color: #23C78D;" type="date" class="form-control form-control-user" id="lahir" name="lahir" placeholder="Masukkan Tanggal Lahir" value="<?= set_value('lahir') ?>">
                                        </div>
                                        <?= form_error('lahir', '<small class="text-danger">', '</small'); ?>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <p> No. Telp </p>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group" style="width: 50px; display: flex; justify-content: center; align-items: center; background: #2d3a67; border-radius: 6px 0px 0px 6px">
                                                    <i class="fas fa-solid fa-phone" style="font-size: 18px;"></i>
                                                </span>
                                            </div>
                                            <input style="border-radius: 0px 5px 5px 0px; border: 0px; background: #262E49; color: #23C78D;" type="text" class="form-control form-control-user" id="notelp" name="notelp" placeholder="Masukkan No. Telp" value="<?= set_value('notelp') ?>">
                                        </div>
                                        <?= form_error('notelp', '<small class="text-danger">', '</small'); ?>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <p> Alamat </p>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group" style="width: 50px; display: flex; justify-content: center; align-items: center; background: #2d3a67; border-radius: 6px 0px 0px 6px">
                                                    <i class="fas fa-solid fa-address-book" style="font-size: 18px;"></i>
                                                </span>
                                            </div>
                                            <input style="border-radius: 0px 5px 5px 0px; border: 0px; background: #262E49; color: #23C78D;" type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="<?= set_value('alamat') ?>">
                                        </div>
                                        <?= form_error('alamat', '<small class="text-danger">', '</small'); ?>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success btn-user mt-3 btn-block">
                                Register
                            </button>
                        </form>
                        <hr>
                        <div class="rows" style="display: flex; justify-content: center">
                            <div class="text-center m-2">
                                <a style="text-decoration: none;" class="small" href="<?= base_url('auth'); ?>">
                                    Login </a>
                            </div>
                            <div class="text-center m-2">
                                <a style="text-decoration: none;" class="small" href="<?= base_url('home'); ?>">
                                    Kembali </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    window.setTimeout(function() {
        $(".flash_data").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
</script>

<script>
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            console.info(entry);
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
            } else {
                entry.target.classList.remove('show');
            }
        });
    });

    const hiddenElements = document.querySelectorAll('.row');
    hiddenElements.forEach((el) => observer.observe(el));
</script>