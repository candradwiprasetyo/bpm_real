<?php
include '../../libraries/config.php';
$req = $_GET['req'];
switch($req){
	case add:
		$publication_id = $_GET['publication_id'];
		mysql_query("delete from publication_tmp");
		for($i=1; $i<=10; $i++){
			mysql_query("insert into publication_tmp values('$i')");
		}
		header("Location: ../../admin.php?page=admin/view/buku_biru_pic_add_form&publication_id=$publication_id");
	break;
	
	case save_all:
	extract($_POST);
	$location1 = $_FILES['location1']['name'];
	$publication_id = $_GET['publication_id'];
	$path = "img/img_publication/";

	if($name1 == "" || $description1 == "" || $location1 == ""){
		header("Location: ../../admin.php?page=admin/view/buku_biru_pic_add_form&publication_id=$publication_id&add=1&err=1");
	}else{
		$query_count = mysql_query("SELECT count(*) FROM publication_tmp");
		$row_count = mysql_fetch_row($query_count);

		$jumlah = $row_count[0];
		
		for($i=1; $i<=$jumlah; $i++){
			
			if($_POST['name'.$i] && $_POST['description'.$i] && $_FILES['location'.$i]['name']){
			
				$name 			= $_POST['name'.$i];
				$description 	= $_POST['description'.$i];
				$location		= $_FILES['location'.$i]['name'];
				$date			= date("Y-m-d H:m:s");
				$date2 			= date("YmdHms");
				
				mysql_query("insert into publication_pic values ('','$publication_id','$path$date2$location','$name','$description', '$date')");
				move_uploaded_file($_FILES['location'.$i]['tmp_name'],"../../".$path.$date2.$_FILES['location'.$i]['name']);
				
			}
			
			header("Location: ../../admin.php?page=admin/view/buku_biru_pic&publication_id=$publication_id&did=1");
		}
	}
	break;
	
	case save:
	extract($_POST);
	
	$location = $_FILES['location']['name'];
	$date = date("Y-m-d H:m:s");
	$date2 = date("YmdHms");
	$path = "img/img_publication/";
	$publication_id = $_GET['publication_id'];
	
	if($name == "" || $description == "" || $location == ""){
		header("Location: ../../admin.php?page=admin/view/buku_biru_pic&publication_id=$publication_id&add=1&err=1");
	}else{

	$Mysql->save("publication_pic","('','$publication_id','$path$date2$location','$name','$description','$date')");
			if($location != ""){
				move_uploaded_file($_FILES['location']['tmp_name'],"../../".$path.$date2.$_FILES['location']['name']);
				
			}
			header("Location: ../../admin.php?page=admin/view/buku_biru_pic&publication_id=$publication_id&did=1");
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
		header("Location: ../../admin.php?page=admin/view/buku_biru_pic&publication_id=$publication_id&pic_id=$pic_id&err=1");
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
		header("Location: ../../admin.php?page=admin/view/buku_biru_pic&publication_id=$publication_id&did=2");
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
	header("Location: ../../admin.php?page=admin/view/buku_biru_pic&publication_id=$publication_id&did=3");

	break;
	

	
}
?>