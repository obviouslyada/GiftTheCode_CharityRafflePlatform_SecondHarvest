<?php
// change the admmision sudo chmod 777 markers.xml

//$filename = "Admin.csv";

//$handle = fopen($filename, "r")

// function test(){
//   echo "Helllo world";
// }
//
// function import2Database($file_name) {
//   if (($handle = fopen($file_name, "r")) !== FALSE) {
//       while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//           $num = count($data);
//           for ($c=0; $c < $num; $c++) {
//               echo "$data[$c]";// . "<br />\n";
//               echo " ";
//           }
//           echo "<br>";
//       }
//       fclose($handle);
//   }
//
// import2Database("ChampionUserFields.csv");
// // echo test();
// }

/*MySQL Code*/
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
//echo "Connected successfully!";
//echo "<br>";
echo "";

//Check if the Database Exists
$sql = "CREATE DATABASE IF NOT EXISTS myDB";
//$sql = "CREATE DATABASE dbname";
if ($conn->query($sql) === TRUE) {
  // echo "Database created successfully!";
  // echo "<br>";
  echo "";
  $conn = new mysqli($servername, $username, $password, $dbname);
} else {
  // echo "Error creating database: " . $conn->error;
  // echo "<br>";
  echo "";
}

// sql to create Admin table
   $sql = "CREATE TABLE Admin (
   id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   Login VARCHAR(30) NOT NULL,
   Password VARCHAR(30) NOT NULL,
   reg_date TIMESTAMP
   )";
if ($conn->query($sql) === TRUE) {
  // echo "Admin Table Created";
  // echo "<br>";
  echo "";
} else {
 // echo "Error creating table: " . $conn->error;
  // echo "<br>";
  echo "";
}

// sql to create Donor table
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
   Invites_Sent INT(11),
   Email_Contact TINYINT(1),
   Post_Contact TINYINT(1),
   Sellers_ID INT(11),
   Donation TINYINT (1),
   Means_of_Payment TINYINT (1),
   reg_date TIMESTAMP
   )";
if ($conn->query($sql) === TRUE) {
  // echo "Donor Table Created";
  // echo "<br>";
  echo "";
} else {
 // echo "Error creating table: " . $conn->error;
  // echo "<br>";
  echo "";
}

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
   reg_date TIMESTAMP
   )";
if ($conn->query($sql) === TRUE) {
  // echo "Buyer Table Created";
  // echo "<br>";
  echo "";
} else {
   // create a new table
 // echo "Error creating table: " . $conn->error;
 // echo "<br>";
 echo "";
}

// sql to create Tickets table
   $sql = "CREATE TABLE Tickets (
   id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   Seller_ID INT(11) NOT NULL,
   Buyer_ID INT(11) NOT NULL,
   Ticket_Type_ID TINYINT(1) NOT NULL,
   Confirmed TINYINT(1),
   Receipt TINYINT(1),
   reg_date TIMESTAMP
   )";
if ($conn->query($sql) === TRUE) {
  // echo "Tickets Table Created";
  // echo "<br>";
  echo "";
} else {
   // create a new table
 // echo "Error creating table: " . $conn->error;
 // echo "<br>";
 echo "";
 }

// sql to create Ticket_Type table
   $sql = "CREATE TABLE Ticket_Type (
   id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   Price DOUBLE NOT NULL,
   reg_date TIMESTAMP
   )";

if ($conn->query($sql) === TRUE) {
  // echo "Ticket_Type Table Created";

  // echo "<br>";
  echo "";
} else {
   // create a new table
 // echo "Error creating table: " . $conn->error;
 // echo "<br>";
 echo "";
}

/*
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully!";
  echo "<br>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
*/

//Select Data from Table
/*
$sql = "SELECT id, firstname, lastname FROM Tickers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each rows
  while($row = $result->fetch_assoc()) {
      echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}
*/


// $LastName 1
// $FirstName  2
// $Address1 3
// $Address2 4
// $City 5
// $Province 6
// $Postal_Code 7
// $Country 8
// $Phone 9
// $Email_Contact 12 -> convert that into 0 or 1, yes -> 1
// $Post_Contact  13 -> convert thati nto 0 or 1
// $Email 11
// $uid 15
// store the constant for the index






// define("LastName_i", 1);
// define("FirstName_i", 2);
// define("Address1_i", 3);
// define("Address2_i", 4);
// define("City_i", 5);
// define("Province_i", 6);
// define("Postal_Code", 7);
// define("Country", 8);
// define("Phone", 9);
// define("Email", 11);
// define("Email_Contact", 12);
// define("Post_Contact", 13);
// define("uid", 15);
$LastName = "";
$FirstName = "";
$Address1 = "";
$Address2 = "";
$City = "";
$Province = "";
$Postal_Code = "";
$Country = "";
$Phone = "";
$Email = "";
$Email_Contact = "";
$Post_Contact = "";
$uid = "";

if (($handle = fopen("ChampionUserFields.csv", "r")) !== FALSE) {
    $not_first_line = False;
    while (($data = fgetcsv($handle, 2000, ",")) !== FALSE) {
        $num = count($data);
        for ($c=0; $c < $num; $c++) {
          if ($not_first_line){
            if ($c == 1){
                $LastName = $data[$c];

            }elseif ($c == 2){
              $FirstName = $data[$c];
              // $first_line = False;
            }elseif ($c == 3){
              $Address1 = $data[$c];
            }elseif ($c == 4){
              $Address2 = $data[$c];
            }elseif ($c == 5){
              $City = $data[$c];
            }elseif($c == 6){
              $Province = $data[$c];
            }elseif($c == 7){
              $Postal_Code = $data[$c];
            }elseif($c == 8){
              $Country = $data[$c];
            }elseif($c == 9){
              $Phone = $data[$c];
            }elseif ($c == 11){
              $Email = $data[$c];
            }elseif ($c == 12){
              $Email_Contact = $data[$c];
            }elseif ($c == 13){
              $Post_Contact = $data[$c];
            }elseif ($c == 15){
              $uid = $data[$c];
            }

          }

        }


        // change the bool of first_line
        if ($not_first_line){

        // read the next line in the file
        // reset the index
        // insert the information to the database
        $sql = "INSERT INTO Sellers (LastName, FirstName, Address1, Address2, City, Province, Postal_Code, Country, Phone, Email, Email_Contact, Post_Contact, uid)
        VALUES ('$LastName', '$FirstName', '$Address1', '$Address2', '$City', '$Province', '$Postal_Code', '$Country', '$Phone', '$Email', '$Email_Contact', '$Post_Contact', '$uid')";

        if ($conn->query($sql) === TRUE) {
          // echo "New record created successfully!";
          // echo "<br>";
          echo "";
        } else {
          // echo "Error: " . $sql . "<br>" . $conn->error;
          echo "";
        }

        //Select Data from Table

        $sql = "SELECT id, firstname, lastname FROM Tickers";
        $result = $conn->query($sql);

        //if ($result->num_rows > 0) {
          // output data of each rows
          //while($row = $result->fetch_assoc()) {
              // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
              //echo "";
          //}
        //} else {
          // echo "0 results";
          //echo "";
        //}
        }
        // change the value of $not_first_line
        $not_first_line = True;
}
}
$conn->close();
// print a msg
echo "File uploaded successfully";
header('Location: Secondharvestdash.html');
exit();
?>
