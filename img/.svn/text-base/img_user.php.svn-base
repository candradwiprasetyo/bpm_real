<?php
include'../lib/config.php';
$id = $_GET['id'];
$q = mysql_query("select * from images where id_admin='$id'");
while($row=mysql_fetch_array($q)){ 

$picture_thumb = $row['img'];
//header("Content-length: $picture_size");
header("Content-type: image/jpeg");
//header("Content-Disposition: attachment; filename=$picture_name");
print $picture_thumb;
}


?>