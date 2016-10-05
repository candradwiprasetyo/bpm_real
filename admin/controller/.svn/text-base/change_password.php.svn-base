<?php
include '../../libraries/config.php';
$req = $_GET['req'];
switch($req){
	case save:
	extract($_POST);
	
	$user_id =  $_SESSION['user_id'];
	
	$user_password = md5($_POST['user_password']);
	$c_user_password = md5($_POST['c_user_password']);


		if($_POST['user_password'] == ""){
			header('Location: ../../admin.php?page=admin/view/change_password&err=1');
		}else{
		
			if($user_password==$c_user_password){
				$Mysql->edit("user","user_password='$user_password'","user_id='$user_id'");
				header('Location: ../../admin.php?page=admin/view/change_password&did=1');
			}else{
				header('Location: ../../admin.php?page=admin/view/change_password&err=2');
			}
		
		}
	
	break;
	
	
}
?>