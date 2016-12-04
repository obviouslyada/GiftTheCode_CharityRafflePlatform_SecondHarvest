<?php
	$email = $_POST['email'];
	echo "E-mails: " . $email;	
	
	error_reporting(-1);
	ini_set('display_errors', 'On');

	$headers = array("From: from@secondharvest.com",
	"Reply-To: replyto@secondharvest.com",
	"X-Mailer: PHP/" . PHP_VERSION
	);
	$headers = implode("\r\n", $headers);
	$didhappen = mail($email, 'Second Harvest Test', 'Second Harvest Test', $headers);
	echo "<br>";

	if($didhappen) {
	  echo 'E-mail Sent';
	} else {
	  echo 'E-mail Not Sent';
	}
?>