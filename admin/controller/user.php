<?php
include '../../libraries/config.php';
$req = $_GET['req'];
switch($req){
	case save:
	extract($_POST);
	$lihat = mysql_query("select * from user where user_username='$user_username'");
	$num = mysql_num_rows($lihat);
	$date2 = date("YmdHms");
	
	if($user_name == "" || $user_username == "" || $user_password == "" || $c_user_password == ""){
		header('Location: ../../admin.php?page=admin/view/user&add=1&err=3');
	}else{
	
		if($num > 0){
			header('Location: ../../admin.php?page=admin/view/user&add=1&err=1');
		}else{
		$user_password = md5($_POST['user_password']);
		$c_user_password = md5($_POST['c_user_password']);
		$user_img = $_FILES['user_img']['name'];
		$user_date = date("Y-m-d H:m:s");
		$path = "img/img_user/";
	
			if($_POST['user_password'] == ""){
				header('Location: ../../admin.php?page=admin/view/user&add=1&err=2');
			}else{
			
				if($user_password==$c_user_password){
					$Mysql->save("user",
								"('','$user_name','$user_username','$user_password','$user_gender','$user_address','$user_phone','$user_email','$user_date','$path$date2$user_img', '$user_type_id')");
				if($user_img!=""){
					move_uploaded_file($_FILES['user_img']['tmp_name'],"../../".$path.$date2.$_FILES['user_img']['name']);
					
				}
				header('Location: ../../admin.php?page=admin/view/user&did=1');
				}else{
					header('Location: ../../admin.php?page=admin/view/user&add=1&err=2');
				}
			
			}
		
		}
	}
	break;
	
	case edit:
	$user_id = $_GET['user_id'];
	
	extract($_POST);
	$user_img = $_FILES['user_img']['name'];
	$path = "img/img_user/";
	
	$date2 = date("YmdHms");
	
	if($user_password==$c_user_password){
		
		if($user_password!=""){
		$user_password = md5($user_password);
		$Mysql->edit("user","user_password='$user_password'","user_id='$user_id'");
		}
		
		
		if($user_img!=""){
		
			$query = mysql_query("select * from user where user_id='$user_id'");
			$obj = mysql_fetch_object($query);
			$fots = $obj->user_img;
			
			if(file_exists("../../".$fots)){
			unlink("../../".$fots);
			 }
			 
			$Mysql->edit("user","user_name='$user_name',
							user_username = '$user_username',
							user_gender = '$user_gender',
							user_address = '$user_address',
							user_phone = '$user_phone',
							user_email = '$user_email',
							user_img = '$path$date$user_img',
							user_type_id = '$user_type_id'
							",
					"user_id='$user_id'");
					move_uploaded_file($_FILES['user_img']['tmp_name'],"../../".$path.$date2.$_FILES['user_img']['name']);
		}else{
		$Mysql->edit("user","user_name='$user_name',
							user_username = '$user_username',
							user_gender = '$user_gender',
							user_address = '$user_address',
							user_phone = '$user_phone',
							user_email = '$user_email',
							user_type_id = '$user_type_id'
							",
					"user_id='$user_id'");
					
		} 
	}else{
		
	}
	
		header('Location: ../../admin.php?page=admin/view/user&did=2');
	break;
	
	case delete:
	$user_id = $_GET['user_id'];
	$query = mysql_query("select * from user where user_id='$user_id'");
			$obj = mysql_fetch_object($query);
			$fots = $obj->user_img;
			
			if(file_exists("../../".$fots)){
			unlink("../../".$fots);
			 }
	$Mysql->delete("user","user_id ='$user_id'");
	header('Location: ../../admin.php?page=admin/view/user&did=3');

	break;
}
//header('Location: ../../admin.php?page=admin/view/user');
?>