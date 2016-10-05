<?php
include '../../libraries/config.php';
$req = $_GET['req'];
switch($req){
	
	
	case edit:
	$query_gambar = mysql_query("select gub_photo from config");
	$jml = mysql_num_rows($query_gambar);
	$date2 = date("YmdHms");
	$gub_photo = $_FILES['gub_photo']['name'];
	$path = "img/images/";
	
	if($gub_photo == ""){
		header('Location: ../../admin.php?page=admin/view/foto&err=1');
	}else{
	
	if($jml > 0){
		$Mysql->edit("config","gub_photo='$path$date2$gub_photo'","config_id='1'");
		
		$row_gambar = mysql_fetch_object($query_gambar);
		$fots = $row_gambar->gub_photo;
		if(file_exists("../../".$fots) && $fots != ""){
			unlink("../../".$fots);
		}
		
		move_uploaded_file($_FILES['gub_photo']['tmp_name'],"../../".$path.$date2.$_FILES['gub_photo']['name']);
	}else{
		$Mysql->save("config", "('1','$path$gub_photo','','','','','','')");
		move_uploaded_file($_FILES['gub_photo']['tmp_name'],"../../".$path.$date2.$_FILES['gub_photo']['name']);
	}

	header('Location: ../../admin.php?page=admin/view/foto&did=1');
	}
		
		
	break;
	
	
	
}
?>