<?php
if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST' && ($_POST['login'] || $_POST['openid_mode'])){

    include $GLOBALS['config']['private_folder'].'/steam/openid.php';

    switch($_GET['openid_mode']){
        case"cancel":
            header("Location: /login");   
        break;
        default:
        if(isset($_POST['login'])) {
            $openid = new LightOpenID;
            $openid->identity = 'http://steamcommunity.com/openid';
            header('Location: ' . $openid->authUrl());
        }
    }
}

if($_GET){
    if($_GET['openid_claimed_id'] && User::isLoggedIn()){
        //This needs better security probably, anyone could toss in a steam ID here but right now it's nothing to worry about.
        $steam_id = str_replace("https://steamcommunity.com/openid/id/", "", $_GET['openid_claimed_id']);
        $filter_params = array();
        $filter_params[] = array("value" => $steam_id, "type" => PDO::PARAM_INT);
        $filter_params[] = array("value" => $userid, "type" => PDO::PARAM_INT);
        $updateResult = DatabaseConnector::updateData(
            "profiles", 
            "steam_id_64 = :steamId64", 
            "user_id = :id", 
            array(':steamId64' => $steam_id, ':id' => $userid)
        );
        //$dbConnection->updateData($GLOBALS['db_conf']['db_db'].".profiles", "steam_id_64 = ?, steam_id_3 = ? WHERE id = ?", $filter_params);
        header("location: ".$GLOBALS['config']['url']."/settings");
    }
}
