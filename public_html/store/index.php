<?php

session_start();

$page = 'home';
$page_title = 'Home';

try {
    require_once('inc/functions.php');

    if (isset($_GET['newlicense'])) {
        cache::clear();

        if (!prometheus::licenseCheck()) {
            setSetting($_GET['newlicense'], 'api_key', 'value', false);

            cache::clear();
        }
    }

    if (!prometheus::loggedIn()) {
        include('inc/login.php');
    } else {
        $UID = $_SESSION['uid'];
    }

    if (!getSetting('installed', 'value2')) {
        cache::clear();
        util::redirect('install.php');
    }

    if (prometheus::loggedIn() && !actions::delivered() && $page != 'required') {
        util::redirect('store.php?page=required');
    }

    if (prometheus::loggedIn() && is_numeric(actions::delivered('customjob', $_SESSION['uid'])) && $_GET['page'] !== 'customjob') {
        util::redirect('store.php?page=customjob&pid=' . actions::delivered('customjob', $_SESSION['uid']));
    }
} catch (PDOException $e) {
    util::redirect('install.php');
}

?>

<?php include('inc/header.php'); ?>
<style>
    .btn-ripple {
        display: inline-block;
        position: relative;
        overflow: hidden;
        transition: all ease-in-out .5s;
    }



    .btn-ripple::after {
        content: "";
        display: block;
        position: absolute;
        top: 0;
        left: 25%;
        height: 100%;
        width: 50%;
        background-color: #000;
        border-radius: 50%;
        opacity: 0;
        pointer-events: none;
        transition: all ease-in-out 1s;
        transform: scale(5, 5);
    }

    .btn-ripple:active::after {
        padding: 0;
        margin: 0;
        opacity: .2;
        transition: 0s;
        transform: scale(0, 0);
    }


    .fa-question-circle,
    .fa-bolt,
    .fa-credit-card {
        -webkit-transition: all 0.5s;
        transition: all 0.5s;
    }

    .fa-question-circle:hover,
    .fa-credit-card:hover,
    .fa-bolt:hover {
        transform: rotate(45deg);
    }
</style>
<link rel="stylesheet" type="text/css" href="https://imperfectgamers.org/shop/mercury/assets/themes/umbra/css/styles.css?version=3accddf64b1dd03abeb9b0b3e5a7ba44">
<link rel="stylesheet" type="text/css" href="https://imperfectgamers.org/shop/mercury/assets/themes/global/css/styles.css?version=3accddf64b1dd03abeb9b0b3e5a7ba44">

<div class="content mb-5">
    <div class="container">

    <div class="row ">
        <div class="col-xs-12">
            <?php if (tos::getLast() < getSetting('tos_lastedited', 'value3') && prometheus::loggedin()) { ?>
                <div class="info-box">
                    <form method="POST" style="width: 40%;">
                        <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">

                        <style>
                            .yeeta {
                                display: flex;
                                }
                            .yeetup
                            display: flex;
                            justify-content: flex-end;
                            }
                        </style>

                        <div class="yeeta">
                            <h2><?= lang('tos'); ?></h2>
                            <div class="yeetup">
                                <div class="infoelez">
                                    <a href="tos.php"><i class="fa fa-info-circle" style="font-size:18px;"></i></a>
                                </div>
                            </div>
                        </div>
                        <?= lang('tos_edited'); ?><br>
                        <input type="submit" class="btn btn-prom" value="<?= lang('tos_accept'); ?>" name="tos_submit" style="margin-top: 10px;">
                    </form>

                </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="row ">
        <div class="col-12">
            <div class="jumbotron bg-transparent justify-content-center text-center">
                <?php if (!prometheus::loggedin()) { ?>
                    <div class="header">
                        <?= lang('signin', 'Sign in'); ?>
                    </div>
                    <?= lang('You need to sign in first in order to purchase', 'You need to sign in first in order to buy any packages'); ?><br><br>
                    <?php echo '<a href="' .steamLogin::genUrl() . '"><img src="//steamcommunity-a.akamaihd.net/public/images/signinthroughsteam/sits_large_noborder.png"></img></a>'; ?>
                    <br><br>
                <?php } ?>
    <div class="card-deck">
            <!-- CREDIT CARD -->
            <div class="card card-splash ">
                <div class="icon">
                    <i class="fa fa-credit-card" style="font-size: 64px; color: #FFFFFF"></i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Can I use something other than paypal?</h4>
                    <p class="card-description"> You can use the debit / credit card options that are used
                        inside of paypal as a guest account.</p>
                </div>
                <div class="card-link-footer">
                    <a href='https://www.paypal.com/us/webapps/mpp/account-optional' target="_blank">Learn
                        More</a>
                </div>
            </div>

            <!-- SUBSCRIBE -->
            <div class="card card-splash">
                <div class="icon">
                    <i class="fa fa-bolt" style="font-size: 64px; color: #5cb85c"></i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Multiple packages</h4>
                    <p class="card-description">Look through our variety of packages</p>
                </div>
                <div class="card-link-footer">
                    <?php
                    if (tos::getLast() < getSetting('tos_lastedited', 'value3') && prometheus::loggedin()) {
                        echo "<a href='store.php?page=purchase&type=pkg&pid=12'>You must accept the ToS before purchasing!</a>";
                    } elseif (!prometheus::loggedin()) {
                        echo '<a href="' . steamLogin::genUrl() . '">You need to be signed in to purchase!</a>';
                    } else {
                        echo "<a href='https://imperfectgamers.org/shop/store.php?page=global'><i class='fab fa-pied-piper'></i> Browse Packages</a>";
                    }
                    ?>
                </div>
            </div>

            <!-- SUPPORT -->
            <div class="card card-splash">
                <div class="icon">
                    <i class="fa fa-question-circle" style="font-size: 64px; color: #0275d8"></i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Have any questions?</h4>
                    <p class="card-description"> Do not hesitate to open a support ticket or reach out to us on
                        discord. We have a team ready to assist.</p>
                </div>

                <div class="card-link-footer">
                    <?php
                    if (!prometheus::loggedin()) {
                        echo '<a href="' . steamLogin::genUrl() . '">You need to be signed in to open a ticket!</a>';
                    } else {
                        echo "<a href='https://www.imperfectgamers.org/store/support.php'><i class='fas fa-envelope-open'></i> Support Ticket</a>";
                    }
                    ?>
                </div>
            </div>
        </div>

        </div>
        </div>
		<style>
		.table td {
   text-align: center;
}
</style>

        <!--Table-->
        <div class="col-12">
            <div class="jumbotron bg-transparent justify-content-center text-center">
                <h3 class="text-center text-light">
                    What you get
                </h3>
            </div>
            <div class='table-responsive'>
                <table class="table text-center">
                    <caption>List of benefits</caption>
                    <!--Table body-->

                    <thead>
                        <tr class=" text-light">

                            <th class="text-center" scope="col">Commands</th>
                            <th class="text-center" scope="col">Aesthetics</th>
                            <th class="text-center" scope="col">VIP Exclusive Store</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>VIP Mute [!vmute] <i class="fas fa-check" style="color: #5cb85c; float: right"></i></td>
                            <td>Name colors <i class="fas fa-check" style="color: #5cb85c; float: right"></i></td>
                            <td>Models: [ALL] <i class="fas fa-check" style="color: #5cb85c; float: right"></i></td>
                        </tr>
                        <tr>
                            <td>VIP Menu [!vip] <i class="fas fa-check" style="color: #5cb85c; float: right"></i></td>
                            <td>Message Colors <i class="fas fa-check" style="color: #5cb85c; float: right"></i></td>
                            <td>Pets: [ALL] <i class="fas fa-check" style="color: #5cb85c; float: right"></i></td>
                        </tr>
                        <tr>
                            <td>Vote Extend [!ve] <i class="fas fa-check" style="color: #5cb85c; float: right"></i></td>
                            <td>Voice/Scoreboard/Chat Tag [VIP] <i class="fas fa-check"
                                    style="color: #5cb85c; float: right"></i></td>

                            <td>Hats: [ALL] <i class="fas fa-check" style="color: #5cb85c; float: right"></i></td>
                        </tr>

                        <tr>
                            <td>Noclip [!nc] <i class="fas fa-check" style="color: #5cb85c; float: right"></i></td>
                            <td>Paint [+paint, !paintcolor, !paintsize] <i class="fas fa-check"
                                    style="color: #5cb85c; float: right"></i></td>
                            <td>Eyewear: [ALL] <i class="fas fa-check" style="color: #5cb85c; float: right"></i></td>

                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td>Tracers: [ALL] <i class="fas fa-check" style="color: #5cb85c; float: right"></i></td>

                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td>Auras [ALL] <i class="fas fa-check" style="color: #5cb85c; float: right"></i></td>

                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td>Sprays [ALL] <i class="fas fa-check" style="color: #5cb85c; float: right"></i></td>

                        </tr>

                    </tbody>

                </table>
            </div>
        </div>

        <div class="col-12">
                    <div class="jumbotron bg-transparent justify-content-center text-center">
                        <h3 class="text-center text-light">
                            Recent Purchases
                        </h3>
                    </div>
                    <div class="card-deck">
                        <?= dashboard::getRecent(); ?>
                    </div>
                    <?php if (isset($_POST['tos_submit'])) {
                        if (!csrf_check())
                            return util::error("Invalid CSRF token!");

                        tos::agree();

                        echo "<script type='text/javascript'>window.location.replace('splash.php?tos=1')</script>";

                    } ?>
                </div>


        <div class="row">
            <div class="col">
                <?php if (isset($_GET['installed']) && $_GET['installed'] == true) { ?>
                    <p class="bs-callout bs-callout-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        Installation successful! Please delete install.php if it didn't do it itself. The first
                        user who signs in gets admin access!<br>
                    </p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php if (isset($_GET['tos']) && $_GET['tos'] == 1) {
    echo "<script type='text/javascript'>console.log('TOS has been agreed. You now have access to purchasing packages, if for some reason there is an issue please come on the discord for immediate assistance. Thank you!');</script>";

} ?>

<?php include('inc/footer.php'); ?>