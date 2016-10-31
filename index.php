<?php
	include("includes/dbConn_class.php");
	$user_id = $_POST['email'];
	$user_pwd = $_POST['password'];
	$campaign_id = 1;
	
	$conn = new dbConn();
	echo "Username: ". $user_id . "<br>";
	echo "Password: ". $user_pwd . "<br>";
	$conn->login($user_id, $user_pwd, $campaign_id);
	$conn = null;
?>