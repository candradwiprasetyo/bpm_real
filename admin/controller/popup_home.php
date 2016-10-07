<?php
include '../../libraries/config.php';
$req = $_GET['req'];
switch($req){
	
	
	case edit:
	$query_gambar = mysql_query("select * from popup_home");
	$jml = mysql_num_rows($query_gambar);
	
	$img = $_FILES['img']['name'];
	$path = "img/images/";
	$rte1 = $_POST['rte1'];
	$name = $_POST['name'];
	$date2 = date("YmdHms");
	
	if($name == "" || $rte1 == ""){
		header('Location: ../../admin.php?page=admin/view/popup_home&err=1');

	}else{
	
	
	if($jml > 0){
		
		if($img == ""){
			$Mysql->edit("popup_home","name = '$name', content = '$rte1' " ,"id='1'");
		}else{
		
		
		$row_gambar = mysql_fetch_object($query_gambar);
		$fots = $row_gambar->img;
		if(file_exists("../../".$fots) && $fots != ""){
			unlink("../../".$fots);
		}

		$Mysql->edit("popup_home","name = '$name', img='$path$date2$img', content = '$rte1'","id='1'");
		
		move_uploaded_file($_FILES['img']['tmp_name'],"../../".$path.$date2.$_FILES['img']['name']);
		}
	}else{
		if($img == ""){
		$Mysql->save("popup_home", "('1','$name','','$rte1')");
		
		}else{
		$Mysql->save("popup_home", "('1','$name','$path$date2$img','$rte1')");
		move_uploaded_file($_FILES['img']['tmp_name'],"../../".$path.$date2.$_FILES['img']['name']);
		}
	}
	header('Location: ../../admin.php?page=admin/view/popup_home&did=1');
	
	}
		
		
	break;
	
	
	
}
?>