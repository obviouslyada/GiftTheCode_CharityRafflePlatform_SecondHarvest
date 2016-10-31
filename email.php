<?php
error_reporting(-1);
ini_set('display_errors', 'On');

$headers = array("From: from@example.com",
"Reply-To: replyto@example.com",
"X-Mailer: PHP/" . PHP_VERSION
);
$headers = implode("\r\n", $headers);
$didhappen = mail('mytang.sdk@gmail.com', 'test', 'test', $headers);

if($didhappen) {
  echo 'true';
} else {
  echo 'false';
}
?>