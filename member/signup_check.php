<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/preset.php';
?>

<?php 
$encrypted_pass = sha1($user_pass);

$q = "INSERT INTO ap_member ( id, pw, email ) VALUES ( '$user_id', '$encrypted_pass', '$user_email' )";

$mysqli->query( $q);

$mysqli->close();

header("Location: ./signup_done.php");

exit();

?> 
