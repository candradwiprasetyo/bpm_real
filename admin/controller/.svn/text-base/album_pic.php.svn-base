<?php
include '../../libraries/config.php';
$req = $_GET['req'];
switch($req){
	case save:
	extract($_POST);
	
	$location = $_FILES['location']['name'];
	$date = date("Y-m-d H:m:s");
	$date2 = date("YmdHms");
	$path = "img/img_album/";
	$album_id = $_GET['album_id'];
	
	if($name == "" || $description == "" || $location == ""){
		header("Location: ../../admin.php?page=admin/view/album_pic&album_id=$album_id&add=1&err=1");
	}else{

	$Mysql->save("album_pic","('','$album_id','$path$date2$location','$name','$description','$date')");
			if($location != ""){
				move_uploaded_file($_FILES['location']['tmp_name'],"../../".$path.$date2.$_FILES['location']['name']);
				
			}
			header("Location: ../../admin.php?page=admin/view/album_pic&album_id=$album_id&did=1");
	}
	
	break;
	
	case edit:
	$pic_id = $_GET['pic_id'];
	$album_id = $_GET['album_id'];
	
	extract($_POST);
	$location = $_FILES['location']['name'];
	$path = "img/img_album/";
	$date = date("Y-m-d H:m:s");
		
		if($name == "" || $description == "" ){
			header("Location: ../../admin.php?page=admin/view/album_pic&album_id=$album_id&pic_id=$pic_id&err=1");
		}else{
		
		if($location != ""){
		
			$query = mysql_query("select * from album_pic where pic_id='$pic_id'");
			$obj = mysql_fetch_object($query);
			$fots = $obj->location;
			
			if(file_exists("../../".$fots) && ($obj != "" || $obj == $path)){
			unlink("../../".$fots);
			 }
			 
			$Mysql->edit("album_pic","name='$name',
							description = '$description',
							location = '$path$date$location'
							",
					"pic_id='$pic_id'");
					move_uploaded_file($_FILES['location']['tmp_name'],"../../".$path.$date.$_FILES['location']['name']);
		}else{
			
		$Mysql->edit("album_pic","name='$name',
							description = '$description'
							",
					"pic_id='$pic_id'");
					
		} 
		header("Location: ../../admin.php?page=admin/view/album_pic&album_id=$album_id&did=2");
		}
	break;
	
	case delete:
	$pic_id = $_GET['pic_id'];
	$album_id = $_GET['album_id'];
	
	$query = mysql_query("select * from album_pic where pic_id='$pic_id'");
			$obj = mysql_fetch_object($query);
			$fots = $obj->location;
			$path = "img/img_album/";
			
			if(file_exists("../../".$fots) && ($obj != "" || $obj == $path)){
			unlink("../../".$fots);
			 }
	$Mysql->delete("album_pic","pic_id ='$pic_id'");
	header("Location: ../../admin.php?page=admin/view/album_pic&album_id=$album_id&did=3");

	break;
	

	
}
?>