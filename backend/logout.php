<?php 
//use this function in the cookies class to see if the user is logged in
if (!User::isLoggedin()){
	header("Location: https://prototype.imperfectgamers.org/");
} else {
    DatabaseConnector::query('DELETE FROM login_tokens WHERE user_id=:userid', array(':userid'=>User::isLoggedIn()));		
    //expire cookie
    setcookie('IMPERFECTGAMERS', '1', time()-3600);
    //expire cookie
    setcookie('IMPERFECTGAMERS_', '1', time()-3600);
    header("Location: https://prototype.imperfectgamers.org/");
}
?>