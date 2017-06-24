<?php
session_start();


$p = array();
$path['root'] = $_SERVER['DOCUMENT_ROOT'].'/';


$url = array();
$url['root'] = 'http://'.$_SERVER['HTTP_HOST'].'/'; 

require_once ($paath['root'].'config.php');

$mysqli = new mysqli($servername, $username, $password, $database);
if (mysqli_connect_error()) {
    exit('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
}

setcookie("user_id", $user_id, time() + 3600, "/"); // 86400 = 1 day


extract($_POST);
extract($_GET);

?>