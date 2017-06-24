<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/preset.php';
include $_SERVER['DOCUMENT_ROOT'].'/header.php';
?>

<?php


$q = "SELECT * FROM ap_bbs WHERE doc_idx = $doc_idx";
$result = $mysqli->query($q);
$data = $result->fetch_array();
$_SESSION['doc_idx'] = $data['doc_idx'];

?>

<table>
    <tr>
        <td>
    제목
    </td>
    <td>
            <?php echo $data['subject']; ?>
    </td>
    </tr>
    <tr>
        <td>
    작성자
    </td>
    <td>
            <?php echo $data['member_idx']; ?>
    </td>
    </tr>
    <tr>
        <td>
            내용
    </td>
    <td>
            <?php echo $data['content']; ?>
            
    </td>
    </tr>
</table> 


<?php
    echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/bbs/list.php?page='.$page.'&field='.$field.'&src_value='.$src_value.'" class="btn" >목록</a>'; 
    
?>

<?php
    if( $_SESSION['member_idx']==$data['member_idx']) {
        echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/bbs/modify.php?doc_idx='.$doc_idx.'">수정</a>';
    }
?>

<?php
    if( $_SESSION['member_idx']==$data['member_idx']) {
        echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/bbs/delete.php?doc_idx='.$doc_idx.'">삭제</a>';
    }
?>

댓글쓰기<br />
<form name ="comment_form" method = "POST" action = "./comment_check.php">
<input type="hidden" name="member_idx" value="<?php echo $_SESSION['member_idx'] ?>">


<table>
    <tr>
        <td>
            내용
    </td>
    <td>
            <textarea name="comment" cols="100" rows="10"></textarea>
    </td>
    </tr>
</table>

<div>
    <input type = "submit" value = "댓글적기">
</div>


</form>


<?php

$q = "SELECT * FROM ap_comment where doc_idx = $doc_idx";
$result = $mysqli->query($q);
$total_record = $result->num_rows;

?>


        코멘트<br />
       
<?php if($total_record==0) :?>
    코멘트가 없습니다.
<?php else :?>

<table class="table">
    <thead>
        <th>코멘트번호</th>
        <th>작성자 인덱스</th>
        <th>내용</th>
        <th>등록일시</th>
    </thead>
<?php while($data = $result->fetch_array()) :?>
    <tr>
        <td><?php echo $data['doc_idx']?></td>
        <td><?php echo $data['member_idx']?></td>
        <td><?php echo $data['comment_content']?></td>
        <td><?php echo $data['reg_date_comment']?></td>
    </tr>
    
<?php endwhile ?>
</table>


<?php endif?>


<?php
    include $_SERVER['DOCUMENT_ROOT'].'/footer.php';
?> 




