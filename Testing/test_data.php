<?php
	require('../includes/dbTestData_class.php');
	$conn = new dbTestData();
	$conn->insertCampaign(1);
	$conn->insertTicket_Types(1, 1); //Ticket Type 1
	$conn->insertTicket_Types(1, 5); //Ticket Type 2
	$conn->insertTicket_Types(1, 10); //Ticket Type 3
	$conn->insertTickets(1, 1, 1, 1, 0, 5);
	$conn->insertTickets(2, 1, 2, 2, 1, 7);
	$conn->insertTickets(1, 1, 2, 3, 1, 9);
	$conn->insertAdmin(1);
	$conn->insertBuyers(1, 4, 1); //3 Buyers with Seller 1
	$conn->insertBuyers(1, 6, 1); //6 Buyers with Seller 1
	$conn->insertSellers(1, 2); //3 Buyers with Seller 1
	$conn->insertSellers(1, 2); //6 Buyers with Seller 1
	$conn->insertSellers1(1, 3); //3 Buyers with Seller 1
	$conn->insertSellers1(1, 1); //7 Buyers with Seller 1
	$conn=null;
?>