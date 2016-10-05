<?php
include '../../libraries/config.php';
$req = $_GET['req'];
switch($req){
	
	
	case edit:
	$query_gambar = mysql_query("select profile_page, profile_page_name from config");
	$jml = mysql_num_rows($query_gambar);
	
	$rte1 = $_POST['rte1'];
	$profile_page_name = $_POST['profile_page_name'];
	
	if($rte1 == "" || $profile_page_name == ""){
		header('Location: ../../admin.php?page=admin/view/profile&err=1');
	}else{ 
	
	if($jml > 0){
		
		
			$Mysql->edit("config","profile_page = '$rte1', profile_page_name = '$profile_page_name'","config_id='1'");
		
	}else{
		
		$Mysql->save("config", "('1','','','','',','$rte1',''$profile_page_name')");
		
		
	}
	
	header('Location: ../../admin.php?page=admin/view/profile&did=1');

	}
		
		
		
	break;
	
	
	
}?>