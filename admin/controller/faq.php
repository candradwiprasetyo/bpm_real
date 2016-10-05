<?php
include '../../libraries/config.php';
$req = $_GET['req'];
switch($req){
	
	
	case edit:
	$rte1 = $_POST['rte1'];
	$name = $_POST['name'];
	
	if($rte1 == "" || $name == ""){
		header('Location: ../../admin.php?page=admin/view/faq&err=1');
	}else{ 
	
	
			$Mysql->edit("menus","content = '$rte1', name = '$name'","id_menu='41'");
		
	
	header('Location: ../../admin.php?page=admin/view/faq&did=1');

	}
		
		
		
	break;
	
	
	
}?>