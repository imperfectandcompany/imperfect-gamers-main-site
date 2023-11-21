<?php

class User {
/**
 * Function to test if user is logged in or not
 * Returns a boolean value of true or false depending on if a user is logged in or not
 */
public static function isLoggedIn()
{
	//looks for cookie that is stored
	if(isset($_COOKIE['IMPERFECTGAMERS'])) {
		//db check to see if the token is valid
		if (DatabaseConnector::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['IMPERFECTGAMERS'])))) {
			//grab and return user id
			$userid = DatabaseConnector::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['IMPERFECTGAMERS'])))[0]['user_id'];

			if (isset($_COOKIE['IMPERFECTGAMERS_'])) {
			return $userid;
			} else {				
				$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;			
				$cstrong = True;
				$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
				DatabaseConnector::query('INSERT INTO login_tokens (token, user_id) VALUES (:token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$userid));
				DatabaseConnector::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['IMPERFECTGAMERS'])));
				setcookie("IMPERFECTGAMERS", $token, time() + 60 * 60 * 24 * 7, '/', $domain, false);
				// create a second cookie to force the first cookie to expire without logging the user out, this way the user won't even know they've been given a new login toke
				setcookie("IMPERFECTGAMERS_", '1', time() + 60 * 60 * 24 * 3, '/', $domain, false);	
				//get loggedin user id
				return $userid;
			}

		} 
	} 
	return false;	
}

public static function isAdmin($id)
{
	//check to see if the user is an admin
	if(DatabaseConnector::query('SELECT admin FROM users WHERE id=:id', array(':id'=>$id))[0]['admin'] == 1){
	return true;
	}
	else{
		return false;
}
}

public static function getUsername($id)
{
    $result = DatabaseConnector::query('SELECT username FROM profiles WHERE user_id=:id', array(':id'=>$id));
    
    if ($result && !empty($result) && isset($result[0]['username'])) {

        // If result is not empty and the username is set, return it
        return $result[0]['username'];
    } else {

        // If no result is found, return false
        return false;
    }
}

public static function getUserId($username)
{

	$result = DatabaseConnector::query('SELECT user_id FROM profiles WHERE username=:username', array(':username'=>$username));
	//grabs the userid of the given username $id. else return false.
	if($result && !empty($result) && isset($result[0]['user_id'])) {
	//return username
	return $result[0]['user_id'];
	}
	else {
	return false;
	}
}

}


