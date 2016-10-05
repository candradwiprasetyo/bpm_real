<?php
include '../../libraries/config.php';
$req = $_GET['req'];
switch($req){
	case save:
	extract($_POST);
	$af_file = $_FILES['af_file']['name'];
	$path = "file/application_form/";
	$af_date = date("Y-m-d H:m:s");
	
		if($af_name == "" || $af_description == "" || $af_file == ""){
			header('Location: ../../admin.php?page=admin/view/application_form&add=1&err=1');
		}else{
		
			$Mysql->save("application_forms",
					"('','$af_name','$af_description','$af_date','$path$af_file','1')");	
			move_uploaded_file($_FILES['af_file']['tmp_name'],"../../".$path.$_FILES['af_file']['name']);
			header('Location: ../../admin.php?page=admin/view/application_form&did=1');
		}
	
	
	break;
	
	case edit:
	$af_id = $_GET['af_id'];
	$af_file = $_FILES['af_file']['name'];
	$path = "file/application_form/";
	$af_date = date("Y-m-d H:m:s");
	
	extract($_POST);
	
	if($af_name == "" || $af_description == ""){
		header("Location: ../../admin.php?page=admin/view/application_form&af_id=$af_id&err=1");
	}else{
		if($af_file != ""){
			$query_gambar = mysql_query("select af_file from application_forms where af_id = '".$af_id."'");
			$row_gambar = mysql_fetch_object($query_gambar);
			$fots = $row_gambar->af_file;
			if(file_exists("../../".$fots) && $fots != ""){
				unlink("../../".$fots);
			}
			move_uploaded_file($_FILES['af_file']['tmp_name'],"../../".$path.$_FILES['af_file']['name']);
			$Mysql->edit("application_forms","af_name='$af_name', af_description='$af_description', af_file='$path$af_file'","af_id='$af_id'");
		}else{
			$Mysql->edit("application_forms","af_name='$af_name', af_description='$af_description'","af_id='$af_id'");
		}
		header("Location: ../../admin.php?page=admin/view/application_form&did=2");
	}
		
	break;
	
	case delete:
	$af_id = $_GET['af_id'];
	
	$query_gambar = mysql_query("select af_file from application_forms where af_id = '".$af_id."'");
			$row_gambar = mysql_fetch_object($query_gambar);
			$fots = $row_gambar->af_file;
			if(file_exists("../../".$fots) && $fots != ""){
				unlink("../../".$fots);
			}
			
	$Mysql->delete("application_forms","af_id ='$af_id'");
	header('Location: ../../admin.php?page=admin/view/application_form&did=3');
	break;
	
	case act:
	$af_id = $_GET['af_id'];

	
		$Mysql->edit("application_forms","active_status='1'","af_id='$af_id'");
		header('Location: ../../admin.php?page=admin/view/application_form&did=4');
	
		
	break;
	
	case deact:
	$af_id = $_GET['af_id'];

		$Mysql->edit("application_forms","active_status='0'","af_id='$af_id'");
		
		header('Location: ../../admin.php?page=admin/view/application_form&did=5');
	break;
	
}
?>