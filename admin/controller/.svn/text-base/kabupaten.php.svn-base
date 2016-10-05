<?php
include '../../libraries/config.php';
$req = $_GET['req'];
switch($req){
	case save:
	extract($_POST);
	
		if($city_name == "" || $city_address == "" || $city_phone == "" || $city_email == ""){
			header('Location: ../../admin.php?page=admin/view/kabupaten&add=1&err=1');
		}else{
		
		$Mysql->save("cities",
					"('','$city_name','$city_address','$city_phone','$city_email')");	
			header('Location: ../../admin.php?page=admin/view/kabupaten&did=1');
		}
	
	
	break;
	
	case edit:
	$city_id = $_GET['city_id'];
	
	extract($_POST);
	if($city_name == "" || $city_address == "" || $city_phone == "" || $city_email == ""){
		header("Location: ../../admin.php?page=admin/view/kabupaten&city_id=$city_id&err=1");
	}else{
		$Mysql->edit("cities","city_name='$city_name', city_address='$city_address', city_phone='$city_phone', city_email ='$city_email'","city_id='$city_id'");
		header("Location: ../../admin.php?page=admin/view/kabupaten&did=2");
	}
		
	break;
	
	case delete:
	$city_id = $_GET['city_id'];
	
	$Mysql->delete("cities","city_id ='$city_id'");
	header('Location: ../../admin.php?page=admin/view/kabupaten&did=3');
	break;
	
}
?>