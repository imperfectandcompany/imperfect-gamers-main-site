<?php 
//use this function in the cookies class to see if the user is logged in
if (!User::isLoggedin()){
    header("location: ".$GLOBALS['config']['url']);
} else {
    DatabaseConnector::query('DELETE FROM login_tokens WHERE user_id=:userid', array(':userid'=>User::isLoggedIn()));	
    $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
    
    // since our old donation store uses session_tokens, we need to delete those too
    // check if user has a steam id which is the uid within the store table
    $steamId = $userProfile['steam_id_64'] ?? null;
    
    if ($steamId) {
    // Connect to the igfastdl_donate database
    
    $pdo = DatabaseConnector::getDatabase('igfastdl_donate');
    $stmt = $pdo->prepare('UPDATE players SET session_token=null WHERE uid = :uid');
    $stmt->execute([':uid' => $steamId]);
    unset($_COOKIE["uid"]);
    setcookie('uid', null, -1, '/', $domain, false);
    unset($_SESSION['uid']);
    }
    unset($_COOKIE["token"]);
    unset($_COOKIE["IMPERFECTGAMERS_"]);
    // expire cookie (connected to donate and our own system)
    setcookie('token', '1', -1, '/', $domain, false);
    setcookie('IMPERFECTGAMERS_', '1', -1, '/', $domain, false);
    // destroy session
    session_destroy();
    // redirect to home page
    header("location: ".$GLOBALS['config']['url']);
}
?>