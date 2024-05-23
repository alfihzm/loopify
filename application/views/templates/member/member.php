<!-- BACK-TO-TOP -->
<a href="#top" id="back-to-top" class="back-to-top rounded-circle shadow all-ease-03 fade-in">
    <i class="fe fe-arrow-up"></i>
</a>
<!-- END BACK-TO-TOP -->

<!-- PAGE -->
<div class="page">
    <div class="head_menu_container">

        <!-- HEADER -->

        <header class="main-header" id="stickyHeader">
            <!-- Start::main-brand-header -->
            <div class="main-brand-header">
                <div class="container brand-header-container">
                    <div class="d-flex align-items-center">
                        <!-- Start::header-element -->
                        <div class="header-element me-1">
                            <!-- Start::header-link -->
                            <a href="javascript:void(0);" class="sidemenu-toggle1 header-link" data-bs-toggle="sidebar">
                                <span class="open-toggle">
                                    <i class="bi bi-text-indent-left header-link-icon"></i>
                                </span>
                            </a>
                            <!-- End::header-link -->
                        </div>
                        <!-- End::header-element -->
                        <a href="<?= base_url('member'); ?>" class="brand-main">
                            <img src="<?= base_url('assets/') ?>images/brand/branding-logo.png" alt="img" class="desktop-logo logo-dark">
                        </a>

                        <ul class="categories-dropdowns">
                            <li class="category-dropdown px-2 py-3">
                            </li>
                        </ul>
                    </div>
                    <ul class="nav list-unstyled align-items-center">
                        <li class="d-flex align-items-center position-relative me-md-4 me-2">
                            <a href="tel:+1236789657" class="stretched-link"></a>
                            <span class="avatar bg-white-1 border rounded-circle tx-15 border-white-2 me-2">
                                <i class="bi bi-telephone text-white"></i>
                            </span>
                            <div class="d-none d-md-block">
                                <a href="javascript:void(0);" class="nav-link tx-15 p-0">Call to Us</a>
                                <a href="tel:+1236789657" class="mb-0 nav-link p-0 tx-13 op-8 lh-sm">+123 678 9657</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center position-relative">
                            <a id="live-chat" href="javascript:void(0);" class="stretched-link"></a>
                            <span class="avatar bg-white-1 border rounded-circle tx-15 border-white-2 me-2">
                                <i class="bi bi-chat-text text-white"></i>
                            </span>
                            <div class="d-none d-md-block">
                                <a href="javascript:void(0);" class="nav-link tx-15 p-0">Live Chat</a>
                                <p class="mb-0 nav-link p-0 tx-13 op-8 lh-sm">Chat With Us</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End::main-brand-header -->
        </header> <!-- END HEADER -->

        <!-- SIDEBAR -->

        <div class="sticky">
            <!-- Start::app-sidebar -->
            <aside class="app-sidebar" id="sidebar">

                <div class="app-toggle-header">
                    <div class="header-element">
                        <!-- Start::header-link -->
                        <a href="javascript:void(0);" class="sidemenu-toggle header-link" data-bs-toggle="sidebar">
                            <span class="close-toggle">
                                <i class="bi bi-x header-link-icon"></i>
                            </span>
                        </a>
                        <!-- End::header-link -->
                    </div>
                    <!-- End::header-element -->
                    <a href="<?= base_url('member'); ?>" class="brand-main">
                        <img src="<?= base_url('assets/') ?>images/brand/logo-white.png" alt="img" class="desktop-logo logo-dark">
                    </a>
                </div>

                <!-- Start::main-sidebar -->
                <div class="main-sidebar container" id="sidebar-scroll">

                    <!-- Start::nav -->
                    <nav class="main-menu-container nav nav-pills sub-open">
                        <ul class="main-menu">

                            <!-- Start::slide -->
                            <li class="slide has-sub">
                                <a href="<?= base_url('member'); ?>" class="side-menu__item">
                                    <span class="side-menu__label">Beranda</span>
                                    <i class="fe fe-chevron-down side-menu__angle"></i>
                                </a>
                                <ul>
                                </ul>
                            </li>
                            <!-- End::slide -->

                            <!-- Start::slide -->
                            <li class="slide has-sub">
                                <a href="<?= base_url('member/about'); ?>" class="side-menu__item">
                                    <span class="side-menu__label">Tentang Kami</span>
                                    <i class="fe fe-chevron-down side-menu__angle"></i>

                                </a>
                                <ul>
                                </ul>
                            </li>
                            <!-- End::slide -->

                            <!-- Start::slide -->
                            <li class="slide has-sub">
                                <a href="<?= base_url('member/about#faq'); ?>" class="side-menu__item">
                                    <span class="side-menu__label">FAQ</span>
                                    <i class="fe fe-chevron-down side-menu__angle"></i>
                                </a>
                                <ul>
                                </ul>
                            </li>
                            <!-- End::slide -->

                        </ul>
                        <div class="d-xl-flex d-lg-none d-grid gap-2 text-center">
                            <a href="<?= base_url('auth/logout'); ?>" class="btn btn-secondary min-w-fit-content">Keluar</a>
                        </div>

                    </nav>
                    <!-- End::nav -->

                </div>
                <!-- End::main-sidebar -->

            </aside>
            <!-- End::app-sidebar -->
        </div>
        <!-- END SIDEBAR -->
    </div>
    <!-- MAIN-CONTENT -->

    <div class="main-content app-content">
        <section class="banner-section section banner-1">
            <img src="<?= base_url('assets/') ?>images/patterns/1.png" alt="img" class="patterns-2">
            <img src="<?= base_url('assets/') ?>images/patterns/4.png" alt="img" class="patterns-3">
            <img src="<?= base_url('assets/') ?>images/patterns/6.png" alt="img" class="patterns-4">
            <img src="<?= base_url('assets/') ?>images/patterns/6.png" alt="img" class="patterns-6">
            <img src="<?= base_url('assets/') ?>images/patterns/10.png" alt="img" class="patterns-8 op-2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="mb-5">
                            <p class="mb-3 content-1 h5 text-white">Penukaran limbah sampah menjadi tunai <span class="tx-info-dark position-relative">Terpercaya.<span class="br-bottom-before"></span></span></p>
                            <p class="content-2">Lestarikan alam dengan mengurangi angka dengan limbah.</p>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="text-lg-end text-center mt-4 mt-lg-0">
                            <img src="<?= base_url('assets/') ?>images/png/1.png" class="img-fluid" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section bg-pattern-1">
            <img src="<?= base_url('assets/') ?>images/patterns/7.png" alt="img" class="patterns-7">
            <img src="<?= base_url('assets/') ?>images/patterns/2.png" alt="img" class="patterns-1 op-1">
            <img src="<?= base_url('assets/') ?>images/patterns/9.png" alt="img" class="patterns-3 filter-invert sub-pattern-2 op-2">
            <div class="container">
                <div class="heading-section">
                    <div class="heading-subtitle"><span class="tx-primary tx-16 fw-semibold">Tukar</span></div>
                    <div class="heading-title">Limbah <span class="tx-primary"> Daur Ulang</span> </div>
                    <div class="heading-description">Jenis limbah yang dapat kami terima.</div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="card pricing-card border mb-lg-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <span class="avatar br-7 me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="var(--primary-color)" class="bi bi-box-seam-fill" enable-background="new 0 0 3873 3873" viewBox="0 0 320 512">
                                            <path d="M128 0C110.3 0 96 14.3 96 32l0 60c-4 1.2-8 2.8-11.8 4.6l-13.2 6.2C47.2 113.9 32 137.8 32 164.2c0 18.1 7.1 34.5 18.6 46.7C39.1 222.4 32 238.4 32 256c0 19.1 8.4 36.3 21.7 48C40.4 315.7 32 332.9 32 352s8.4 36.3 21.7 48C40.4 411.7 32 428.9 32 448c0 35.3 28.7 64 64 64l128 0c35.3 0 64-28.7 64-64c0-19.1-8.4-36.3-21.7-48c13.3-11.7 21.7-28.9 21.7-48s-8.4-36.3-21.7-48c13.3-11.7 21.7-28.9 21.7-48c0-17.6-7.1-33.6-18.6-45.1c11.5-12.2 18.6-28.6 18.6-46.7c0-26.3-15.2-50.3-39.1-61.4l-13.2-6.2C232 94.8 228 93.3 224 92l0-60c0-17.7-14.3-32-32-32L128 0zm69.3 104c11 0 21.8 2.4 31.7 7.1l13.2 6.2c18.2 8.5 29.8 26.8 29.8 46.9c0 16.4-7.6 31.1-19.6 40.6c-1.9 1.5-3.1 3.9-3 6.4s1.2 4.8 3.2 6.3c11.8 8.8 19.4 22.8 19.4 38.6c0 17.5-9.3 32.7-23.3 41.1c-2.4 1.4-3.9 4-3.9 6.9s1.5 5.4 3.9 6.9c14 8.4 23.3 23.7 23.3 41.1s-9.3 32.7-23.3 41.1c-2.4 1.4-3.9 4-3.9 6.9s1.5 5.4 3.9 6.9c14 8.4 23.3 23.7 23.3 41.1c0 26.5-21.5 48-48 48L96 496c-26.5 0-48-21.5-48-48c0-17.4 9.3-32.7 23.3-41.1c2.4-1.4 3.9-4 3.9-6.9s-1.5-5.4-3.9-6.9C57.3 384.7 48 369.4 48 352s9.3-32.7 23.3-41.1c2.4-1.4 3.9-4 3.9-6.9s-1.5-5.4-3.9-6.9C57.3 288.7 48 273.5 48 256c0-15.8 7.6-29.8 19.4-38.6c2-1.5 3.2-3.8 3.2-6.3s-1.1-4.8-3-6.4c-12-9.5-19.6-24.2-19.6-40.6c0-20.1 11.6-38.4 29.8-46.9L91 111.1c9.9-4.6 20.7-7.1 31.7-7.1l74.6 0zm0-16l-74.6 0L112 88l0-56c0-8.8 7.2-16 16-16l64 0c8.8 0 16 7.2 16 16l0 56-10.7 0zM96 216c0 4.4 3.6 8 8 8l112 0c4.4 0 8-3.6 8-8s-3.6-8-8-8l-112 0c-4.4 0-8 3.6-8 8zm8 152c-4.4 0-8 3.6-8 8s3.6 8 8 8l112 0c4.4 0 8-3.6 8-8s-3.6-8-8-8l-112 0z" />
                                        </svg>
                                    </span>
                                    <div class="flex-grow-1">
                                        <h4 class="mb-0">Botol Plastik</h4>
                                    </div>
                                </div>
                                <p class="mb-1 tx-muted">Harga</p>
                                <h2 class="mb-3"> Rp.1000 <span class="tx-14 op-7 tx-muted">/ Botol</span></h2>
                                <p class="mb-4">Menerima berbagi jenis botol plastik yang ada miliki.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card pricing-card border mb-lg-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <span class="avatar br-7 me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="var(--primary-color)" class="bi bi-box-seam-fill" enable-background="new 0 0 3873 3873" viewBox="0 0 384 512">
                                            <path d="M343 456.5c-7 6.7-17.9 13.5-32.7 19.6C280.9 488.2 239 496 192 496s-88.9-7.8-118.4-19.9c-14.8-6-25.7-12.8-32.7-19.6c-6.9-6.7-9-12.3-9-16.5V279.9c15.1 9.6 34.6 17.6 56.9 23.6c7.4 2 15.2 3.8 23.2 5.3c2.5 41.9 37.3 75.2 79.9 75.2s77.4-33.2 79.9-75.2c8.1-1.5 15.8-3.3 23.2-5.3c22.3-6 41.9-13.9 56.9-23.6V440c0 4.3-2 9.8-9 16.5zM271.2 292.6C265.7 253.8 232.3 224 192 224s-73.7 29.8-79.2 68.6c-6.8-1.4-13.4-2.9-19.7-4.6c-26.6-7.1-47.6-16.8-61.1-27.8V107.4c9.5 8.8 22.6 16.5 38.2 22.7c31.6 12.6 74.6 20.3 121.8 20.3s90.2-7.6 121.8-20.3c15.6-6.2 28.8-13.9 38.2-22.7V260.3c-13.5 10.9-34.5 20.6-61.1 27.8c-6.3 1.7-12.9 3.2-19.7 4.6zM352 75.2c0 6.4-3.2 13.2-10.7 20.3c-7.5 7.1-18.8 13.9-33.5 19.7C278.6 127 237.6 134.4 192 134.4s-86.6-7.4-115.8-19.1c-14.6-5.9-26-12.6-33.5-19.7C35.2 88.4 32 81.6 32 75.2s3.2-13.2 10.7-20.3C50.2 47.7 61.5 41 76.2 35.1C105.4 23.4 146.4 16 192 16s86.6 7.4 115.8 19.1c14.6 5.9 26 12.6 33.5 19.7c7.5 7.1 10.7 14 10.7 20.3zm16 0V72c0-39.8-78.8-72-176-72S16 32.2 16 72v3.2V440c0 39.8 78.8 72 176 72s176-32.2 176-72V75.2zM128 304a64 64 0 1 1 128 0 64 64 0 1 1 -128 0z" />
                                        </svg>
                                    </span>
                                    <div class="flex-grow-1">
                                        <h4 class="mb-0">Kaleng</h4>
                                    </div>
                                </div>
                                <p class="mb-1 tx-muted">Harga</p>
                                <h2 class="mb-3"> Rp.1500 <span class="tx-14 op-7 tx-muted">/ Kaleng</span></h2>
                                <p class="mb-4">Menerima berbagi jenis Kaleng yang ada miliki.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card pricing-card border mb-lg-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <span class="avatar br-7 me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="var(--primary-color)" class="bi bi-box-seam-fill" enable-background="new 0 0 3873 3873" viewBox="0 0 448 512">
                                            <path d="M342.4 48H232V176H430c-.6-2-1.3-4-2.2-5.9L386.3 76.5C378.6 59.2 361.4 48 342.4 48zM432 192H16V416c0 26.5 21.5 48 48 48H384c26.5 0 48-21.5 48-48V192zM18 176H216V48H105.6c-19 0-36.2 11.2-43.9 28.5L20.1 170.1c-.9 1.9-1.6 3.9-2.2 5.9zM342.4 32c25.3 0 48.2 14.9 58.5 38l41.6 93.6c3.6 8.2 5.5 17 5.5 26V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V189.6c0-9 1.9-17.8 5.5-26L47.1 70c10.3-23.1 33.2-38 58.5-38H342.4z" />
                                        </svg>
                                    </span>
                                    <div class="flex-grow-1">
                                        <h4 class="mb-0">Kardus</h4>
                                    </div>
                                </div>
                                <p class="mb-1 tx-muted">Harga </p>
                                <h2 class="mb-3"> Rp. 2000 <span class="tx-14 op-7 tx-muted">/ Kardus</span></h2>
                                <p class="mb-4">Menerima berbagi jenis Kardus yang ada miliki.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="banner-pd-1 blob-bg-sec">
            <img src="<?= base_url('assets/') ?>images/patterns/10.png" alt="img" class="patterns-8 op-1">
            <img src="<?= base_url('assets/') ?>images/patterns/4.png" alt="img" class="patterns-3">
            <img src="<?= base_url('assets/') ?>images/patterns/6.png" alt="img" class="patterns-4">
            <img src="<?= base_url('assets/') ?>images/patterns/9.png" alt="img" class="patterns-9">
            <img src="<?= base_url('assets/') ?>images/patterns/9.png" alt="img" class="patterns-9 sub-pattern-1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 reveal">
                        <h2 class="mb-1 text-white">Bergabung Bersama Kami</h2>
                        <p class="mb-4 op-7 tx-15">Mari Lestarikan alam bersama.</p>
                        <p class="mb-4">
                            Tukar limbah rumah tangga Anda untuk di daur ulang agar limbah tidak berujung menjadi sampah
                            di Tempat Pembuangan Akhir!.
                        </p>
                        <a href="#domain" class="btn btn-lg btn-secondary">Get Started</a>
                    </div>
                    <div class="col-lg-6 text-lg-end text-center mt-5 mt-lg-0">
                        <img src="<?= base_url('assets/') ?>images/png/69.png" alt="img" class="build-img reveal img-fluid">
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <img src="<?= base_url('assets/') ?>images/patterns/12.png" alt="img" class="patterns-8 sub-pattern-1 z-index-0 op-1">
            <img src="<?= base_url('assets/') ?>images/patterns/11.png" alt="img" class="patterns-3 z-index-0">
            <div class="container">
                <div class="heading-section">
                    <div class="heading-subtitle"><span class="tx-primary tx-16 fw-semibold">Tata Cara</span></div>
                    <div class="heading-title">Cara Menukar <span class="tx-primary">Limbah</span> </div>
                    <div class="heading-description">Cara mudah mendapatkan tunai dengan mengurangi residu alam menjadi
                        benda layak pakai.</div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="card feature-card reveal">
                            <div class="card-body">
                                <div class="mb-2 d-flex align-items-center">
                                    <span class="tx-primary addons tx-28">
                                        <i class="bi bi-envelope-paper outline fade-in"></i>
                                        <i class="bi bi-envelope-paper-fill filled fade-in"></i>
                                    </span>
                                    <h5 class="flex-grow-1 mb-0 ms-3">Free Email Forwarding</h5>
                                </div>
                                <p class="mb-0">Amet ipsum justo no dolores lorem tempor clita elitr et ut, amet
                                    aliquyam et sed invidunt at kasd accusam, dolor.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card feature-card reveal">
                            <div class="card-body">
                                <div class="mb-2 d-flex align-items-center">
                                    <span class="tx-primary addons tx-28">
                                        <i class="bi bi-nut outline fade-in"></i>
                                        <i class="bi bi-nut-fill filled fade-in"></i>
                                    </span>
                                    <h5 class="flex-grow-1 mb-0 ms-3">Bulk Tools</h5>
                                </div>
                                <p class="mb-0">Et harum quidem rerum facilis est et expedita distinctio. Nam libero
                                    tempore, cum soluta nobis est eligendi optio cumque.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card feature-card reveal">
                            <div class="card-body">
                                <div class="mb-2 d-flex align-items-center">
                                    <span class="tx-primary addons tx-28">
                                        <i class="bi bi-cpu outline fade-in"></i>
                                        <i class="bi bi-cpu-fill filled fade-in"></i>
                                    </span>
                                    <h5 class="flex-grow-1 mb-0 ms-3">DNS Management</h5>
                                </div>
                                <p class="mb-0">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                    fugit, sed quia consequuntur magni dolores eos.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card feature-card reveal">
                            <div class="card-body">
                                <div class="mb-2 d-flex align-items-center">
                                    <span class="tx-primary addons tx-28">
                                        <i class="bi bi-menu-app outline fade-in"></i>
                                        <i class="bi bi-menu-app-fill filled fade-in"></i>
                                    </span>
                                    <h5 class="flex-grow-1 mb-0 ms-3">Easy To Use Control Panel</h5>
                                </div>
                                <p class="mb-0">Ut enim ad minima veniam, quis nostrum exercitationem corporis suscipit
                                    laboriosam, nisi ut aliquid commodi consequatur.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card feature-card reveal">
                            <div class="card-body">
                                <div class="mb-2 d-flex align-items-center">
                                    <span class="tx-primary addons tx-28">
                                        <i class="bi bi-shield-exclamation outline fade-in"></i>
                                        <i class="bi bi-shield-fill-exclamation filled fade-in"></i>
                                    </span>
                                    <h5 class="flex-grow-1 mb-0 ms-3">Domain Theft Protection</h5>
                                </div>
                                <p class="mb-0">Nam libero tempore, nobis est eligendi optio cumque nihil impedit quo
                                    minus id quod maxime placeat facere possimus, omnis voluptas est.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card feature-card reveal">
                            <div class="card-body">
                                <div class="mb-2 d-flex align-items-center">
                                    <span class="tx-primary addons tx-28">
                                        <i class="bi bi-skip-forward outline fade-in"></i>
                                        <i class="bi bi-skip-forward-fill filled fade-in"></i>
                                    </span>
                                    <h5 class="flex-grow-1 mb-0 ms-3">Domain Forwarding</h5>
                                </div>
                                <p class="mb-0">At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                    blanditiis praesentium voluptatum deleniti atque corrupti dolores.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section bg-pattern-2 bg-image2">
            <div class="container">
                <div class="heading-section">
                    <div class="heading-title text-white">Statistic</div>
                    <div class="heading-description text-white op-8">Jumlah limbah yang di kumpulkan.</div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card text-center feature-card-16 mb-lg-0">
                            <div class="card-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="var(--primary-color)" class="bi bi-box-seam-fill" enable-background="new 0 0 3873 3873" viewBox="0 0 320 512">
                                    <path d="M128 0C110.3 0 96 14.3 96 32l0 60c-4 1.2-8 2.8-11.8 4.6l-13.2 6.2C47.2 113.9 32 137.8 32 164.2c0 18.1 7.1 34.5 18.6 46.7C39.1 222.4 32 238.4 32 256c0 19.1 8.4 36.3 21.7 48C40.4 315.7 32 332.9 32 352s8.4 36.3 21.7 48C40.4 411.7 32 428.9 32 448c0 35.3 28.7 64 64 64l128 0c35.3 0 64-28.7 64-64c0-19.1-8.4-36.3-21.7-48c13.3-11.7 21.7-28.9 21.7-48s-8.4-36.3-21.7-48c13.3-11.7 21.7-28.9 21.7-48c0-17.6-7.1-33.6-18.6-45.1c11.5-12.2 18.6-28.6 18.6-46.7c0-26.3-15.2-50.3-39.1-61.4l-13.2-6.2C232 94.8 228 93.3 224 92l0-60c0-17.7-14.3-32-32-32L128 0zm69.3 104c11 0 21.8 2.4 31.7 7.1l13.2 6.2c18.2 8.5 29.8 26.8 29.8 46.9c0 16.4-7.6 31.1-19.6 40.6c-1.9 1.5-3.1 3.9-3 6.4s1.2 4.8 3.2 6.3c11.8 8.8 19.4 22.8 19.4 38.6c0 17.5-9.3 32.7-23.3 41.1c-2.4 1.4-3.9 4-3.9 6.9s1.5 5.4 3.9 6.9c14 8.4 23.3 23.7 23.3 41.1s-9.3 32.7-23.3 41.1c-2.4 1.4-3.9 4-3.9 6.9s1.5 5.4 3.9 6.9c14 8.4 23.3 23.7 23.3 41.1c0 26.5-21.5 48-48 48L96 496c-26.5 0-48-21.5-48-48c0-17.4 9.3-32.7 23.3-41.1c2.4-1.4 3.9-4 3.9-6.9s-1.5-5.4-3.9-6.9C57.3 384.7 48 369.4 48 352s9.3-32.7 23.3-41.1c2.4-1.4 3.9-4 3.9-6.9s-1.5-5.4-3.9-6.9C57.3 288.7 48 273.5 48 256c0-15.8 7.6-29.8 19.4-38.6c2-1.5 3.2-3.8 3.2-6.3s-1.1-4.8-3-6.4c-12-9.5-19.6-24.2-19.6-40.6c0-20.1 11.6-38.4 29.8-46.9L91 111.1c9.9-4.6 20.7-7.1 31.7-7.1l74.6 0zm0-16l-74.6 0L112 88l0-56c0-8.8 7.2-16 16-16l64 0c8.8 0 16 7.2 16 16l0 56-10.7 0zM96 216c0 4.4 3.6 8 8 8l112 0c4.4 0 8-3.6 8-8s-3.6-8-8-8l-112 0c-4.4 0-8 3.6-8 8zm8 152c-4.4 0-8 3.6-8 8s3.6 8 8 8l112 0c4.4 0 8-3.6 8-8s-3.6-8-8-8l-112 0z" />
                                </svg>
                                <h4 class="">Botol Plastik</h4>
                                <h2 class="counter tx-primary  mb-0">36</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card text-center feature-card-16 mb-lg-0 secondary">
                            <div class="card-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="var(--primary-color)" class="bi bi-box-seam-fill" enable-background="new 0 0 3873 3873" viewBox="0 0 384 512">
                                    <path d="M343 456.5c-7 6.7-17.9 13.5-32.7 19.6C280.9 488.2 239 496 192 496s-88.9-7.8-118.4-19.9c-14.8-6-25.7-12.8-32.7-19.6c-6.9-6.7-9-12.3-9-16.5V279.9c15.1 9.6 34.6 17.6 56.9 23.6c7.4 2 15.2 3.8 23.2 5.3c2.5 41.9 37.3 75.2 79.9 75.2s77.4-33.2 79.9-75.2c8.1-1.5 15.8-3.3 23.2-5.3c22.3-6 41.9-13.9 56.9-23.6V440c0 4.3-2 9.8-9 16.5zM271.2 292.6C265.7 253.8 232.3 224 192 224s-73.7 29.8-79.2 68.6c-6.8-1.4-13.4-2.9-19.7-4.6c-26.6-7.1-47.6-16.8-61.1-27.8V107.4c9.5 8.8 22.6 16.5 38.2 22.7c31.6 12.6 74.6 20.3 121.8 20.3s90.2-7.6 121.8-20.3c15.6-6.2 28.8-13.9 38.2-22.7V260.3c-13.5 10.9-34.5 20.6-61.1 27.8c-6.3 1.7-12.9 3.2-19.7 4.6zM352 75.2c0 6.4-3.2 13.2-10.7 20.3c-7.5 7.1-18.8 13.9-33.5 19.7C278.6 127 237.6 134.4 192 134.4s-86.6-7.4-115.8-19.1c-14.6-5.9-26-12.6-33.5-19.7C35.2 88.4 32 81.6 32 75.2s3.2-13.2 10.7-20.3C50.2 47.7 61.5 41 76.2 35.1C105.4 23.4 146.4 16 192 16s86.6 7.4 115.8 19.1c14.6 5.9 26 12.6 33.5 19.7c7.5 7.1 10.7 14 10.7 20.3zm16 0V72c0-39.8-78.8-72-176-72S16 32.2 16 72v3.2V440c0 39.8 78.8 72 176 72s176-32.2 176-72V75.2zM128 304a64 64 0 1 1 128 0 64 64 0 1 1 -128 0z" />
                                </svg>
                                <h4 class="">Kaleng</h4>
                                <h2 class="counter tx-secondary  mb-0">25</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card text-center feature-card-16 mb-lg-0 success">
                            <div class="card-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="var(--primary-color)" class="bi bi-box-seam-fill" enable-background="new 0 0 3873 3873" viewBox="0 0 448 512">
                                    <path d="M342.4 48H232V176H430c-.6-2-1.3-4-2.2-5.9L386.3 76.5C378.6 59.2 361.4 48 342.4 48zM432 192H16V416c0 26.5 21.5 48 48 48H384c26.5 0 48-21.5 48-48V192zM18 176H216V48H105.6c-19 0-36.2 11.2-43.9 28.5L20.1 170.1c-.9 1.9-1.6 3.9-2.2 5.9zM342.4 32c25.3 0 48.2 14.9 58.5 38l41.6 93.6c3.6 8.2 5.5 17 5.5 26V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V189.6c0-9 1.9-17.8 5.5-26L47.1 70c10.3-23.1 33.2-38 58.5-38H342.4z" />
                                </svg>
                                <h4 class="">Kardus</h4>
                                <h2 class="counter tx-success  mb-0">500</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card text-center feature-card-16 mb-lg-0 danger">
                            <div class="card-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="var(--primary-color)" class="bi bi-box-seam-fill" enable-background="new 0 0 3873 3873" viewBox="0 0 448 512">
                                    <path d="M177.7 16h92.5c8.3 0 16 4.3 20.4 11.3l23 36.7H134.4l23-36.7c4.4-7 12.1-11.3 20.4-11.3zm-33.9 2.8L115.6 64H8c-4.4 0-8 3.6-8 8s3.6 8 8 8H440c4.4 0 8-3.6 8-8s-3.6-8-8-8H332.4L304.2 18.8C296.9 7.1 284.1 0 270.3 0H177.7c-13.8 0-26.6 7.1-33.9 18.8zM48 119.3c-.4-4.4-4.2-7.7-8.6-7.3s-7.7 4.2-7.3 8.6l28.3 340c2.4 29 26.7 51.4 55.8 51.4H331.8c29.1 0 53.4-22.3 55.8-51.4l28.3-340c.4-4.4-2.9-8.3-7.3-8.6s-8.3 2.9-8.6 7.3l-28.3 340C370 480.1 352.6 496 331.8 496H116.2c-20.8 0-38.1-15.9-39.9-36.7L48 119.3z" />
                                </svg>
                                <h4 class="">Total Limbah</h4>
                                <h2 class="counter tx-danger  mb-0">200</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="heading-section">
                    <div class="heading-subtitle"><span class="tx-primary tx-16 fw-semibold">Produk Akhir</span></div>
                    <div class="heading-title">Produk <span class="tx-primary"> Daur Ulang </span> </div>
                    <div class="heading-description">Dari limbah rumah tangga Anda, menjadi barang bernilai yang layak
                        pakai.</div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-lg-0">
                            <div class="position-relative">
                                <a href="blog-details.html">
                                    <img class="card-img-top" src="<?= base_url('assets/') ?>images/blog/3.jpg" alt="blog-image">
                                </a>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5><a href="blog-details.html" class="tx-color-default">Starting a Web Hosting
                                        Business</a></h5>
                                <div class="tx-muted">To take a trivial example, which of us ever undertakes laborious
                                    physical exerciser , except to obtain some advantage from it...</div>
                            </div>
                        </div>
                        <!-- COL-END -->
                    </div>
                    <!-- COL-END -->
                    <div class="col-lg-4">
                        <div class="card mb-lg-0">
                            <div class="position-relative">
                                <a href="blog-details.html">
                                    <img class="card-img-top" src="<?= base_url('assets/') ?>images/blog/6.jpg" alt="blog-image">
                                </a>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5><a href="blog-details.html" class="tx-color-default">Email Hosting For Your
                                        Projects</a></h5>
                                <div class="tx-muted">At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                    blanditiis praesentium voluptatum deleniti atque...</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card mb-lg-0">
                            <div class="position-relative">
                                <a href="blog-details.html">
                                    <img class="card-img-top" src="<?= base_url('assets/') ?>images/blog/5.jpg" alt="blog-image">
                                </a>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5><a href="blog-details.html" class="tx-color-default"> Cloud Hosting growing faster
                                    </a></h5>
                                <div class="tx-muted">Itaque earum rerum hic tenetur a sapiente delectus, ut aut
                                    reiciendis voluptatibus maiores alias consequatur aut ..</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- END MAIN-CONTENT -->
</div>
<!-- END PAGE -->

<!-- SCRIPTS -->

<!-- BOOTSTRAP JS -->
<script src="<?= base_url('assets/') ?>libs/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- POPPER JS -->
<script src="<?= base_url('assets/') ?>libs/popperjs/core/umd/popper.min.js"></script>

<!-- DEFAULTMENU JS -->
<script src="<?= base_url('assets/') ?>js/defaultmenu.js"></script>

<!-- CATEGORYMENU JS -->
<script src="<?= base_url('assets/') ?>js/category-menu.js"></script>

<!-- ACCEPT-COOKIE JS -->
<script src="<?= base_url('assets/') ?>js/cookies.js"></script>

<!-- SIMONWEP-PICKER JS -->
<script src="<?= base_url('assets/') ?>libs/simonwep/pickr/pickr.es5.min.js"></script>
<script src="<?= base_url('assets/') ?>js/picker.js"></script>

<!-- Live Chat -->
<script src="<?= base_url('assets/') ?>js/live-chat.js"></script>
<script src="../../../code.tidio.co_443/ejjaylsnuydywf5a0sqc1gvcus5orpml.js" async></script>

<!-- STICKY JS -->
<script src="<?= base_url('assets/') ?>js/sticky.js"></script>

<!-- CUSTOM JS -->
<script src="<?= base_url('assets/') ?>js/custom.js"></script>

<!-- CUSTOM-SWITCHER JS -->
<script src="<?= base_url('assets/') ?>js/custom-switcher.js"></script>

<!-- SWIPER JS -->
<script src="<?= base_url('assets/') ?>libs/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url('assets/') ?>js/swiper.js"></script>

<!-- COUNTDOWN JS -->
<script src="<?= base_url('assets/') ?>js/countdown.js"></script>

<!-- END SCRIPTS -->

<!-- Mirrored from codeigniter.spruko.com/hostma/hostma/index by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 May 2024 04:44:05 GMT -->

</html>