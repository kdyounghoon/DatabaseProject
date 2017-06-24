
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/preset.php';
include $_SERVER['DOCUMENT_ROOT'].'/header.php';
?>

<?php

if(isset($src_value)){
    $new_query = "WHERE $field LIKE '%$src_value%'";
}

$q = "SELECT * FROM ap_bbs";
$q = $q." ".$new_query;
$result = $mysqli->query($q);
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

$q = "SELECT * FROM ap_bbs $new_query ORDER BY doc_idx DESC LIMIT $start_record, $record_to_get";
$result = $mysqli->query($q);
if($result==false) {
    
}
else {
    
}

?>


<table class="table">
    <thead>
        <th>글번호</th>
        <th>제목</th>
        <th>작성자 인덱스</th>
        <th>등록일시</th>
    </thead>
<?php while($data = $result->fetch_array()) :?>
    <tr>
        <td><?php echo $data['doc_idx']?></td>
        <td><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/bbs/view.php?doc_idx=<?php echo $data['doc_idx']; ?>&field=<?php echo $field; ?> &src_value=<?php echo $src_value; ?>" </a> <?php echo $data['subject']?> </td>
        <td><?php echo $data['member_idx']?></td>
        <td><?php echo $data['reg_date']?></td>
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
  echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/bbs/list.php?page='.$pre_page.'&field='.$field.'&src_value='.$src_value.'"이전</a>';

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
  echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/bbs/list.php?page='.$post_page.'&field='.$field.'&src_value='.$src_value.'">다음</a>';
}

?>
</div><!-- .pagination -->


<?php endif?>

<form method = get action = 'list.php' action = 'view.php'>
    <tr>
        <td width = 100% colspan =5 alighn = center>
            <input type = hidden name = page value = <?php echo "$page"; ?>>
            <select name = field>
            <option value = member_idx>id </option>
            <option value = subject>제목 </option>
            <option value = content>내용 </option>
            
            <input type = text name=src_value size = 30>
            <input type = submit value = 검색>
        
        </td>
            
            
    </tr>
</form>


<?php

    include $_SERVER['DOCUMENT_ROOT'].'/footer.php';
?> 

