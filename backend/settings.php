<?php

//Variables

$steamId = Settings::hasSteam($userid);

//print_r($settings->user);

if($_POST && $_SERVER['REQUEST_METHOD'] == 'POST')
{
    print_r($_POST);
    try
    {
        switch($_POST['form_type'])
        {
            case"unhook_steam":
                $filter_params = array();
                $filter_params[] = array("value" => $_SESSION['user_id'], "type" => PDO::PARAM_INT);
                $dbConnection->updateData($GLOBALS['db_conf']['db_db'].".profiles", "steam_id_64 = NULL, steam_id_3 = NULL WHERE id = ?", $filter_params);
                header("location: ".$GLOBALS['config']['url']."/settings");
            break;
            case"adjust_avatar":
                try
                {
                    echo"avatar";
                    print_r($_FILES);
                    $target_file = basename($_FILES["avatar"]["name"]);
                    if($target_file){
                        $image_extensions_allowed = array('jpg', 'jpeg', 'png', 'gif');
                        $ext = strtolower(end(explode('.', $_FILES['avatar']['name'])));
                        
                        if(!in_array($ext, $image_extensions_allowed))
                        {	
                            throw new Exception($GLOBALS['lang']['settings']['img_invalid']);
                        }
            
                        //This is leftover code from a different website, it may be used here later?
                        /*if($loggedMember->hasPermission("disallowed_avatar")){
                            throw new Exception($GLOBALS['lang']['error_user_disallowed_avatar']);
                        }*/
            
                        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                        switch( $_FILES['avatar']['error'] ) {
                            case UPLOAD_ERR_OK:
                                break;
                            case UPLOAD_ERR_INI_SIZE:
                            case UPLOAD_ERR_FORM_SIZE:
                                throw new Exception($GLOBALS['lang']['settings']['img_too_big']);
                                break;
                            case UPLOAD_ERR_PARTIAL:
                                throw new Exception($GLOBALS['lang']['settings']['img_imcomplete']);
                                break;
                            case UPLOAD_ERR_NO_FILE:
                                throw new Exception($GLOBALS['lang']['settings']['img_empty']);
                                break;
                            default:
                                throw new Exception($GLOBALS['lang']['settings']['img_error_generic']);
                                break;
                        }
            
                        if ($_FILES['avatar']['size'] > 4000000) {
                            throw new Exception($GLOBALS['lang']['settings']['img_too_big']);
                        }
            
                        $array = explode('.', $_FILES['avatar']['name']);
                        $ext = strtolower(end($array));
                                    
                        if(file_exists($GLOBALS['config']['avatar_folder'].$_SESSION['user_id'].".".$ext)) {
                            unlink($GLOBALS['config']['avatar_folder'].$_SESSION['user_id'].".".$ext); //remove the file
                        }
            
                        $_POST['avatar'] = $_SESSION['user_id'].".".$ext;
                        
                        $settings->resizeImage($_FILES["avatar"]["tmp_name"], $GLOBALS['config']['avatar_max_size'], $GLOBALS['config']['avatar_max_size']);

                        if(!is_writable($GLOBALS['config']['avatar_folder'])){ throw new Exception("Writing to the avatar folder has been denied due to a permission error!"); }
                        
                        if(!move_uploaded_file($_FILES['avatar']['tmp_name'], $GLOBALS['config']['avatar_folder']."/".$_SESSION['user_id'].".".$ext)){ throw new Exception("Our image didn't load?"); }
                        echo $GLOBALS['config']['avatar_folder'];
                    }else{
                        $_POST['avatar'] = $settings->user['result']['avatar'];
                    }
            
                    if($_POST['avatar'])
                    {                        
                        $filter_params = array();
                        $filter_params[] = array("value" => $_POST['avatar'], "type" => PDO::PARAM_STR);
                        $filter_params[] = array("value" => $_SESSION['user_id'], "type" => PDO::PARAM_INT);
                        $dbConnection->updateData($GLOBALS['db_conf']['db_db'].".profiles", "avatar = ?, avatar_ts = UNIX_TIMESTAMP() WHERE id = ?", $filter_params);
                        $_SESSION['messages']['success'][] = "Your avatar has been updated!";
                        //We use die here because otherwise, our session message gets deleted before anyone could actually see it.
                        die(header("location: ".$GLOBALS['config']['url']."/settings"));
                    }

                } catch (Exception $e) {
                    /*$GLOBALS['messages']['errors']['avatar'][] = $e->getMessage();*/ throw $e;
                }
            break;
        }
    } catch (Exception $e) {
        $GLOBALS['messages']['errors'][] = $e->getMessage();
    }
}
