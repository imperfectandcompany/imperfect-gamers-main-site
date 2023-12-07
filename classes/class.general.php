<?php
// First, see if the user is logged in
$userid = User::isLoggedIn();

// Join the profiles table with the users table to get the profile data along with the email
$profileData = DatabaseConnector::query('SELECT p.*, u.email FROM profiles p INNER JOIN users u ON p.user_id = u.id WHERE p.user_id = :userId', array(':userId' => $userid));
$userProfile = $profileData ? $profileData[0] : null; // Return the first row or null if no data

	if ($userid){
    // Grab user's ID
    // See if the user has a username
	if(!User::getUsername($userid)){
        // Make sure not being redirected when already on page
		if ($GLOBALS['url_loc'][1] === "getstarted"  || $GLOBALS['url_loc'][1] === "logout"){
            // Do nothing if on getstarted or logout page
		}
		else{
            // Force user to take username onboarding
		header("location:../getstarted");
		exit; // Always call exit after headers redirect to prevent further script execution
		}
	}    
	
    // Update last seen
	DatabaseConnector::query('UPDATE users SET updatedAt=UNIX_TIMESTAMP() WHERE id=:userid', array(':userid'=>$userid));		
	
    // See if a user is online matched against last seen
	DatabaseConnector::query('UPDATE users SET status="offline" WHERE TIMESTAMPDIFF(MINUTE, FROM_UNIXTIME(updatedAt), NOW()) > 1');
	DatabaseConnector::query('UPDATE users SET status="online" WHERE TIMESTAMPDIFF(MINUTE, FROM_UNIXTIME(updatedAt), NOW()) < 1');
	}