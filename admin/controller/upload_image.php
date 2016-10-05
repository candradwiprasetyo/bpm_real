<?php
include '../../libraries/config.php';
$req = $_GET['req'];
switch($req){
	
	
	case edit:
	
	$date2 = date("YmdHms");
	$path = "gallery/image/";
	
	if($_FILES['gallery_image1']['name'] == ""){
		header('Location: ../../admin.php?page=admin/view/upload_image&err=1');
	}else{
		$query_count = mysql_query("SELECT count(*) FROM publication_tmp");
		$row_count = mysql_fetch_row($query_count);

		$jumlah = $row_count[0];
		
		for($i=1; $i<=$jumlah; $i++){
			
			if($_FILES['gallery_image'.$i]['name']){
			
				$gallery_image	= $_FILES['gallery_image'.$i]['name'];
				$date			= date("Y-m-d H:m:s");
				$date2 			= date("Ymd");
				$user_type_id   = $_SESSION['user_type_id'];
					
				$url 		= $user_type_id."_".$date2."_".$gallery_image;
				
				
				mysql_query("insert into gallery values ('','1','$user_type_id','$path$url')");
				move_uploaded_file($_FILES['gallery_image'.$i]['tmp_name'],"../../".$path.$url);
			}
			
			header("Location: ../../admin.php?page=admin/view/upload_image&did=1");
		}
	}
		
		
	break;

	case delete:
	$gallery_id = $_GET['gallery_id'];
	
	$query = mysql_query("select * from gallery where gallery_id='$gallery_id'");
	while($obj = mysql_fetch_object($query)){
			$fots = $obj->gallery_url;
			$path = "gallery/image/";
			
			if(file_exists("../../".$fots)){
			unlink("../../".$fots);
			 }
	}
	
	
	$Mysql->delete("gallery","gallery_id ='$gallery_id'");
	header('Location: ../../admin.php?page=admin/view/upload_image&did=3');
	
	break;
	
}
?>