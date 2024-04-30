<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Login</h3>
                            </div>

                            <div class="flash_data">
                                <?= $this->session->flashdata('message'); ?>
                            </div>

                            <div class="card-body">
                                <form method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="username" name="username" type="text"
                                            placeholder="name@example.com" />
                                        <label for="username">Username</label>
                                        <?= form_error('username', '<small class="text-danger pl-4">', '</small>'); ?>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="password" name="password" type="password"
                                            placeholder="Password" />
                                        <label for="password">Password</label>
                                        <?= form_error('password', '<small class="text-danger pl-4">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small"><a href="<?= base_url('auth/register'); ?>">Register</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div> -->