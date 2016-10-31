<?php 
	include("includes/dbConn_class.php");
	$conn = new dbConn();
	$rows = $conn->countTicketsDB_All();
	echo $rows;
	$conn = null;
?>