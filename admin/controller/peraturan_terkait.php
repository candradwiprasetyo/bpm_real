<?php
include '../../libraries/config.php';
$req = $_GET['req'];
switch($req){
	case save:
	extract($_POST);
	$pt_file = $_FILES['pt_file']['name'];
	$path = "file/peraturan_terkait/";
	$pt_date = date("Y-m-d H:m:s");
	
		if($pt_name == "" || $pt_description == ""){
			header('Location: ../../admin.php?page=admin/view/peraturan_terkait&add=1&err=1');
		}else{
		
			$Mysql->save("peraturan_terkait",
					"('','$pt_name','$pt_description','$pt_date','$path$pt_file','1')");	
			move_uploaded_file($_FILES['pt_file']['tmp_name'],"../../".$path.$_FILES['pt_file']['name']);
			header('Location: ../../admin.php?page=admin/view/peraturan_terkait&did=1');
		}
	
	
	break;
	
	case edit:
	$pt_id = $_GET['pt_id'];
	$pt_file = $_FILES['pt_file']['name'];
	$path = "file/peraturan_terkait/";
	$pt_date = date("Y-m-d H:m:s");
	
	extract($_POST);
	
	if($pt_name == "" || $pt_description == ""){
		header("Location: ../../admin.php?page=admin/view/peraturan_terkait&pt_id=$pt_id&err=1");
	}else{
		if($pt_file != ""){
			$query_gambar = mysql_query("select pt_file from peraturan_terkait where pt_id = '".$pt_id."'");
			$row_gambar = mysql_fetch_object($query_gambar);
			$fots = $row_gambar->pt_file;
			if(file_exists("../../".$fots) && $fots != "file/peraturan_terkait/"){
				unlink("../../".$fots);
			}
			move_uploaded_file($_FILES['pt_file']['tmp_name'],"../../".$path.$_FILES['pt_file']['name']);
			$Mysql->edit("peraturan_terkait","pt_name='$pt_name', pt_description='$pt_description', pt_file='$path$pt_file'","pt_id='$pt_id'");
		}else{
			$Mysql->edit("peraturan_terkait","pt_name='$pt_name', pt_description='$pt_description'","pt_id='$pt_id'");
		}
		header("Location: ../../admin.php?page=admin/view/peraturan_terkait&did=2");
	}
		
	break;
	
	case delete:
	$pt_id = $_GET['pt_id'];
	
	$query_gambar = mysql_query("select pt_file from peraturan_terkait where pt_id = '".$pt_id."'");
			$row_gambar = mysql_fetch_object($query_gambar);
			$fots = $row_gambar->pt_file;
			if(file_exists("../../".$fots) && $fots != "file/peraturan_terkait/"){
				unlink("../../".$fots);
			}
			
	$Mysql->delete("peraturan_terkait","pt_id ='$pt_id'");
	header('Location: ../../admin.php?page=admin/view/peraturan_terkait&did=3');
	break;
	
	case act:
	$pt_id = $_GET['pt_id'];

	
		$Mysql->edit("peraturan_terkait","active_status='1'","pt_id='$pt_id'");
		header('Location: ../../admin.php?page=admin/view/peraturan_terkait&did=4');
	
		
	break;
	
	case deact:
	$pt_id = $_GET['pt_id'];

		$Mysql->edit("peraturan_terkait","active_status='0'","pt_id='$pt_id'");
		
		header('Location: ../../admin.php?page=admin/view/peraturan_terkait&did=5');
	break;
	
}
?>