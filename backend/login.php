<?php
if (User::isLoggedin()) {
    header("Location: ./");
}

if (isset($_POST['login'])) {
    try {
        if (!isset($_POST['login_emailoruser']) || !$_POST['login_emailoruser']) {
            throw new Exception('You did not provide an email or username!');
        }
        if (!isset($_POST['login_password']) || !$_POST['login_password']) {
            throw new Exception('You did not provide a password!');
        }

        //set variables
        $emailoruser = $_POST['login_emailoruser'];
        $password = $_POST['login_password'];

        //check if email exists
        if (DatabaseConnector::query('SELECT email from users WHERE email=:email', array(':email' => $emailoruser))) {
            //match user input password with database password
            if (password_verify($password, DatabaseConnector::query('SELECT password from users WHERE email=:email', array(':email' => $emailoruser))[0]['password'])) {
                $success = 1;
                $cstrong = True;
                $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
                $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                $user_id = DatabaseConnector::query('SELECT id from users WHERE email=:email', array(':email' => $emailoruser))[0]['id'];
                DatabaseConnector::query('INSERT INTO login_tokens (token, user_id) VALUES (:token, :user_id)', array(':token' => sha1($token), ':user_id' => $user_id));

                // After password verification

                $profileData = DatabaseConnector::query('SELECT p.*, u.email FROM profiles p INNER JOIN users u ON p.user_id = u.id WHERE p.user_id = :userId', array(':userId' => $user_id));
                $userProfile = $profileData ? $profileData[0] : null; // Return the first row or null if no data

                // New code to update session token in players table for our old donation system
                $steamId = $userProfile['steam_id_64'] ?? null;
                if ($steamId) {
                    // Connect to the igfastdl_donate database
                    $pdo = DatabaseConnector::getDatabase('igfastdl_donate');

                    // Check if the user exists in the players table
                    $stmt = $pdo->prepare('SELECT uid FROM players WHERE uid = :uid');
                    $stmt->execute([':uid' => $steamId]);
                    $playerExists = $stmt->fetch();

                    if (!$playerExists) {
                        // Insert new player
                        $stmt = $pdo->prepare('INSERT INTO players (uid, ip) VALUES (:uid, :ip)');
                        $stmt->execute([':uid' => $steamId, ':ip' => $_SERVER['REMOTE_ADDR']]);
                    } else {
                        // Update existing player
                        $stmt = $pdo->prepare('UPDATE players SET ip = :ip WHERE uid = :uid');
                        $stmt->execute([':uid' => $steamId, ':ip' => $_SERVER['REMOTE_ADDR']]);
                    }
                    // Update session token for player
                    $stmt = $pdo->prepare('UPDATE players SET session_token = :token WHERE uid = :uid');
                    $stmt->execute([':token' => sha1($token), ':uid' => $steamId]);
                    setcookie('uid', $steamId, time() + 60 * 60 * 24 * 7, '/', $domain, false);
                    $_SESSION['uid'] = $steamId;
                }
                    // Set cookie for our auth system that will also be used by the donation system
                setcookie('token', $token, time() + 60 * 60 * 24 * 7, '/', $domain, false);
                setcookie("IMPERFECTGAMERS_", '1', time() + 60 * 60 * 24 * 3, '/', $domain, false);
                $GLOBALS['messages']['success'][] = "Logging you in...";
            } else {
                throw new Exception('Password is incorrect!');
            }

        } else {

            //try checking for username
            if (DatabaseConnector::query('SELECT username from users WHERE username=:username', array(':username' => $emailoruser))) {
                //match user input password with database password
                if (password_verify($password, DatabaseConnector::query('SELECT password from users WHERE username=:username', array(':username' => $emailoruser))[0]['password'])) {
                    $success = 1;
                    $cstrong = True;
                    $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
                    $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                    $user_id = DatabaseConnector::query('SELECT id from users WHERE username=:username', array(':username' => $emailoruser))[0]['id'];
                    DatabaseConnector::query('INSERT INTO login_tokens (token, user_id) VALUES (:token, :user_id)', array(':token' => sha1($token), ':user_id' => $user_id));
                    setcookie('token', $token, time() + 60 * 60 * 24 * 7, '/', $domain, false);
                    setcookie("IMPERFECTGAMERS_", '1', time() + 60 * 60 * 24 * 3, '/', $domain, false);
                    $GLOBALS['messages']['success'][] = "Please wait while we log you in...";
                } else {
                    throw new Exception('Password is incorrect!');
                }

            } else {
                throw new Exception('Email / Username does not exist!');
            }
        }
    } catch (Exception $e) {
        $GLOBALS['errors'][] = $e->getMessage();
    }
}
?>