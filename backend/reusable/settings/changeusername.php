<?php
//get current username to fill as value in username field
$username = User::getUsername($userid);

$userwarning = 0;
if (isset($_POST['changeusername'])) {
    try {
        if (isset($_POST['username']) && $_POST['username']) {
            if ($username == $_POST['username']) {
                throw new Exception('Error: This is already your username!');
            }
            if (DatabaseConnector::query('SELECT username from profiles WHERE username=:username', array('username' => $_POST['username']))) {
                throw new Exception('This username is already taken!');
            }
            //set variables
            $newusername = $_POST['username'];

            if (strlen($newusername) <= 6) {
                throw new Exception('This username is way too short!');
            }

            if (strlen($newusername) >= 30) {
                throw new Exception('This username is way too long!');
            }

            // determine whether we are updating or inserting
            if (isset($_POST['user_insert'])) {
                // determine whether we are updating or inserting
                DatabaseConnector::query('INSERT INTO profiles (user_id, username) VALUES (:userid, :newusername)', array(':userid' => $userid, ':newusername' => $newusername));
            } else {
                DatabaseConnector::query('UPDATE profiles SET username=:newusername WHERE user_id=:userid', array(':newusername' => $newusername, ':userid' => $userid));
            }

            //get newly changed password to fill as value in username field
            $username = (DatabaseConnector::query('SELECT username FROM profiles WHERE user_id=:userid', array(':userid' => $userid))[0]['username']);
            $success = true;
            $GLOBALS['messages']['success'][] = "Username set! No take backs!";
        }
    } catch (Exception $e) {
        $userwarning = 1;
        $GLOBALS['errors'][] = $e->getMessage();
    }

}
?>