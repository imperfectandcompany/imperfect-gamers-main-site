<?php

try {
    if (!User::isLoggedin()) {
        throw new Exception("You must be logged in to view this page.");
    }
} catch (Exception $e) {
    $_SESSION['messages']['errors'][] = $e->getMessage();
    header("location: " . $GLOBALS['config']['url'] . "/login");
    exit();
}


//Variables

$steamId = Settings::hasSteam($userid);

//print_r($settings->user);

if ($_POST && $_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        switch ($_POST['form_type']) {
            case "unhook_steam":
                if ($steamId) {
                    // check if user has a steam_id_64 which is the uid within the store table we want to remove a session for
                    $steamId64 = $userProfile['steam_id_64'] ?? null;
                    DatabaseConnector::updateData(
                        "profiles",
                        "steam_id = NULL, steam_id_64 = NULL, steam_id_3 = NULL",
                        "user_id = :userid",
                        array(':userid' => $userid)
                    );
                    // Makes sure user has steam_id_64
                    if ($steamId64 || ($_COOKIE['uid'] && !empty($_COOKIE['uid']))) {
                        $pdo = DatabaseConnector::getDatabase('igfastdl_donate');

                        // Check if the user exists in the players table for donation system
                        $stmt = $pdo->prepare('SELECT uid FROM players WHERE uid = :uid');
                        $stmt->execute([':uid' => $steamId]);
                        $playerExists = $stmt->fetch();

                        if ($playerExists) {
                            $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
                            // Update existing player to remove our session token specifically for donation system
                            $stmt = $pdo->prepare('UPDATE players SET session_token=null WHERE uid = :uid');
                            $stmt->execute([':uid' => $steamId]);
                        }
                    }
                    // remove uid session and cookie for player for our donation system
                    unset($_COOKIE["uid"]);
                    setcookie('uid', null, -1, '/', $domain, false);
                    unset($_SESSION['uid']);
                    unset($_SESSION['csrf_token']);
                    
                    $_SESSION['messages']['success'][] = "Steam account unhooked successfully!";
                    header("location: " . $GLOBALS['config']['url'] . "/settings");
                }
                break;
            case "change_username":
                // Handle username change logic here
                $newUsername = $_POST['new_username'];
                echo "AWDE";
                // Perform your checks and throw exceptions as needed
                // ...

                // If all checks pass, update the username
                DatabaseConnector::updateData(
                    "profiles",
                    "username = :newUsername",
                    "user_id = :userId",
                    array(':newUsername' => $newUsername, ':userId' => $userid)
                );

                $_SESSION['messages']['success'][] = "Username updated successfully!";
                // Redirect to settings page or appropriate location
                header("location: " . $GLOBALS['config']['url'] . "/settings");
                break;
            case "adjust_avatar":
                try {
                    $target_file = basename($_FILES["avatar"]["name"]);
                    if ($target_file) {
                        // ... existing validation code for file type, size, and upload errors ...

                        // Processing the uploaded avatar
                        $ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                        $newAvatarFilename = $userid . "." . $ext;
                        $newAvatarPath = $GLOBALS['config']['avatar_folder'] . "/" . $newAvatarFilename;

                        // Resize the image
                        Settings::resizeImage($_FILES["avatar"]["tmp_name"], $GLOBALS['config']['avatar_max_size'], $GLOBALS['config']['avatar_max_size']);

                        // Move the uploaded file
                        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $newAvatarPath)) {
                            throw new Exception("Our image didn't load?");
                        }

                        // Update avatar in database
                        Settings::updateAvatar($newAvatarFilename, $userid);
                    }

                    $_SESSION['messages']['success'][] = "Your avatar has been updated!";
                    header("location: " . $GLOBALS['config']['url'] . "/settings");
                    $success = true;
                    exit();
                } catch (Exception $e) {
                    $_SESSION['messages']['errors'][] = $e->getMessage();
                    // Redirect back with error message
                    header("location: " . $GLOBALS['config']['url'] . "/settings");
                    exit();
                }
            default:
                throw new Exception("Invalid form type");
        }
    } catch (Exception $e) {
        $_SESSION['messages']['errors'][] = $e->getMessage();
        header("location: " . $GLOBALS['config']['url'] . "/settings");
        exit();
    }
}
