<?php
	require('includes/dbConn_class.php');
	$filename = $_POST['file'];
	echo "Filename: ". $filename . "<br>";
	$conn = new dbConn();
	$conn->importCSV($filename);
	$conn = null;
	echo "File uploaded successfully";
	header('Location: Secondharvestdash.html');
?>