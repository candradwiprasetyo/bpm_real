<?php
include '../../libraries/config.php';
$req = $_GET['req'];
switch($req){
	case save:
	extract($_POST);
	
	$date = date("Y-m-d H:m:s");
	$ig_type = $_GET['ig_type'];
	
	if($ig_name == "" || $ig_description == ""){
		header("Location: ../../admin.php?page=admin/view/investment_guide&add=1&ig_type=$ig_type&err=1");
	}else{
	$Mysql->save("investment_guides","('','$ig_name','$ig_description','$date','$ig_type','1')");
			header("Location: ../../admin.php?page=admin/view/investment_guide&ig_type=$ig_type&did=1");
	}
	break;
	
	case edit:
	$ig_id = $_GET['ig_id'];
	$ig_type = $_GET['ig_type'];
	extract($_POST);
	
	if($ig_name == "" || $ig_description == ""){
		header("Location: ../../admin.php?page=admin/view/investment_guide&ig_type=$ig_type&ig_id=$ig_id&err=1");
	}else{
		$Mysql->edit("investment_guides","ig_name='$ig_name',
							ig_description = '$ig_description'
							",
					"ig_id='$ig_id'");
					
		
		header("Location: ../../admin.php?page=admin/view/investment_guide&ig_type=$ig_type&did=2");
	}
	break;
	
	case delete:
	$ig_id = $_GET['ig_id'];
	$ig_type = $_GET['ig_type'];
	$query = mysql_query("select * from investment_guide_items where ig_id='$ig_id'");
	while($obj = mysql_fetch_object($query)){
			$fots = $obj->location;
			$path = "img/img_investment_guide/";
			
			if(file_exists("../../".$fots) && ($obj != "" || $obj == $path)){
			unlink("../../".$fots);
			 }
	}
	
	$Mysql->delete("investment_guides","ig_id ='$ig_id'");
	$Mysql->delete("investment_guide_items","ig_id ='$ig_id'");
	header("Location: ../../admin.php?page=admin/view/investment_guide&ig_type=$ig_type&did=3");

	break;
	
	case act:
	$ig_id = $_GET['ig_id'];
	$ig_type = $_GET['ig_type'];
	
		$Mysql->edit("investment_guides","active_status='1'","ig_id='$ig_id'");
		header("Location: ../../admin.php?page=admin/view/investment_guide&ig_type=$ig_type&did=4");
	
		
	break;
	
	case deact:
	$ig_id = $_GET['ig_id'];
	$ig_type = $_GET['ig_type'];
	
		$Mysql->edit("investment_guides","active_status='0'","ig_id='$ig_id'");
		
		header("Location: ../../admin.php?page=admin/view/investment_guide&ig_type=$ig_type&did=5");
	break;
	
}
?>