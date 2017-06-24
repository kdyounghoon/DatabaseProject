<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/preset.php';
include $_SERVER['DOCUMENT_ROOT'].'/header.php';
?>
<?php
    if(isset($_COOKIE['user_id'])){
        echo $_COOKIE['user_id'];
    }


?>


        첫 페이지
        <hr />
        <a href="./member/signup.php" class ="btn">회원가입</a>
        <hr />
        <a href="./member/login.php" class="btn">로그인</a>
        

        
<?php
    include $_SERVER['DOCUMENT_ROOT'].'/footer.php';
?>