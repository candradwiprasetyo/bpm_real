<?php
include '../../libraries/config.php';
$req = $_GET['req'];
switch($req){
	case save:
	extract($_POST);
	
	$location = $_FILES['location']['name'];
	$date = date("Y-m-d H:m:s");
	$path = "img/img_publication/";
	$publication_id = $_GET['publication_id'];
	$date2 = date("YmdHms");
	
	if($name == "" || $description == "" || $location == ""){
		header("Location: ../../admin.php?page=admin/view/pamflet_pic&publication_id=$publication_id&add=1&err=1");
	}else{

	$Mysql->save("publication_pic","('','$publication_id','$path$date$location','$name','$description','$date')");
			if($location != ""){
				move_uploaded_file($_FILES['location']['tmp_name'],"../../".$path.$date2.$_FILES['location']['name']);
				
			}
			header("Location: ../../admin.php?page=admin/view/pamflet_pic&publication_id=$publication_id&did=1");
	}
	break;
	
	case edit:
	$pic_id = $_GET['pic_id'];
	$publication_id = $_GET['publication_id'];
	$date2 = date("YmdHms");
	extract($_POST);
	$location = $_FILES['location']['name'];
	$path = "img/img_publication/";
		
		if($name == "" || $description == ""){
			header("Location: ../../admin.php?page=admin/view/pamflet_pic&publication_id=$publication_id&pic_id=$pic_id&err=1");
		}else{
		
		if($location != ""){
		
			$query = mysql_query("select * from publication_pic where pic_id='$pic_id'");
			$obj = mysql_fetch_object($query);
			$fots = $obj->location;
			
			if(file_exists("../../".$fots) && ($obj != "" || $obj == $path)){
			unlink("../../".$fots);
			 }
			 
			$Mysql->edit("publication_pic","name='$name',
							description = '$description',
							location = '$path$date2$location'
							",
					"pic_id='$pic_id'");
					move_uploaded_file($_FILES['location']['tmp_name'],"../../".$path.$date2.$_FILES['location']['name']);
		}else{
			
		$Mysql->edit("publication_pic","name='$name',
							description = '$description'
							",
					"pic_id='$pic_id'");
					
		} 
		header("Location: ../../admin.php?page=admin/view/pamflet_pic&publication_id=$publication_id&did=2");
		}
	break;
	
	case delete:
	$pic_id = $_GET['pic_id'];
	$publication_id = $_GET['publication_id'];
	
	$query = mysql_query("select * from publication_pic where pic_id='$pic_id'");
			$obj = mysql_fetch_object($query);
			$fots = $obj->location;
			$path = "img/img_publication/";
			
			if(file_exists("../../".$fots) && ($obj != "" || $obj == $path)){
			unlink("../../".$fots);
			 }
	$Mysql->delete("publication_pic","pic_id ='$pic_id'");
	header("Location: ../../admin.php?page=admin/view/pamflet_pic&publication_id=$publication_id&did=3");

	break;
	

	
}
?>