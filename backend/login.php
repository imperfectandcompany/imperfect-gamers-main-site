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
                setcookie("IMPERFECTGAMERS", $token, time() + 60 * 60 * 24 * 7, '/', $domain, false);
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
                    setcookie("IMPERFECTGAMERS", $token, time() + 60 * 60 * 24 * 7, '/', $domain, false);
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