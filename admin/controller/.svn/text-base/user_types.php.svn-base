<?php
include '../../libraries/config.php';
$req = $_GET['req'];
switch($req){
	case save:
	extract($_POST);
	
	if($user_type_name == ""){
		header('Location: ../../admin.php?page=admin/view/user_types&add=1&err=1');
	}else{
		$Mysql->save("user_types",
					"('','$user_type_name','$user_type_type')");	
		header('Location: ../../admin.php?page=admin/view/user_types&did=1');
	}
	
	
	break;
	
	case edit:
	$user_type_id = $_GET['user_type_id'];
	
	extract($_POST);
	if($user_type_name == ""){
		header("Location: ../../admin.php?page=admin/view/user_types&user_type_id=$user_type_id&err=1");
	}else{
		$Mysql->edit("user_types","user_type_name='$user_type_name', user_type_type='$user_type_type'","user_type_id='$user_type_id'");
		header('Location: ../../admin.php?page=admin/view/user_types&did=2');
	}
		
	break;
	
	case delete:
	$user_type_id = $_GET['user_type_id'];
	
	$Mysql->delete("user_types","user_type_id ='$user_type_id'");
	header('Location: ../../admin.php?page=admin/view/user_types&did=3');
	break;
	
}
?>