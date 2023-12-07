<?php

global $UID, $message, $db;

if (!prometheus::loggedInIG()) {
    util::redirect('/login');

    die('You must be signed in to purchase a package');
}

if (!prometheus::loggedIn()) {
    util::redirect('/settings');
    die('You must have your steam linked via settings to purchase a package!');
}

$error = false;
$msg = '';
$customjob = false;

if (!isset($_GET['uid'])) {
    $for = null;
} else {
    $for = $_GET['uid'];
}

$price = $_GET['price'] ?? null;

if ($_GET['type'] == 'pkg') {
    $verify = new verification('none', $for, $_GET['pid']);
    $verifyArray = $verify->verifyPackage($price);

    $error = $verifyArray['error'];
    $msg = $verifyArray['msg'];
}

$userEmail = null;
if (isset($_GET['gateway']) && $_GET['gateway'] === 'paymentwall') {
    $userEmail = $db->getOne("SELECT email FROM players WHERE uid = ?", $UID);
}

if (isset($_POST['email_submit'])) {
    $error = false;

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $message->add('danger', 'This email address is invalid!');
    }

    if (!$error) {
        $db->execute("UPDATE players SET email = ? WHERE uid = ?", [$_POST['email'], $UID]);
        $userEmail = $_POST['email'];
    }
}

?>

<?php if (prometheus::loggedInIG() && prometheus::loggedIn() && isset($_GET['pid']) && !isset($_GET['gateway']) && tos::getLast() > getSetting('tos_lastedited', 'value3')) { ?>
    <style>
        .header {
            width: 100%;
            font-weight: 700;
            font-size: 40px;
            text-transform: uppercase;
            color: #fff
        }

        .info-box {
            border-left: 3px solid rgba(49, 182, 191, .6)
        }

        .darker-box,
        .info-box {
            width: 100%;
            height: auto;
            padding: 15px;
            background: rgba(0, 0, 0, .4);
            margin-top: 15px
        }

        .btn-prom {
            background-color: rgba(0, 0, 0, .6) !important;
            color: #fff !important;
            border-radius: 0 !important
        }

        .btn-prom:hover {
            background-color: rgba(0, 0, 0, .2) !important;
            color: #fff !important
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            color: grey;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: .875rem;
            line-height: 1.5;
            border-radius: 0;
            -webkit-transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out
        }

        @media (prefers-reduced-motion:reduce) {
            .btn {
                -webkit-transition: none;
                transition: none
            }
        }

        .btn:hover {
            color: grey;
            text-decoration: none
        }

        .btn.focus,
        .btn:focus {
            outline: 0;
            box-shadow: 0 0 0 .2rem rgba(169, 42, 42, .25)
        }

        .btn.disabled,
        .btn:disabled {
            opacity: .65
        }

        a.btn.disabled,
        fieldset:disabled a.btn {
            pointer-events: none
        }

        .btn-primary {
            color: #212529;
            background-color: rgba(169, 42, 42, .6)
        }

        .srv-box {
            text-align: center;
            height: 115px;
            padding-top: 25px;
            margin-bottom: 50px;
            color: #fff !important;
            -webkit-transition: all .2s;
            transition: all .2s
        }

        .store-box .store-box-upper span {
    font-family: BebasNeue;
    font-size: 30px;
    padding-top: 5px;
    display: block;
    color: #fff;
    text-align: center;
    border-bottom: 1px solid transparent
}

.credit-content,
.store-box {
    background-color: rgba(0, 0, 0, .4)
}

@supports ((-webkit-backdrop-filter:none) or (backdrop-filter:none)) {
    .bs-callout,
    .btn,
    .buy-btn,
    .card,
    .content-page-top,
    .darker-box,
    .dashboard-widget-small-box,
    .dropdown-menu,
    .featured-pkg,
    .main-menu-box,
    .news-block,
    .panel-body,
    .progress-bar,
    .splash-box,
    .splash-section-header,
    .srv-box,
    .stat-box,
    .stat-box-header,
    .store-box,
    .ticket-header,
    table {
        -webkit-backdrop-filter: blur(10px);
        backdrop-filter: blur(10px)
    }
}


.store-box .store-box-upper ul {
    display: block;
    list-style-type: none;
    padding: 0
}

.store-box .store-box-upper ul li {
    padding: 10px;
    width: 100%;
    border-top: 1px solid transparent;
    display: block;
    text-align: center
}

.store-box .store-box-upper ul li:last-child {
    border-bottom: 1px solid transparent
}

        .srv-box .srv-box i,
        .srv-box .srv-box svg {
            color: #fff !important;
            -webkit-transition: all 1s;
            transition: all 1s
        }

        .srv-box:hover {
            text-decoration: none;
            background-color: rgba(0, 0, 0, .8)
        }

        .srv-box:hover i,
        .srv-box:hover svg {
            color: #c10000 !important
        }

        .srv-box .srv-label {
            margin-top: 25px;
            bottom: 0
        }

        .srv-box .srv-label,
        .stat-box-header {
            background-color: rgba(0, 0, 0, .8);
            padding: 10px
        }

        .store-box-header {
            width: auto;
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            font-family: Open Sans;
            font-weight: 700;
            font-size: 30px;
            text-transform: uppercase;
            color: #fff;
            background-color: rgba(0, 0, 0, .8);
            text-align: center;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap
        }

        .store-box {
            height: auto;
            width: auto;
            text-align: left;
            border-bottom: 1px solid transparent;
            border-right: 1px solid transparent;
            border-left: 1px solid transparent
        }

        .store-box img {
            -o-object-position: center !important;
            object-position: center !important;
            -o-object-fit: cover !important;
            object-fit: cover !important
        }

        .store-box .store-box-upper span {
            font-family: BebasNeue;
            font-size: 30px;
            padding-top: 5px;
            display: block;
            color: #fff;
            text-align: center;
            border-bottom: 1px solid transparent
        }

        .store-box .store-box-upper ul {
            display: block;
            list-style-type: none;
            padding: 0
        }

        .store-box .store-box-upper ul li {
            padding: 10px;
            width: 100%;
            border-top: 1px solid transparent;
            display: block;
            text-align: center
        }

        .store-box .store-box-upper ul li:last-child {
            border-bottom: 1px solid transparent
        }


        .store-box-lower {
            padding-left: 10px;
            padding-right: 10px;
            padding-bottom: 10px;
            color: grey;
            text-align: center;
            word-wrap: break-word !important
        }

        .buy-btn {
            padding: 10px;
            background-color: rgba(193, 0, 0, .4);
            display: block;
            margin-bottom: 20px;
            -webkit-text-decoration: bold;
            text-decoration: bold;
            width: 100%;
            border: 1px solid transparent;
            border-top: 0;
            color: #fff !important;
            text-align: center;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            -webkit-transition: all .2s;
            transition: all .2s
        }

        .buy-btn:focus,
        .buy-btn:hover {
            background-color: rgba(193, 0, 0, .8) !important;
            color: #fff !important
        }
    </style>
    <div class="header">
        <?= lang('select_gateway', 'Select payment method'); ?>
    </div>

    <?php $message->display(); ?>

    <div class="row mb-5">
        <?php if (getSetting('enable_coupons', 'value2') && $_GET['type'] == 'pkg' && getEditPackage($_GET['pid'], 'custom_price') == 0) { ?>
            <div class="col-md-<?php echo getSetting('buy_others', 'value2') ? '6' : '12'; ?>">
                <div class="info-box h-100">
                    <form method="POST">
                        <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
                        <h2>
                            <?= lang('coupon_text'); ?>
                        </h2>
                        <input type="text" placeholder="..." class="form-control" name="coupon"
                            value="<?= $_GET['coupon'] ?? ''; ?>">
                        <input type="submit" class="btn btn-prom" value="<?= lang('submit'); ?>" style="margin-top: 5px;"
                            name="coupon_submit">
                    </form>
                </div>
            </div>
        <?php } ?>

        <?php if (!$customjob && getSetting('buy_others', 'value2')) { ?>
            <div class="col-md-<?php echo getSetting('enable_coupons', 'value2') ? '6' : '12'; ?>">
                <div class="info-box h-100 ">
                    <form method="POST">
                        <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
                        <h2>
                            <?= lang('buying_someone_else'); ?>
                        </h2>
                        <input type="text" placeholder="Steam Community ID(7656119xxxxxxxxxx)" class="form-control" name="cuid"
                            value="<?= $_GET['uid'] ?? ''; ?>">
                        <input type="submit" class="btn btn-prom" value="<?= lang('submit'); ?>" name="cuid_submit"
                            style="margin-top: 5px;">
                        <?php echo isset($_GET['uid']) ? '<br><br>' . lang('buying_for') . ' &nbsp;&nbsp;<img src="' . getUserSetting('steam_avatar', $_GET['uid']) . '" width="30px" height="30px"></img>&nbsp;&nbsp;' . getUserSetting('name', $_GET['uid']) . '' : '<br><br>' . lang('buying_yourself'); ?>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="row>
        <?php

        if (!$error) {
            if (isset($_GET['uid']) && isBlacklisted($_GET['uid'])) {
                echo '<div class="col-12">' . lang("blacklisted_them", "This person is blacklisted from this community, you can not purchase for them") . '</div>';
            } elseif (isset($_GET['uid']) && !getSetting('buy_others', 'value2')) {
                echo '<div class="col-12">' . lang("buy_others_disabled", "Buying for others is disabled on this system") . '</div>';
            } else {
                $gateways = new gateways($_GET['type']);
                $gateways->setId($_GET['pid']);

                $gateways->setPrice($price);
                $gateways->setPlayer($for);

                echo $gateways->display();
            }
        } else {
            echo '<div class="col-12">';
            echo '<h2>' . $msg . '</h2>';
            if (!$customjob) {
                echo '<br>' . lang('someone_else', 'However, you can still buy it for someone else');
            }
            echo '</div>';
        }

        ?>
    </div>

  <script type=" text/javascript">
        var stripe = Stripe('
        <?php echo getSetting('stripe_publishableKey', 'value') ?>');

        $('.buy-with-stripe').on('click', function(e) {
        e.preventDefault();

        $.post($(this).attr('href'), function (data) {
        stripe.redirectToCheckout({
        sessionId: data.trim()
        }).then(function(result) {
        console.log(result);
        });
        });
        });
        </script>
    <?php } elseif (isset($_GET['pid']) && isset($_GET['gateway'])) { ?>

        <?php if (prometheus::loggedIn()) { ?>
            <?php if ($_GET['gateway'] == 'paymentwall' && $userEmail !== null) { ?>
                <div class="header">
                    Paymentwall
                </div>

                <?php

                if (isset($_GET['uid'])) {
                    $uid = $_GET['uid'];
                } else {
                    $uid = $_SESSION['uid'];
                }

                echo paymentwall::displayWidget($_GET['pid'], $_GET['uid'], $_GET['type']);

                ?>
            <?php } ?>

            <?php if ($_GET['gateway'] == 'paymentwall' && $userEmail == null) { ?>
                <div class="header">
                    Paymentwall
                </div>

                <?php $message->display(); ?>

                <form method="POST">
                    <div class="form-group">
                        We need your email address before we continue
                    </div>

                    <div class="form-group">
                        <input type="email" placeholder="Email" class="form-control" name="email">
                    </div>

                    <input type="submit" name="email_submit" class="btn btn-default" value="<?= lang('submit'); ?>">
                </form>
            <?php } ?>

            <?php if ($_GET['gateway'] == 'paysafecard') { ?>
                <div class="header">
                    Paysafecard
                </div>

                Not implemented yet
            <?php } ?>
        <?php } ?>
    <?php } else { ?>
        <div class="header">
            Invalid
        </div>
        Either you have no package id set, or you are not signed in!
    <?php } ?>