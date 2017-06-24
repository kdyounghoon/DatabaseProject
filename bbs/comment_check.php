<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/preset.php';
?>
<?php



$reg_date_comment = time();
$member_idx = $_SESSION['member_idx'];
$doc_idx =  $_SESSION['doc_idx'];


echo $reg_date_comment;
echo $member_idx;
echo $doc_idx;
echo $comment;

$q = "INSERT INTO ap_comment (doc_idx, member_idx, comment_content, reg_date_comment) VALUES('$doc_idx', '$member_idx', '$comment', '$reg_date_comment')";
$result = $mysqli->query($q);


if ($result==false) {
    $_SESSION['comment_writing_status'] = 'NO';
}
else {
    $_SESSION['comment_writing_status'] = 'YES';
}

$mysqli->close();

//header('Location: '.$url['root'].'bbs/comment_done.php');
header('Location: '.$url['root'].'bbs/view.php?doc_idx='.$doc_idx);
exit();
 
?> 
