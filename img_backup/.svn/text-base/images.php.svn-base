<?php
include'../libraries/config.php';
$img_id = $_GET['img_id'];
$q = mysql_query("select * from images where img_id='$img_id'");
while($row=mysql_fetch_array($q)){ 

$picture_thumb = $row['img_img'];
//header("Content-length: $picture_size");
header("Content-type: image/jpeg");
//header("Content-Disposition: attachment; filename=$picture_name");
print $picture_thumb;
}


?>