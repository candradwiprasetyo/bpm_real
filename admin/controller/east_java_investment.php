<?php
include '../../libraries/config.php';
$req = $_GET['req'];
switch($req){
	case save:
	extract($_POST);
	
	$date = date("Y-m-d H:m:s");
	
	if($publication_title == "" || $publication_description == ""){
		header('Location: ../../admin.php?page=admin/view/east_java_investment&add=1&err=1');
	}else{
	$Mysql->save("publications","('','$publication_title','$publication_description','$date', '1', '1')");
		header('Location: ../../admin.php?page=admin/view/east_java_investment&did=1');
	}
	break;
	
	case edit:
	$publication_id = $_GET['publication_id'];
	
	extract($_POST);
	
	if($publication_title == "" || $publication_description == ""){
		header("Location: ../../admin.php?page=admin/view/east_java_investment&publication_id=$publication_id&err=1");
	}else{
		$Mysql->edit("publications","publication_title='$publication_title',
							publication_description = '$publication_description'
							",
					"publication_id='$publication_id'");
					
		
		header('Location: ../../admin.php?page=admin/view/east_java_investment&did=2');
	}
	break;
	
	case delete:
	$publication_id = $_GET['publication_id'];
	
	$query = mysql_query("select * from publication_pic where publication_id='$publication_id'");
	while($obj = mysql_fetch_object($query)){
			$fots = $obj->location;
			$path = "img/img_publication/";
			
			if(file_exists("../../".$fots) && ($obj != "" || $obj == $path)){
			unlink("../../".$fots);
			 }
	}
	
	$Mysql->delete("publication_pic","publication_id ='$publication_id'");
	$Mysql->delete("publications","publication_id ='$publication_id'");
	header('Location: ../../admin.php?page=admin/view/east_java_investment&did=3');

	break;
	
	case act:
	$publication_id = $_GET['publication_id'];
	
		$Mysql->edit("publications","active_status='1'","publication_id='$publication_id'");
		header('Location: ../../admin.php?page=admin/view/east_java_investment&did=4');
	
		
	break;
	
	case deact:
	$publication_id = $_GET['publication_id'];

		$Mysql->edit("publications","active_status='0'","publication_id='$publication_id'");
		
		header('Location: ../../admin.php?page=admin/view/east_java_investment&did=5');
	break;
	
}
?>