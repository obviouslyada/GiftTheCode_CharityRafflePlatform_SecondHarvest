<?php
	require('includes/dbConn_class.php');
	$conn = new dbConn();
	$conn->exportDB();
	$conn = null;
	header('Location: secondharvestdash.html');
?>
