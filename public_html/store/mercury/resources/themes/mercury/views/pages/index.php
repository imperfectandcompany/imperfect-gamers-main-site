<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="jumbotron bg-transparent justify-content-center text-center">
                <h1 class="text-white"><?= config()->get('mercury.server_name') ?></h1>
                <p class="text-light"><?= config()->get('mercury.slogan') ?></p>
                <img src="<?= config()->get('mercury.logo') ?>" alt="logo" class="mx-auto" style="width: auto; height: 100%">
                <div class="d-flex justify-content-center align-content-center text-center my-5">
                    <?php foreach (config()->get('mercury.links') as $link) { ?>
                        <a href="<?= $link['link'] ?>" class="btn px-4 btn-mercury rounded mx-3">
                            <i class="<?= $link['icon'] ?> fa-fw" style="color: <?= $link['icon_color'] ?>"></i>
                            <?= $link['title'] ?>
                        </a>
                    <?php } ?>
                </div>

                <div class="card-deck">
                    <?php foreach (config()->get('mercury.stats') as $stat) { ?>
                        <div class="card my-2 bg-brand-dark-grey text-center" style="flex-basis: 210px;">
                            <div class="card-body text-light align-items-center">
                                <i class="fas <?= $stat['icon'] ?> fa-fw fa-2x" style="color: <?= $stat['icon_color'] ?>"></i>
                                <h6 class="card-title h3"><?= $stat['title'] ?></h6>
                                <p class="card-text h5"><?= $stat['statistic'] ?></p>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="jumbotron bg-transparent justify-content-center text-center">
                <h3 class="text-center text-light">
                    <?= config()->get('mercury.feature_divider_title') ?>
                </h3>
            </div>

            <div class="card-deck">
                <?php foreach (config()->get('mercury.features') as $feature) { ?>
                    <div class="card bg-brand-dark-grey text-center my-2" style="flex-basis: 210px;">
                        <div class="card-header bg-transparent border-0 m-3 justify-content-center">
                            <i class="fas <?= $feature['icon'] ?> text-white fa-fw fa-2x" style="color: <?= $feature['icon_color'] ?>"></i>
                        </div>
                        <div class="card-body text-light">
                            <p class="card-text">
                                <?= $feature['description'] ?>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</div>