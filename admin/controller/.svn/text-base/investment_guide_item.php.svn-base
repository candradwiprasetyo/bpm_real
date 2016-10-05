<?php
include '../../libraries/config.php';
$req = $_GET['req'];
switch($req){
	case save:
	extract($_POST);
	
	$location = $_FILES['location']['name'];
	$date = date("Y-m-d H:m:s");
	$path = "file/investment_guide/";
	$ig_id = $_GET['ig_id'];
	$date2 = date("YmdHms");
	
	if($name == "" || $description == "" || $location == ""){
		header("Location: ../../admin.php?page=admin/view/investment_guide_item&ig_id=$ig_id&add=1&err=1");
	}else{

	$Mysql->save("investment_guide_items","('','$ig_id','$path$date2$location','$name','$description','$date')");
			if($location != ""){
				move_uploaded_file($_FILES['location']['tmp_name'],"../../".$path.$date2.$_FILES['location']['name']);
				
			}
			header("Location: ../../admin.php?page=admin/view/investment_guide_item&ig_id=$ig_id&did=1");
	}
	
	break;
	
	case edit:
	$igi_id = $_GET['igi_id'];
	$ig_id = $_GET['ig_id'];
	$date2 = date("YmdHms");
	extract($_POST);
	$location = $_FILES['location']['name'];
	$path = "file/investment_guide/";
		
		if($name == "" || $description == "" ){
			header("Location: ../../admin.php?page=admin/view/investment_guide_item&ig_id=$ig_id&igi_id=$igi_id&err=1");
		}else{
		
		if($location != ""){
		
			$query = mysql_query("select * from investment_guide_items where igi_id='$igi_id'");
			$obj = mysql_fetch_object($query);
			$fots = $obj->location;
			
			if(file_exists("../../".$fots) && ($obj != "" || $obj == $path)){
			unlink("../../".$fots);
			 }
			 
			$Mysql->edit("investment_guide_items","name='$name',
							description = '$description',
							location = '$path$date2$location'
							",
					"igi_id='$igi_id'");
					move_uploaded_file($_FILES['location']['tmp_name'],"../../".$path.$date2.$_FILES['location']['name']);
		}else{
			
		$Mysql->edit("investment_guide_items","name='$name',
							description = '$description'
							",
					"igi_id='$igi_id'");
					
		} 
		header("Location: ../../admin.php?page=admin/view/investment_guide_item&ig_id=$ig_id&did=2");
		}
	break;
	
	case delete:
	$igi_id = $_GET['igi_id'];
	$ig_id = $_GET['ig_id'];
	
	$query = mysql_query("select * from investment_guide_items where igi_id='$igi_id'");
			$obj = mysql_fetch_object($query);
			$fots = $obj->location;
			$path = "img/img_investment_guide/";
			
			if(file_exists("../../".$fots) && ($obj != "" || $obj == $path)){
			unlink("../../".$fots);
			 }
	$Mysql->delete("investment_guide_items","igi_id ='$igi_id'");
	header("Location: ../../admin.php?page=admin/view/investment_guide_item&ig_id=$ig_id&did=3");

	break;
	

	
}
?>