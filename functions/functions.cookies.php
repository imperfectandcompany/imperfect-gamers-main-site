<?php

/**
 * Function to test if user is logged in or not
 * Returns a boolean value of true or false depending on if a user is logged in or not
 */
public static function isLoggedIn()
{
	//looks for cookie that is stored
	if(isset($_COOKIE['FOODENGINEID'])) {
		//db check to see if the token is valid
		if (DatabaseConnector::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['FOODENGINEID'])))) {
			//grab and return user id
			$userid = DatabaseConnector::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['FOODENGINEID'])))[0]['user_id'];

			if (isset($_COOKIE['FOODENGINEID_'])) {
			return $userid;
			} else {
				$cstrong = True;
				$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;			
				$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
				DatabaseConnector::query('INSERT INTO login_tokens (token, user_id) VALUES (:token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$userid));
				DatabaseConnector::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['FOODENGINEID'])));				
				setcookie("FOODENGINEID", $token, time() + 60 * 60 * 24 * 7, '/', $domain, false);
				// create a second cookie to force the first cookie to expire without logging the user out, this way the user won't even know they've been given a new login toke
				setcookie("FOODENGINEID_", '1', time() + 60 * 60 * 24 * 3, '/', $domain, false);
				return $userid;
			}

		} 
	}
	
	return false;	
}
	


if (isLoggedIn()) { 
		echo 'Logged In';
		echo isLoggedIn();
} else {
	echo 'Not logged in';

}
