<?php 
//use this function in the cookies class to see if the user is logged in
if (!User::isLoggedin()){
	header("Location: https://prototype.imperfectgamers.org/");
} else {
    DatabaseConnector::query('DELETE FROM login_tokens WHERE user_id=:userid', array(':userid'=>User::isLoggedIn()));	
    
    // since our old donation store uses session_tokens, we need to delete those too
    // check if user has a steam id which is the uid within the store table
    $steamId = $userProfile['steam_id_64'] ?? null;
    if ($steamId) {
    // Connect to the igfastdl_donate database
    $pdo = DatabaseConnector::getDatabase('igfastdl_donate');
    $stmt = $pdo->prepare('UPDATE players SET session_token=null WHERE uid = :uid');
    $stmt->execute([':uid' => $steamId]);
    $_SESSION['uid'] = null;
    setcookie('uid', '1', time()-3600, '/', $domain, false);
    }

    //expire cookie (connected to donate and our own system)
    setcookie('token', '1', time()-3600, '/', $domain, false);

    //expire cookie
    setcookie('IMPERFECTGAMERS_', '1', time()-3600, '/', $domain, false);
    header("Location: https://prototype.imperfectgamers.org/");
}
?>