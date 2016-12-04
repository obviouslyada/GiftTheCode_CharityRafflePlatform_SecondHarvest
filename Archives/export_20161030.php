<?php
/*MySQL Code*/
$servername = "localhost";
$username = "root";
$password = "test";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!";
echo "<br>";

$sql = "SELECT 'id', 'FirstName', 'LastName', 'Email', 'Address1', 'Address2'
		'City', 'Province', 'Postal_Code', 'Country', 'Phone', 'Email_Contact', 'Post_Contact',
		'Sellers_ID', 'Donation', 'Means_of_Payment', 'reg_date'
	   UNION ALL
       SELECT id, FirstName, LastName, Email, Address1, Address2
		City, Province, Postal_Code, Country, Phone, Email_Contact, Post_Contact,
		Sellers_ID, Donation, Means_of_Payment, reg_date
       FROM BUYERS
	   INTO OUTFILE '/tmp/Buyers.csv'
	   FIELDS ESCAPED BY ','
	   TERMINATED BY ','
	   ENCLOSED BY '\"'
	   LINES TERMINATED BY '\r\n'";

$result = $conn->query($sql);
echo "Outputted Buyers <br>";

header('Location: secondharvestdash.html');
?>
