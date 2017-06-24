<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/preset.php';
include $_SERVER['DOCUMENT_ROOT'].'/header.php';


$following = $_SESSION['following'];
var_dump($result);
var_dump($_SESSION);


if($following =='YES') {
    $message = '팔로우 했습니다';
}
else {
    $message = '이미 팔로우 중입니다.';
}
?>
        write_done.php -팔로우 완료 페이지<br />
        <hr />
<?php
    echo $message;
?>
<?php
    include $_SERVER['DOCUMENT_ROOT'].'/footer.php';
?>
 
