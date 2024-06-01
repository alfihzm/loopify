<section id="rev" class="section overflow-hidden">
    <div class="container">
        <div class="heading-section">
            <div class="heading-subtitle"><span class="tx-primary tx-16 fw-semibold">Reviews</span></div>
            <div class="heading-title">Apa Yang Orang Bicarakan <span class="tx-primary">Tentang Kami</span>
            </div>
            <div class="heading-description">Client Reviews</div>
        </div>
        <div class="row align-items-center">
            <div class="col-xl-3 text-center text-lg-start feature-client-bg">
                <span><i class="bi bi-quote tx-secondary tx-50"></i></span>
                <p class="h3 mb-5">Kata Client Tentang Kami</p>
                <div class="swiper-pagination"></div>
            </div>
            <div class="col-xl-9">
                <div class="bg-client position-relative">
                    <img src="<?= base_url('assets/') ?>images/patterns/9.png" alt="img"
                        class="patterns-11 z-index-0 filter-invert op-2">
                    <div class="swiper testimonialSwiper">
                        <div class="swiper-wrapper">
                            <!-- START DI SINI -->
                            <?php foreach($review as $r) : ?>
                            <div class="swiper-slide">
                                <div class="card shadow-none mb-0">
                                    <div class="card-body" style="height: 250px">
                                        <div class="d-flex align-items-center">
                                            <img src="<?= base_url('assets/images/user/profile/') . $r['photo']; ?>"
                                                alt="img" class="avatar avatar-lg rounded-circle me-2">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0 text-white"><?= $r['nama']; ?></h6>
                                                <span class="tx-11">12 Aug, 2022</span>
                                            </div>
                                            <i class="bi bi-quote review-quote"></i>
                                        </div>
                                        <p class="mt-2 mb-0 tx-14">
                                            <?= $r['review']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
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