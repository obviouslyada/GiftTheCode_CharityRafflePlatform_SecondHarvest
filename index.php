<?php

/*MySQL Code*/
$servername = "localhost";
$username = "root";
$password = "test";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

/*E-mail Code
    error_reporting(-1);
    ini_set('display_errors', 'On');

    $headers = array("From: from@example.com",
    "Reply-To: replyto@example.com",
    "X-Mailer: PHP/" . PHP_VERSION
    );
    $headers = implode("\r\n", $headers);
    $didhappen = mail('mtang.test@gmail.com', 'test', 'test', $headers);

     if($didhappen) {
        echo 'true';
     } else {
        echo 'false';
     }
*/

/* Oracle Code
http://php.net/manual/en/function.oci-connect.php
resource oci_connect ( string $username , string $password [, string $connection_string [, string $character_set [, int $session_mode ]]] )
*/
?>