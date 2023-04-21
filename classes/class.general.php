<?php
//first see if the user is logged in
	if (User::isLoggedIn()){
	//grab usersid
	$userid = User::isLoggedIn();
	
	//update last seen
	DatabaseConnector::query('UPDATE users SET updatedAt=UNIX_TIMESTAMP() WHERE id=:userid', array(':userid'=>$userid));		
	
//see if a user is online matched against last seen
	DatabaseConnector::query('UPDATE users SET status="offline" WHERE TIMESTAMPDIFF(MINUTE, FROM_UNIXTIME(updatedAt), NOW()) > 1');
	DatabaseConnector::query('UPDATE users SET status="online" WHERE TIMESTAMPDIFF(MINUTE, FROM_UNIXTIME(updatedAt), NOW()) < 1');
	}
?>



