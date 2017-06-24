<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/preset.php';
include $_SERVER['DOCUMENT_ROOT'].'/header.php';
?>
        login.php - 로그인 페이지<br />
        <hr />

         <form name="login_form" method="post" action="./login_check.php" >
            아이디 : <input type="text" name="user_id" /><br />
            비밀번호 : <input type="password" name="user_pass" /><br />
            <input type="submit" value="로그인" />
        </form>    
        
<?php
    include $_SERVER['DOCUMENT_ROOT'].'/footer.php';
?>
