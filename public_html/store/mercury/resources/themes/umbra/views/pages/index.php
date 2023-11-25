<div class="content mb-5">
    <div class="container">

        <!-- Start Server Info  -->
        <?php if(config()->get('umbra.show_server_info')) { ?>
        <div class="splash-info">
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="splash-section-header splash-box">
                        <img src="= config()->get('umbra.logo'); ?>" class="pb-4" style="width: auto; height: 100%" alt="<?= config()->get('umbra.server_name'); ?>">
                        <h2>Welcome to <?= config()->get('umbra.server_name'); ?></h2>
                        <p><?= config()->get('umbra.server_description'); ?></p>
                    </div>
                </div>
            </div>
            <?php } ?>

            <!-- Start First Row  -->
            <?php if(config()->get('umbra.show_primary_row')) { ?>
                <div class="card-deck">
                    <?php foreach(config()->get('umbra.primary_row_cards') as $card) { ?>
                        <div class="card card-splash">
                            <div class="icon">
                                <i class="<?= $card['icon']; ?>" style="font-size: 64px; color: <?= $card['icon_color']; ?>;"></i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title"><?= $card['title']; ?> </h4>
                                <p class="card-description"> <?= $card['info']; ?> </p>
                            </div>
                            <div class="card-link-footer">
                                <a href="<?= $card['link']; ?>"> <?= $card['link_title']; ?> </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

            <!-- Start Second Row  -->
            <div class="splash-info">
                <?php if(config()->get('umbra.show_secondary_row')): ?>
                    <div class="row">
                        <div class="col-8 offset-2">
                            <div class="splash-section-header splash-box">
                                <h2><?= config()->get('umbra.secondary_row_title') ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-deck">
                        <?php foreach(config()->get('umbra.secondary_row_cards') as $card){ ?>
                            <div class="card card-splash">
                                <div class="icon">
                                    <i class="<?= $card['icon']; ?>" style="font-size: 64px; color: <?= $card['icon_color']; ?>;"></i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title"><?= $card['title']; ?> </h4>
                                    <p class="card-description"> <?= $card['info']; ?> </p>
                                </div>
                                <div class="card-link-footer">
                                    <a href="<?= $card['link']; ?>"> <?= $card['link_title']; ?> </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>