<!DOCTYPE HTML>
<HTML>
    <HEAD>
        <TITLE>기본 틀</TITLE>
        <meta charset="utf-8">
        
        <link href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/main.css" rel="stylesheet">
		<link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/bbs/css/editor.css" type="text/css" charset="utf-8"/>
		<script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/bbs/js/editor_loader.js?environment=development" type="text/javascript" charset="utf-8"></script>

    </HEAD>
    <BODY>
	<div class="header">
            <a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/">홈</a> 
            <a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/find_member/list.php">멤버보기</a> 
            <a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/bbs/list.php">게시판글목록</a> 
            <a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/bbs/write.php">게시판 글쓰기</a>
            
            <br />
            
            
            로그인 상태: 
            <?php if($_COOKIE['is_logged'] == 'YES') {
                echo '로그인 되었습니다. '; 
                echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/member/logout.php">로그아웃</a>'; 
            }
                ?>
	</div><!-- .header -->
	<div class="content">