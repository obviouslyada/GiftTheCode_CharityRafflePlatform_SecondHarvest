<?php
include_once 'includes/dbBuild_class.php';

$conn = new dbBuild(); //Create New Tables.  dbBuild inherits from dbConn

$conn->buildDatabase();
$conn->buildAdminTable();
$conn->buildCampaignsTable();
$conn->buildBuyersTable();
$conn->buildSellersTable();
$conn->buildTicketsTable();
$conn->buildTicketsTypeTable();
$conn->buildTeamsTable();
$conn->buildTeam_MembersTable();
$conn=null;
?>