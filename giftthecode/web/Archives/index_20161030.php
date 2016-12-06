<?php
/*MySQL Code*/
$servername = "localhost";
$username = "root";
$password = "test";
$dbname = "myDB";
$user_id = $_POST['email'];
$user_pwd = $_POST['password'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully!<br>";

$sql = "SELECT * FROM Admin where '$user_id'=Admin.Login and '$user_pwd'=Admin.Password";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "Validated As Admin";
header('Location: secondharvestdash.html');
exit();

} else{
$sql = "SELECT * FROM Sellers where '$user_id'=Sellers.Email and '$user_pwd'=Sellers.uid";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "Validated As Seller";
header('Location: Championdash.html');
exit();

} else{
//echo "Not Validated<br>";
}
}

$conn->close();

?>