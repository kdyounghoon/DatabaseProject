<?php
require_once '../preset.php';
?>

<?php

$q = "SELECT * FROM ap_member WHERE id='$user_id'";
$result = $mysqli->query($q);

$encryped_pass = sha1($user_pass);
$is_logged = true;
if($result->num_rows) {
    //해당 ID 의 회원이 존재할 경우
    // 암호가 맞는지를 확인

    $encryped_pass = sha1($user_pass);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    
    if( $row['pw'] == $encryped_pass ) {
        //$_SESSION['is_logged'] = 'YES';
        $_SESSION['user_id'] = $user_id;
        $_SESSION['member_idx'] = $row['member_idx'];
        setcookie("is_logged", 'YES', time() + 3600, "/");
        setcookie("user_id", $user_id, time() + 3600, "/");
        header("Location: ./login_done.php");
        exit();
    }
    else {
        $_SESSION['is_logged'] = 'NO';
        $_SESSION['user_id'] = '';
        setcookie("is_logged", 'NO', time() + 3600, "/");
        header("Location: ./login_done.php");
        exit();
   } 
}
else{
    
}
$result->free();
$mysqli->close();
   
?>



