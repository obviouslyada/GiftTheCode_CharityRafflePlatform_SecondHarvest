<?php

function connectDB(){
	$servername = "localhost";
	$username = "root";
	$password = "test";
	$dbname = "myDB";

	// Create connection
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	echo "Connected successfully!";
	echo "<br>";

	//Check if the Database Exists
	$sql = "CREATE DATABASE IF NOT EXISTS myDB";
	//$sql = "CREATE DATABASE dbname";
	if ($conn->query($sql) === TRUE) {
	  echo "Database created successfully!";
	  echo "<br>";
	  $conn = new mysqli($servername, $username, $password, $dbname);
	} else {
	  echo "Error creating database: " . $conn->error;
	 echo "<br>";	
	 } 
	 return $conn;
}

function insertTicket_Types($conn, $price){
	$sql = "INSERT INTO Ticket_Type (Price)
	VALUES ('$price')";
	$conn->query($sql);
	echo "One Ticket Type Uploaded <br>";
}

function insertTickets($conn, $seller_id, $buyer_id, $ticker_type_id, $counter){
for($i=0; $i<$counter; $i++){
	$sql = "INSERT INTO Tickets (Seller_ID, Buyer_ID, Ticket_Type_ID)
	VALUES ('$seller_id', '$buyer_id', '$ticker_type_id')";
	$conn->query($sql);
	}
	echo "Total Tickets Uploaded: " . $i . "<br>";
}

function insertAdmin($conn){
	$sql = "SELECT * from Admin";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	echo "Admin Found in Table! <br>";
	}	
	else{
	$sql = "INSERT INTO Admin (Login, Password)
	VALUES ('admin@secondharvest.com', 'admin')";
	$conn->query($sql);
	echo "Admin Uploaded <br>";
	}
}

function insertBuyers($conn, $counter, $seller_id){
for($i=0; $i<$counter; $i++){
	$sql = "INSERT INTO Buyers (FirstName, LastName, Email, Address1,
	Address2, City, Province, Postal_Code, Country, Phone, Email_Contact,
	Post_Contact, Sellers_ID, Donation, Means_of_Payment)
	VALUES ('John', 'Doe', 'test@buyer.com', '1 King Street',
	'Suite 100', 'Toronto', 'ON', 'M5V0K4', 'Canada', '111-111-1111', 1,
	0, '$seller_id', 0, 0)";
	$conn->query($sql);
	}
	echo "Total Buyer Uploaded: " . $i . "<br>";
}

function insertSellers($conn, $counter){
for($i=0; $i<$counter; $i++){
	$sql = "INSERT INTO Sellers (FirstName, LastName, Email, uid, Address1,
	Address2, City, Province, Postal_Code, Country, Phone, Invites_Sent,
	Email_Contact, Post_Contact)
	VALUES ('Jane', 'Finch', 'test@seller.com', 999, '8 King Street',
	'Suite 800', 'Toronto', 'ON', 'M5V0K4', 'Canada', '111-111-1111', '$counter',
	1, 0)";
	$conn->query($sql);
	}
	echo "Total Seller Uploaded: " . $i . "<br>";
}

function insertSellers1($conn, $counter){
for($i=0; $i<$counter; $i++){
	$sql = "INSERT INTO Sellers (FirstName, LastName, Email, uid, Address1,
	Address2, City, Province, Postal_Code, Country, Phone, Invites_Sent,
	Email_Contact, Post_Contact)
	VALUES ('Zach', 'Morris', 'Zcah@seller.com', 111, '395 Yonge Street',
	'Apt 350', 'Ottawa', 'ON', 'K5V9F, 'Canada', '888-888-8888', '$counter',
	0, 1)";
	$conn->query($sql);
	}
	echo "Total Seller Uploaded: " . $i . "<br>";
}

$conn = connectDB();
insertTicket_Types($conn, 1); //Ticket Type 1
insertTicket_Types($conn, 5); //Ticket Type 2
insertTicket_Types($conn, 10); //Ticket Type 3
insertTickets($conn, 1, 1, 1, 5);
insertTickets($conn, 2, 2, 2, 7);
insertTickets($conn, 1, 2, 3, 9);
insertAdmin($conn);
insertBuyers($conn, 3, 1); //3 Buyers with Seller 1
insertBuyers($conn, 6, 1); //6 Buyers with Seller 1
insertBuyers($conn, 4, 2); //4 Buyers with Seller 1
insertBuyers($conn, 7, 3); //7 Buyers with Seller 1
insertSellers1($conn, 3); //3 Buyers with Seller 1
insertSellers($conn, 2); //3 Buyers with Seller 1
insertSellers($conn, 2); //6 Buyers with Seller 1
insertSellers1($conn, 1); //7 Buyers with Seller 1
?>