<div class="container">
    <div class="row row-grid justify-content-between align-items-center text-left" style="padding-top: 120px">
        <div class="col-lg-6 col-md-6">
            <h1 class="text-white">= config()->get('onyx.slogan') ?></h1>
            <p class="text-white mb-3">
                <?= config()->get('onyx.server_description') ?>
            </p>
            <div class="btn-wrapper mb-3">
                <p class="category text-success d-inline">
                    <?= config()->get('onyx.featured_package_info') ?>
                </p>
                <a href="<?= config()->get('onyx.featured_package_link') ?>" class="btn btn-success btn-link btn-sm">
                    <i class="fas fa-chevron-right fa-fw"></i>
                </a>
            </div>
            <div class="btn-wrapper">
                <div class="button-container">
                    <?php foreach (config()->get('onyx.links') as $link) { ?>
                        <a href="<?= $link['icon_link'] ?>" class="btn">
                            <i class="<?= $link['icon'] ?>"></i>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-5">
            <img src="<?= config()->get('onyx.logo') ?>" alt="Circle image" class="img-fluid">
        </div>
    </div>

    <div class="row" style="padding-top: 140px">
        <div class="col-md-4">
            <hr class="line-primary" style="margin-left: 0">
            <h1 class="text-white"><?= config()->get('onyx.product_info_title') ?></h1>
        </div>
    </div>

    <div class="row" style="padding-top: 60px">
        <?php foreach (config()->get('onyx.products') as $product) { ?>
            <div class="col-md-4">
                <div class="card mercury-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h4 class="text-uppercase"><?= $product['title'] ?></h4>
                                <span>Plan</span>
                                <hr class="line-primary">
                            </div>
                        </div>
                        <div class="row">
                            <ul class="list-group text-center border-0" style="width: 100%;">
                                <?php foreach ($product['features'] as $feature) { ?>
                                    <li class="list-group-item bg-transparent border-0">
                                        <?= $feature ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="<?= $product['purchase_link'] ?>" class="btn btn-primary btn-simple">
                            <?= $product['purchase_text'] ?>
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>