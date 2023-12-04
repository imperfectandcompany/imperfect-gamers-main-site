<?php
if (!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST' && ($_POST['login'] || $_POST['openid_mode'])) {

    include $GLOBALS['config']['private_folder'] . '/steam/openid.php';

    switch ($_GET['openid_mode']) {
        case "cancel":
            header("Location: /login");
            break;
        default:
            if (isset($_POST['login'])) {
                $openid = new LightOpenID;
                $openid->identity = 'http://steamcommunity.com/openid';
                header('Location: ' . $openid->authUrl());
            }
    }
}

if ($_GET) {
    if ($_GET['openid_claimed_id'] && User::isLoggedIn()) {
        //This needs better security probably, anyone could toss in a steam ID here but right now it's nothing to worry about.
        $steam_id_64 = str_replace("https://steamcommunity.com/openid/id/", "", $_GET['openid_claimed_id']);
        $steam_id = steamid64_to_steamid2($steam_id_64);
        $filter_params[] = array("value" => $steam_id_64, "type" => PDO::PARAM_INT);
        $filter_params[] = array("value" => $steam_id, "type" => PDO::PARAM_INT);
        $filter_params[] = array("value" => $userid, "type" => PDO::PARAM_INT);
        $updateResult = DatabaseConnector::updateData(
            "profiles",
            "steam_id = :steamId, steam_id_64 = :steamId64",
            "user_id = :id",
            array(':steamId' => $steam_id, ':steamId64' => $steam_id_64, ':id' => $userid)
        );

        $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;

        /* Step 1. Check if user exists, if exists - update with ip otherwise insert with uid and ip
         * Step 2. Update session token for player (which is now confirmed to exist)
         */
        $pdo = DatabaseConnector::getDatabase('igfastdl_donate');
        $stmt = $pdo->prepare('SELECT uid FROM players WHERE uid = :uid');
        $stmt->execute([':uid' => $steamId]);
        $playerExists = $stmt->fetch();

        if (!$playerExists) {
            // Insert new player
            $stmt = $pdo->prepare('INSERT INTO players (uid, ip) VALUES (:uid, :ip)');
            $stmt->execute([':uid' => $steam_id_64, ':ip' => $_SERVER['REMOTE_ADDR']]);
        } else {
            // Update existing player
            $stmt = $pdo->prepare('UPDATE players SET ip = :ip WHERE uid = :uid');
            $stmt->execute([':uid' => $steam_id_64, ':ip' => $_SERVER['REMOTE_ADDR']]);
        }

        // Update session token for player
        $stmt = $pdo->prepare('UPDATE players SET session_token = :token WHERE uid = :uid');
        $stmt->execute([':token' => sha1($_COOKIE['token']), ':uid' => $steam_id_64]);
        setcookie('uid', $steam_id_64, time() + 60 * 60 * 24 * 7, '/', $domain, false);
        $_SESSION['uid'] = $steam_id_64;

        $_SESSION['messages']['success'][] = "Steam account attached successfully!";

        //$dbConnection->updateData($GLOBALS['db_conf']['db_db'].".profiles", "steam_id_64 = ?, steam_id_3 = ? WHERE id = ?", $filter_params);
        header("location: " . $GLOBALS['config']['url'] . "/settings");
    }
}

function steamid64_to_steamid2($steamid64)
{
    $accountID = bcsub($steamid64, '76561197960265728');
    return 'STEAM_1:' . bcmod($accountID, '2') . ':' . bcdiv($accountID, 2);
}
