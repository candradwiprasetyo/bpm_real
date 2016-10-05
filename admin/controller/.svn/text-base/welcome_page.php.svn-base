<?php
include '../../libraries/config.php';
$req = $_GET['req'];
switch($req){
	
	
	case edit:
	$query_gambar = mysql_query("select welcome_page, welcome_page_photo, welcome_page_name from config");
	$jml = mysql_num_rows($query_gambar);
	
	$img = $_FILES['img']['name'];
	$path = "img/images/";
	$rte1 = $_POST['rte1'];
	$welcome_page_name = $_POST['welcome_page_name'];
	$date2 = date("YmdHms");
	
	if($welcome_page_name == "" || $rte1 == ""){
		header('Location: ../../admin.php?page=admin/view/welcome_page&err=1');

	}else{
	
	
	if($jml > 0){
		
		if($img == ""){
			$Mysql->edit("config","welcome_page = '$rte1', welcome_page_name = '$welcome_page_name'","config_id='1'");
		}else{
		$Mysql->edit("config","welcome_page = '$rte1', welcome_page_photo='$path$date2$img', welcome_page_name = '$welcome_page_name'","config_id='1'");
		
		$row_gambar = mysql_fetch_object($query_gambar);
		$fots = $row_gambar->welcome_page_photo;
		if(file_exists("../../".$fots) && $fots != ""){
			unlink("../../".$fots);
		}
		
		move_uploaded_file($_FILES['img']['tmp_name'],"../../".$path.$date2.$_FILES['img']['name']);
		}
	}else{
		if($img == ""){
		$Mysql->save("config", "('1','','','$rte1','','$welcome_page_name','','')");
		
		}else{
		$Mysql->save("config", "('1','','','$rte1','$path$date2$img','$welcome_page_name','','')");
		move_uploaded_file($_FILES['img']['tmp_name'],"../../".$path.$date2.$_FILES['img']['name']);
		}
	}
	header('Location: ../../admin.php?page=admin/view/welcome_page&did=1');
	
	}
		
		
	break;
	
	
	
}
?>