<?php
//use this function in the user class to see if the user is logged in
if (!User::isLoggedin()){
    header("location:../login");
}
if (User::getUsername($userid)){
	//redirect mans if hes got a username already
    header("location:../");
}
include('reusable/settings/changeusername.php');
?>