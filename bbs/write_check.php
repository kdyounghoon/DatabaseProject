<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/preset.php';
?>
<?php


$reg_date = time();
$member_idx = $_SESSION['member_idx'];

$mysqli->autocommit(false);
$mysqli->begin_transaction();
 

$q = "INSERT INTO ap_bbs (member_idx, subject, content, reg_date) VALUES('$member_idx', '$subject', '$content', '$reg_date')";
$result = $mysqli->query($q);



if (!$result) {
    
$_SESSION['writing_status'] = 'NO';
$mysqli->rollback();

}

else {
    
$_SESSION['writing_status'] = 'YES';
$mysqli->commit();

}
    

$mysqli->close();

header('Location: '.$url['root'].'bbs/write_done.php');
exit();

?> 
