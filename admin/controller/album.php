<?php
include '../../libraries/config.php';
$req = $_GET['req'];
switch($req){
	case save:
	extract($_POST);
	
	$date = date("Y-m-d H:m:s");
	
	if($album_title == "" || $album_description == ""){
		header('Location: ../../admin.php?page=admin/view/album&add=1&err=1');
	}else{
	$Mysql->save("album","('','$album_title','$album_description','$date','1')");
			header('Location: ../../admin.php?page=admin/view/album&did=1');
	}
	break;
	
	case edit:
	$album_id = $_GET['album_id'];
	
	extract($_POST);
	
	if($album_title == "" || $album_description == ""){
		header("Location: ../../admin.php?page=admin/view/album&album_id=$album_id&err=1");
	}else{
		$Mysql->edit("album","album_title='$album_title',
							album_description = '$album_description'
							",
					"album_id='$album_id'");
					
		
		header('Location: ../../admin.php?page=admin/view/album&did=2');
	}
	break;
	
	case delete:
	$album_id = $_GET['album_id'];
	
	$query = mysql_query("select * from album_pic where album_id='$album_id'");
	while($obj = mysql_fetch_object($query)){
			$fots = $obj->location;
			$path = "img/img_album/";
			
			if(file_exists("../../".$fots) && ($obj != "" || $obj == $path)){
			unlink("../../".$fots);
			 }
	}
	
	$Mysql->delete("album","album_id ='$album_id'");
	$Mysql->delete("album_pic","album_id ='$album_id'");
	header('Location: ../../admin.php?page=admin/view/album&did=3');

	break;
	
	case act:
	$album_id = $_GET['album_id'];

	
		$Mysql->edit("album","active_status='1'","album_id='$album_id'");
		header('Location: ../../admin.php?page=admin/view/album&did=4');
	
		
	break;
	
	case deact:
	$album_id = $_GET['album_id'];

		$Mysql->edit("album","active_status='0'","album_id='$album_id'");
		
		header('Location: ../../admin.php?page=admin/view/album&did=5');
	break;
	
}
?>