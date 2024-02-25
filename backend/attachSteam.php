<?php
if (!empty($_POST) && $_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['login'] || $_POST['openid_mode'])) {
    include $GLOBALS['config']['private_folder'] . '/steam/openid.php';
    // Sanitize the openid_mode parameter
    $openid_mode = filter_input(INPUT_GET, 'openid_mode', FILTER_SANITIZE_STRING);

    switch ($openid_mode) {
        case "cancel":
            header("location: " . sanitizeUrl($GLOBALS['config']['url'] . "/settings"));
            break;
        default:
            if (isset($_POST['login']) && User::isLoggedIn()) {
                // Generate a unique token for the steam integration
                $_SESSION['steam_integration_token'] = bin2hex(random_bytes(32));
                $openid = new LightOpenID;
                $openid->identity = 'http://steamcommunity.com/openid';
                $openid->returnUrl .= "?steam_integration_token=" . $_SESSION['steam_integration_token']; // Append the token to return URl
                header('Location: ' . $openid->authUrl());
            } else {
                header("location: " . sanitizeUrl($GLOBALS['config']['url'] . "/settings"));
            }
    }
}

if ($_GET) {
    if ($_GET['openid_claimed_id'] && User::isLoggedIn()) {
        // Check if the session's auth_token matches the returned state parameter (if you were able to include it in the returnUrl)
        if (isset($_GET['steam_integration_token']) && $_GET['steam_integration_token'] === $_SESSION['steam_integration_token']) {
            // Wipe one time CSRF protection token
            unset($_SESSION['steam_integration_token']);
            // Proceed with processing the Steam ID
            $steam_id_64 = str_replace("https://steamcommunity.com/openid/id/", "", $_GET['openid_claimed_id']);
            if (isValidSteamID($steam_id_64)) {
                // The Steam ID is valid, and the request is associated with the current session's auth flow
                $steam_id = steamid64_to_steamid2($steam_id_64);
                //$filter_params[] = array("value" => $steam_id_64, "type" => PDO::PARAM_INT);
                //$filter_params[] = array("value" => $steam_id, "type" => PDO::PARAM_INT);
                //$filter_params[] = array("value" => $userid, "type" => PDO::PARAM_INT);
                $updateResult = DatabaseConnector::updateData(
                    "profiles",
                    "steam_id = :steamId, steam_id_64 = :steamId64",
                    "user_id = :id",
                    array(':steamId' => $steam_id, ':steamId64' => $steam_id_64, ':id' => $userid)
                );

                $domain = ($_SERVER['HTTP_HOST'] !== 'localhost') ? $_SERVER['HTTP_HOST'] : false;

                /* Step 1. Check if user exists, if exists - update with ip otherwise insert with uid and ip
                 * Step 2. Update session token for player (which is now confirmed to exist)
                 * Commented out as we're rebuilding our infrastructure and this is not needed at the moment
                
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
 
                // Update session token for player (Commented out as we're rebuilding our infrastructure and this is not needed at the moment)
                // $stmt = $pdo->prepare('UPDATE players SET session_token = :token WHERE uid = :uid');
                // $stmt->execute([':token' => sha1($_COOKIE['token']), ':uid' => $steam_id_64]);
                // setcookie('uid', $steam_id_64, time() + 60 * 60 * 24 * 7, '/', $domain, true, true); // Secure and HttpOnly flags
                */

                //$dbConnection->updateData($GLOBALS['db_conf']['db_db'].".profiles", "steam_id_64 = ?, steam_id_3 = ? WHERE id = ?", $filter_params);
                header("location: " . sanitizeUrl($GLOBALS['config']['url'] . "/settings"));
            } else {
                // The Steam ID is invalid
                header("location: " . sanitizeUrl($GLOBALS['config']['url'] . "/settings"));
            }
        } else {
            // The tokens don't match or the token is missing
            // This could indicate an attempt to attach a Steam ID without proper authentication flow
            // Potential security issue or error
            // Unset the token as it should not be reused
            unset($_SESSION['steam_integration_token']);
            header("location: " . sanitizeUrl($GLOBALS['config']['url'] . "/settings"));
        }
    } else {
        // Unset the token just in case it was set
        unset($_SESSION['steam_integration_token']);
        // Either the openid_claimed_id parameter is missing or the user is not logged in
        // Return to settings, settings page will return user to the login page if not logged in
        header("location: " . sanitizeUrl($GLOBALS['config']['url'] . "/settings"));
    }
}

function isValidSteamID($steam_id)
{
    return preg_match('/^7656119[0-9]{10}+$/', $steam_id);
}

function steamid64_to_steamid2($steamid64)
{
    $accountID = bcsub($steamid64, '76561197960265728');
    return 'STEAM_1:' . bcmod($accountID, '2') . ':' . bcdiv($accountID, 2);
}


function sanitizeUrl($url)
{
    // Remove all illegal characters from a url
    $url = filter_var($url, FILTER_SANITIZE_URL);

    // Validate the URL to ensure it's a valid URL
    if (filter_var($url, FILTER_VALIDATE_URL) !== false) {
        return $url;
    } else {
        // If the URL is not valid, redirect back to settings
        return '/settings';
    }
}