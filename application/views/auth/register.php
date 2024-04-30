<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $judul; ?></title>
    <link href="<?= base_url('assets/') ?>css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/auth/register.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 mb-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                </div>
                                <div class="card-body">
                                    <form class="user" method="post" action="<?= base_url('auth/register'); ?>">
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="name" name="name" type="text"
                                                        placeholder="Masukkan nama" value="<?= set_value('name'); ?>" />
                                                    <label for="name">Nama</label>
                                                    <?= form_error('name', '<small class="text-danger pl-4">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="email" name="email" type="email"
                                                placeholder="name@example.com" value="<?= set_value('email'); ?>" />
                                            <label for=" email">Email address</label>
                                            <?= form_error('email', '<small class="text-danger pl-4">', '</small>'); ?>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="username" name="username"
                                                        type="text" placeholder="Username?"
                                                        value="<?= set_value('username'); ?>" />
                                                    <label for="inputPassword">Username</label>
                                                    <?= form_error('username', '<small class="text-danger pl-4">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="password" name="password"
                                                        type="password" placeholder="Create a password" />
                                                    <label for="inputPassword">Password</label>
                                                    <?= form_error('password', '<small class="text-danger pl-4">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="notelp" name="notelp" type="tel"
                                                        placeholder="Create a password" />
                                                    <label for="inputPassword">No. Telp</label>
                                                    <?= form_error('notelp', '<small class="text-danger pl-4">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Buat Sekarang
                                        </button>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="<?= base_url('auth') ?>">Login sekarang</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="<?= base_url('assets/') ?>js/scripts.js"></script>
</body>

</html>