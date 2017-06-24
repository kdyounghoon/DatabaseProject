
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/preset.php';
include $_SERVER['DOCUMENT_ROOT'].'/header.php';
?>

<?php

$q = "SELECT * FROM ap_member";
$result = $mysqli->query( $q);
$total_record = $result->num_rows;

?>


        목록<br />
       
<?php if($total_record==0) :?>
    글이 없습니다.
<?php else :?>
<?php
if( isset($page) && $page!='') {
    $now_page = $page;
}
else {
    $now_page = 1;
}


$record_per_page = 5;
$page_per_block = 10;

$now_block = ceil($now_page / $page_per_block);

$start_record = $record_per_page*($now_page-1);
$record_to_get = $record_per_page;

if( $start_record+$record_to_get > $total_record) {
  $record_to_get = $total_record - $start_record;
}

$q = "SELECT * FROM ap_member WHERE 1 ORDER BY member_idx DESC LIMIT $start_record, $record_to_get";
$result = $mysqli->query($q);
if($result==false) {
    
}
else {
    
}

?>


<table class="table">
    <thead>
        <th>회원번호</th>
        <th아이디</th>
        <th>email</th>
    </thead>
<?php while($data = $result->fetch_array()) :?>
    <tr>
        <td><?php echo $data['member_idx']?></td>
        <td><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/find_member/view.php?member_idx=<?php echo $data['member_idx']; ?>" ><?php echo $data['id']?></a></td>
        <td><?php echo $data['email']?></td>
    </tr>
    
<?php endwhile ?>
</table>

<div class="pagination">
    <ul>
<?php
$total_page = ceil($total_record / $record_per_page);
$total_block = ceil($total_page / $page_per_block);

if(1<$now_block ) {
  $pre_page = ($now_block-1)*$page_per_block;
  echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/find_member/list.php?page='.$pre_page.'">이전</a>';

}

$start_page = ($now_block-1)*$page_per_block+1;
$end_page = $now_block*$page_per_block;
if($end_page>$total_page) {
  $end_page = $total_page;
}

?>
    
<?php for($i=$start_page;$i<=$end_page;$i++) :?>
    <li><a href="./list.php?id=<?php echo $id ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
<?php endfor?>
</ul>
<?php
if($now_block < $total_block) {
  $post_page = ($now_block)*$page_per_block+1;
  echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/find_member/list.php?page='.$post_page.'">다음</a>';
}

?>
</div><!-- .pagination -->


<?php endif?>


<?php
    include $_SERVER['DOCUMENT_ROOT'].'/footer.php';
?> 

