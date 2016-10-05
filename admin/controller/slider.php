<?php
include '../../libraries/config.php';
$req = $_GET['req'];
switch($req){
	case save:
	extract($_POST);
	
	$location = $_FILES['location']['name'];
	$date = date("Y-m-d H:m:s");
	$path = "img/img_slider/";
	$date2 = date("YmdHms");
	
	if($name == "" || $description == "" || $location == ""){
		header('Location: ../../admin.php?page=admin/view/slider&add=1&err=2');
	}else{

	$Mysql->save("slider","('','$name','$description','$path$date2$location','$date','0')");
			if($location != ""){
				move_uploaded_file($_FILES['location']['tmp_name'],"../../".$path.$date2.$_FILES['location']['name']);
				
			}
			header('Location: ../../admin.php?page=admin/view/slider&did=1');
	}
	break;
	
	case edit:
	$id = $_GET['id'];
	$date2 = date("YmdHms");
	extract($_POST);
	$location = $_FILES['location']['name'];
	$path = "img/img_slider/";
		
		if($name == "" || $description == ""){
			header("Location: ../../admin.php?page=admin/view/slider&id=$id&err=2");
		}else{
		
		if($location != ""){
		
			$query = mysql_query("select * from slider where id='$id'");
			$obj = mysql_fetch_object($query);
			$fots = $obj->location;
			
			if(file_exists("../../".$fots) && ($obj != "" || $obj == $path)){
			unlink("../../".$fots);
			 }
			 
			$Mysql->edit("slider","name='$name',
							description = '$description',
							location = '$path$date2$location'
							",
					"id='$id'");
					move_uploaded_file($_FILES['location']['tmp_name'],"../../".$path.$date2.$_FILES['location']['name']);
		}else{
		$Mysql->edit("slider","name='$name',
							description = '$description'
							",
					"id='$id'");
					
		} 
		header('Location: ../../admin.php?page=admin/view/slider&did=2');
		}
	break;
	
	case delete:
	$id = $_GET['id'];
	$query = mysql_query("select * from slider where id='$id'");
			$obj = mysql_fetch_object($query);
			$fots = $obj->location;
			$path = "img/img_slider/";
			
			if(file_exists("../../".$fots) && ($obj != "" || $obj == $path)){
			unlink("../../".$fots);
			 }
	$Mysql->delete("slider","id ='$id'");
	header('Location: ../../admin.php?page=admin/view/slider&did=3');

	break;
	
	case act:
	$id = $_GET['id'];
	
	
	$query = mysql_query("select *  from slider where active_status = '1'");
	$jml = mysql_num_rows($query);
	
	if($jml >= 7){
		header('Location: ../../admin.php?page=admin/view/slider&err=1');
	}else{

	
		$Mysql->edit("slider","active_status='1'","id='$id'");
		header('Location: ../../admin.php?page=admin/view/slider&did=4');
	}
		
	break;
	
	case deact:
	$id = $_GET['id'];

		$Mysql->edit("slider","active_status='0'","id='$id'");
		
		header('Location: ../../admin.php?page=admin/view/slider&did=5');
	break;
	
}
?>