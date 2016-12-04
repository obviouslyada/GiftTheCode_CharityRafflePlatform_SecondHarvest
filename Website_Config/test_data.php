<?php
	require('dbTestData_class.php');
	$conn = new dbTestData();
//	$conn->insertAdmin(1);
//	$conn->insertCampaign(1);
//	$conn->insertTicket_Types(1, 10); //Ticket type 1, price 10
//	$conn->insertSellers1(1, 1); //Insert 1 seller linked to campaign 1
//	$conn->insertBuyers(1, 1, 1); //Insert 1 buyer linked to seller 1 and campaign 1
//	$conn->insertTickets(1, 1, 1, 1, 0, 5); //Insert 5 tickers linked to campaign 1, seller 1, buyer 1, ticket_type 1, payment status 0.
	$conn=null;
?>