<?php
if (User::isLoggedin()) {
    header("Location: " . $GLOBALS['url_loc']);
}

if (isset($_POST['createaccount'])) {
    if (isset($_POST['g-recaptcha-response'])) {
        // RECAPTCHA SETTINGS
        $captcha = $_POST['g-recaptcha-response'];
        $ip = $_SERVER['REMOTE_ADDR'];
        $key = "6LeNNyYpAAAAAPJZro5WqLJr_LVC8S8WfBkJVE_g";
        $url = 'https://www.google.com/recaptcha/api/siteverify';

        // RECAPTCH RESPONSE
        $recaptcha_response = file_get_contents($url . '?secret=' . $key . '&response=' . $captcha . '&remoteip=' . $ip);
        $data = json_decode($recaptcha_response);

        if (isset($data->success) && $data->success === true) {
            try {
                if (!isset($_POST['signup_email']) || !$_POST['signup_email']) {
                    throw new Exception('Error: You did not provide an email!');
                }
                if (!isset($_POST['signup_password']) || !$_POST['signup_password']) {
                    throw new Exception('Error: You did not provide a password!');
                }
                //set variables
                $email = $_POST['signup_email'];
                $password = $_POST['signup_password'];

                //Before we continue, do we already have a email with this username?
                if (DatabaseConnector::query('SELECT email from users where email=:email', array(':email' => $email))) {
                    throw new Exception('Error: There is already someone with this email!');
                }

                if (strlen($password) >= 6 && strlen($password) <= 60) {

                    //php built in validator for email, if valid then insert
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        DatabaseConnector::query('INSERT INTO users (email, password, verified) VALUES (:email, :password, :verified)', array(':email' => $email, ':password' => password_hash($password, PASSWORD_BCRYPT), ':verified' => 0));
                        $success = 1;
                    } else {
                        throw new Exception('Error: Email is invalid!');
                    }
                } else {
                    throw new Exception('Error: Password must have at least 6 characters!');
                }
            } catch (Exception $e) {
                $GLOBALS['errors'][] = $e->getMessage();
            }
        } else {
            $GLOBALS['errors'][] = "Error: Something went wrong fr fr";
        }
    }
}



?>