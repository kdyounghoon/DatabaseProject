<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/preset.php';
?>
<?php

$q = "SELECT * FROM follow where member_idx = $session_member and following = $member_idx";
$check_result = $mysqli->query($q);
if(!$check_result){

$q = "INSERT INTO follow (member_idx, following) VALUES('$session_member','$member_idx')";
$result = $mysqli->query($q);

}else {
     $_SESSION['following'] = 'NO';
}


if ($result==false) {
    $_SESSION['following'] = 'NO';
}
else {
    $_SESSION['following'] = 'YES';
}



$mysqli->close();


header('Location: '.$url['root'].'find_member/follow_friend_done.php');
exit();
 
?> 
