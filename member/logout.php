<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/preset.php';
?>
<?php


$valid_logout = false;

if(isset($_COOKIE["is_logged"]) == 'YES'){;

setcookie("is_logged", "", time() - 3600);
$_SESSION['user_id'] = '';
$_SESSION['member_idx'] = '';
$valid_logout = true; 

session_unset($_SESSION['user_id']);
session_unset($_SESSION['member_idx']);



}


header('Location: '.$url['root'].'member/logout_done.php');
exit();

?> 


