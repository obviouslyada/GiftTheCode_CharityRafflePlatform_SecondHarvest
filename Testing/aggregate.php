<?php
	require('includes/dbConn_class.php');
	$conn = new dbConn();
	$rows = $conn->countTicketsDB_All(1);
	$buyers = $conn->countBuyersDB(1);
	$sellers = $conn->countSellersDB(1);
	$total_value = $conn->totalValueSold(1, 2);
	echo "Tickets: " . $rows . "<br>";
	echo "Buyers: " . $buyers . "<br>";
	echo "Sellers: " . $sellers . "<br>";
	echo "Value: " . $total_value . "<br>";
	$conn = null;
?>