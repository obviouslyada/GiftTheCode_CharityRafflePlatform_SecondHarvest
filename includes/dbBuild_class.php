<?php
require('dbConn_class.php');
class dbBuild extends dbConn {

	public function __construct(){  //Generate Connection via dbConn class
		parent::__construct();
	}

	function buildDatabase(){
		//Check if the Database Exists
		$sql = "CREATE DATABASE IF NOT EXISTS myDB";
		if ($this->conn ->query($sql) === TRUE) {
		  echo "Database created successfully! <br>";
		  $this->conn = new mysqli(HOST, USER, PASSWORD, MYDATABASE);
		} else {
		  echo "Error creating database: " . $this->conn-> error;
		  echo "<br>";
		}
	}

	function buildAdminTable() {		
	// sql to create Admin table
		$sql = "CREATE TABLE Admin (
		id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		Campaign_id INT(11) NOT NULL,
		Login VARCHAR(30) NOT NULL,
		Password VARCHAR(30) NOT NULL,
		reg_date TIMESTAMP
		)";
		if ($this->conn ->query($sql) === TRUE) {
		  echo "Admin Table Created! <br>";
		} else {
		  echo "Error creating table: " . $this->conn->error;
		  echo "<br>";
		}
	}

	function buildCampaignsTable() {		
	// sql to create Campaigns table
	   $sql = "CREATE TABLE Campaigns (
	   id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	   Start_Date DATE,
	   End_Date DATE,
	   Campaign_Name VARCHAR (30) NOT NULL,
	   Campaign_Goal DOUBLE,
	   Max_Tickets DOUBLE,
	   reg_date TIMESTAMP
	   )";
		if ($this->conn ->query($sql) === TRUE) {
		  echo "Campaign Table Created! <br>";
		} else {
		  echo "Error creating table: " . $this->conn ->error;
		  echo "<br>";
		}
	}

	function buildTeamsTable() {		
	// sql to create Teams table
	   $sql = "CREATE TABLE Teams (
	   id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	   Campaign_ID INT(11) NOT NULL,
	   Team_Goal DOUBLE,
	   reg_date TIMESTAMP
	   )";
		if ($this->conn ->query($sql) === TRUE) {
		  echo "Teams Table Created! <br>";
		} else {
		  echo "Error creating table: " . $this->conn ->error;
		  echo "<br>";
		}
	}

	function buildTeam_MembersTable() {		
	// sql to create Campaigns table
	   $sql = "CREATE TABLE Team_Members (
	   id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	   Team_ID INT(11) NOT NULL,
	   Seller_ID INT(11) NOT NULL,
	   Team_Role VARCHAR (30),
	   reg_date TIMESTAMP
	   )";
		if ($this->conn ->query($sql) === TRUE) {
		  echo "Campaign Table Created! <br>";
		} else {
		  echo "Error creating table: " . $this->conn ->error;
		  echo "<br>";
		}
	}

	function buildBuyersTable() {		
		// sql to create Buyers table
		$sql = "CREATE TABLE Buyers (
		id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		FirstName VARCHAR(30) NOT NULL,
		LastName VARCHAR(30) NOT NULL,
		Email VARCHAR(30) NOT NULL,
		Address1 VARCHAR(30),
		Address2 VARCHAR(30),
		City VARCHAR(30),
		Province VARCHAR(30),
		Postal_Code VARCHAR(30),
		Country VARCHAR(30),
		Phone VARCHAR(30),
		Occupation VARCHAR(30),
		Email_Contact TINYINT(1),
		Post_Contact TINYINT(1),
		Sellers_ID INT(11) NOT NULL,
		Campaign_ID INT(11) NOT NULL,
		Donation TINYINT (1),
		Means_of_Payment TINYINT (1),
		reg_date TIMESTAMP
		)";
			if ($this->conn ->query($sql) === TRUE) {
			echo "Donor Table Created! <br>";
			} else {
			echo "Error creating table: " . $this->conn ->error;
			echo "<br>";
			}
	}

	function buildSellersTable() {		
	// sql to create Seller table
	   $sql = "CREATE TABLE Sellers (
	   id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	   Email VARCHAR(30) NOT NULL,
	   uid VARCHAR(30) NOT NULL,
	   FirstName VARCHAR(30) NOT NULL,
	   LastName VARCHAR(30) NOT NULL,
	   Address1 VARCHAR(30),
	   Address2 VARCHAR(30),
	   City VARCHAR(30),
	   Province VARCHAR(30),
	   Postal_Code VARCHAR(30),
	   Country VARCHAR(30),
	   Phone VARCHAR(30),
	   Invites_Sent INT(11),
	   Email_Contact TINYINT(1),
	   Post_Contact TINYINT(1),
	   Seller_Ticket_Goal INT(11),
	   Campaign_ID INT(11) NOT NULL,
	   reg_date TIMESTAMP
	   )";
		if ($this->conn ->query($sql) === TRUE) {
		  echo "Sellers Table Created! <br>";
		} else {
		  echo "Error creating table: " . $this->conn ->error;
		  echo "<br>";
		}
	}

	function buildTicketsTable() {		
	// sql to create Tickets table
	   $sql = "CREATE TABLE Tickets (
	   id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	   Seller_ID INT(11) NOT NULL,
	   Campaign_ID INT(11) NOT NULL,
	   Buyer_ID INT(11) NOT NULL,
	   Price_Tier_ID INT(11) NOT NULL,
	   Payment_Status INT(11) NOT NULL,
	   reg_date TIMESTAMP
	   )";
		if ($this->conn ->query($sql) === TRUE) {
		  echo "Tickets Table Created! <br>";
		} else {
		  echo "Error creating table: " . $this->conn ->error;
		  echo "<br>";
		}
	}

	function buildTicketsTypeTable() {		
	// sql to create Ticket_Type table
	   $sql = "CREATE TABLE Ticket_Type (
	   id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	   Campaign_ID INT(11) NOT NULL,
	   Price_Per_Ticket DOUBLE NOT NULL,
	   reg_date TIMESTAMP
	   )";
		if ($this->conn ->query($sql) === TRUE) {
		  echo "Ticket_Type Table Created! <br>";
		} else {
		  echo "Error creating table: " . $this->conn ->error;
		  echo "<br>";
		}
	}
}
?>