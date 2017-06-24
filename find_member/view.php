<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/preset.php';
include $_SERVER['DOCUMENT_ROOT'].'/header.php';
?>


<?php


$q = "SELECT * FROM ap_member WHERE member_idx = $member_idx";
$result = $mysqli->query($q);
$data = $result->fetch_array();


?>

<table>
    <tr>
        <td>
    아이디
    </td>
    <td>
            <?php echo $data['id']; ?>
    </td>
    </tr>
    <tr>
        <td>
    이메일
    </td>
    <td>
            <?php echo $data['email']; ?>
    </td>
    </tr>

</table> 


<?php
    echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/find_member/list.php?page='.$page.'&field='.$field.'&src_value='.$src_value.'" class="btn" >목록</a>'; 
    
?>


</br> 





following </br> 

<?php

$q = "SELECT * FROM follow WHERE member_idx = $member_idx";
$result = $mysqli->query($q);
$following_number = $result->num_rows;
echo $following_number;


?>

</br> 

followed </br>

<?php

$q = "SELECT * FROM follow WHERE following = $member_idx";
$result = $mysqli->query($q);
$followed_number = $result->num_rows;
echo $followed_number;

?>


 
<form name ="comment_form" method = "POST" action = "./follow_friend_check.php">
    <input type="hidden" name="session_member" value=<?php echo $_SESSION['member_idx'] ?>>
    <input type="hidden" name="member_idx" value=<?php echo $member_idx ?>>
    <input type = "submit" value = "팔로우하기">
</form>






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
    include $_SERVER['DOCUMENT_ROOT'].'/footer.php';
?> 



