<?php
include '../../libraries/config.php';
$req = $_GET['req'];
switch($req){
	
	
	case edit:
	$query_gambar = mysql_query("select background from config");
	$jml = mysql_num_rows($query_gambar);
	$date2 = date("YmdHms");
	
	$background = $_FILES['background']['name'];
	$path = "img/images/";
	
	if($background == ""){
		header('Location: ../../admin.php?page=admin/view/background&err=1');
	}else{
	
	if($jml > 0){
		$Mysql->edit("config","background='$path$date2$background'","config_id='1'");
		
		$row_gambar = mysql_fetch_object($query_gambar);
		$fots = $row_gambar->background;
		if(file_exists("../../".$fots) && $fots != ""){
			unlink("../../".$fots);
		}
		
		move_uploaded_file($_FILES['background']['tmp_name'],"../../".$path.$date2.$_FILES['background']['name']);
	}else{
		$Mysql->save("config", "('1','$path$background','','','','','','')");
		move_uploaded_file($_FILES['background']['tmp_name'],"../../".$path.$date2.$_FILES['background']['name']);
	}
	header('Location: ../../admin.php?page=admin/view/background&did=1');
	
	}
		
		
	break;
	
	
	
}
?>