<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/preset.php';
include $_SERVER['DOCUMENT_ROOT'].'/header.php';


$commnet_writing_status = $_SESSION['comment_writing_status'];
var_dump($result);
var_dump($_SESSION);


if($commnet_writing_status =='YES') {
    $message = '코멘트가 저장되었습니다.';
}
else {
    $message = '저장에 실패했습니다.';
}
?>
        write_done.php -코멘트저장 완료 페이지<br />
        <hr />
<?php
    echo $message;
?>
<?php
    include $_SERVER['DOCUMENT_ROOT'].'/footer.php';
?>
 
