<body class="main-body light-theme">

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top" class="back-to-top rounded-circle shadow all-ease-03 fade-in">
        <i class="fe fe-arrow-up"></i>
    </a>
    <!-- END BACK-TO-TOP -->

    <!-- PAGE -->
    <div class="page">
        <!-- MAIN-CONTENT -->

        <div class="main-content app-content"></div>
        <section>
            <div class="section banner-4 banner-section">
                <div class="row">
                    <div class="container col-10 col-md-5 col-lg-3">
                        <div class="card text-bg-light" style="height: 67.5vh; margin-top: 13vh">
                            <img style="width: 10rem; border-radius: 100%"
                                src="<?= base_url('assets/images/user/profile/') . $user['photo']; ?>"
                                class="card-img-top position-relative top-0 start-50 translate-middle"
                                alt="<?= $user['nama']; ?>">

                            <!-- <div class="flex-grow">
                                <h4 class="mb-0">Nama: <?= $user['nama']; ?></h4>
                            </div> -->
                        </div>
                    </div>
                    <div class="container  col-10 col-md-10 col-lg-5">
                        <div class="card text-bg-light" style="height: 80vh;">

                        </div>
                    </div>
                </div>
            </div>
        </section>