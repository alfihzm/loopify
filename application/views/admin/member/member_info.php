<div class="main-panel" style="font-family: quicksand;">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title mx-3"><?= $judul; ?></h4>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <?= $this->session->flashdata('message') ?>
                </div>
            </div>

            <div class="row-lg-12" style="display: flex; justify-content: space-between">

                <div class="card col-sm-5 col-md-4 col-lg-5 border border-secondary p-4"
                    style="display: flex; align-items: center;">
                    <img class="border border-secondary" style="border-radius: 5%; width: 45%;"
                        src="<?= base_url('assets/images/user/profile/') . $user['photo'] ?>" class="img-fluid"
                        alt="<?= $user['nama'] ?>">
                    <h5 style="text-align: center;" class="card-title mt-3">
                        <?= $user['nama'] ?></h5>
                    <div style="display: flex; justify-content: center;">
                        <span class="mt-2 badge rounded-pill bg-success text-light">
                            <?php
                            if ($user['role_id'] == 1) {
                                echo 'ADMIN';
                            } else {
                                echo 'MEMBER';
                            }
                            ?>
                        </span>
                    </div>
                </div>
                <div class="card col-sm-5 col-md-6 col-lg-6 border border-secondary p-4">
                    <div class="form-group row">
                        <label for="idstaff" class="col-sm-10 col-form-label">Total Pengumpulan Sampah</label>
                        <div class="col-sm-12">
                            <input style="color: #000;" type="text" class="form-control" id="idstaff" name="idstaff"
                                readonly value="<?= $user['total_sampah']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-10 col-form-label">Total Koin</label>
                        <div class="col-sm-12">
                            <input style="color: #000;" type="text" class="form-control" id="username" name="username"
                                readonly value="<?= $user['koin']; ?>">
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-lg-12">
                    <div class="card border border-secondary"
                        style="display: flex; background: #202940; width: 100%; height: 100%;">
                        <div class="card-body">
                            <h5 style="text-align: center;" class="card-title mt-1">Informasi Member</h5>
                            <hr>
                            <div class="form-group row">
                                <label for="idstaff" class="col-sm-10 col-form-label">ID Member</label>
                                <div class="col-sm-12">
                                    <input style="color: #000;" type="text" class="form-control" id="idmember"
                                        name="idmember" readonly value="<?= $user['id_member']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-10 col-form-label">Username</label>
                                <div class="col-sm-12">
                                    <input style="color: #000;" type="text" class="form-control" id="username"
                                        name="username" readonly value="<?= $user['username']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-10 col-form-label">Email</label>
                                <div class="col-sm-12">
                                    <input style="color: #000;" readonly type="text" class="form-control" id="email"
                                        name="email" value="<?= $user['email']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-10 col-form-label">Alamat</label>
                                <div class="col-sm-12">
                                    <input style="color: #000;" readonly type="text" class="form-control" id="alamat"
                                        name="alamat" value="<?= $user['alamat']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-10 col-form-label">No. Telp</label>
                                <div class="col-sm-12">
                                    <input style="color: #000;" readonly type="text" class="form-control" id="notelp"
                                        name="notelp" value="<?= $user['no_telp']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-10 col-form-label">Aktif Sejak</label>
                                <div class="col-sm-12">
                                    <input style="color: #000;" readonly type="text" class="form-control" id="aktif"
                                        name="aktif" value="<?= date('d F Y', $user['date_created']); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>