<?php

//Variables

$steamId = Settings::hasSteam($userid);

//print_r($settings->user);

if($_POST && $_SERVER['REQUEST_METHOD'] == 'POST')
{
    try
    {
        switch($_POST['form_type'])
        {
            case"unhook_steam":
                DatabaseConnector::updateData(
                    "profiles", 
                    "steam_id = NULL, steam_id_64 = NULL, steam_id_3 = NULL", 
                    "user_id = :userid", 
                    array(':userid' => $userid)
                );
                header("location: ".$GLOBALS['config']['url']."/settings");
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
                header("location: ".$GLOBALS['config']['url']."/settings");
                break;       
            case "adjust_avatar":
                try
                {
                    $target_file = basename($_FILES["avatar"]["name"]);
                    if($target_file) {
                        // ... existing validation code for file type, size, and upload errors ...

                        // Processing the uploaded avatar
                        $ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                        $newAvatarFilename = $userid . "." . $ext;
                        $newAvatarPath = $GLOBALS['config']['avatar_folder'] . "/" . $newAvatarFilename;

                        // Resize the image
                        Settings::resizeImage($_FILES["avatar"]["tmp_name"], $GLOBALS['config']['avatar_max_size'], $GLOBALS['config']['avatar_max_size']);

                        // Move the uploaded file
                        if(!move_uploaded_file($_FILES['avatar']['tmp_name'], $newAvatarPath)){
                            throw new Exception("Our image didn't load?");
                        }

                        // Update avatar in database
                        Settings::updateAvatar($newAvatarFilename, $userid);
                    }

                    $_SESSION['messages']['success'][] = "Your avatar has been updated!";
                    header("location: ".$GLOBALS['config']['url']."/settings");
                    $success=true;
                    exit();
                } catch (Exception $e) {
                    $_SESSION['messages']['errors'][] = $e->getMessage();
                    // Redirect back with error message
                    header("location: ".$GLOBALS['config']['url']."/settings");
                    exit();
                }
            default:
                throw new Exception("Invalid form type");
        }
    } catch (Exception $e) {
        $_SESSION['messages']['errors'][] = $e->getMessage();
        header("location: ".$GLOBALS['config']['url']."/settssings");
        exit();
    }
}
