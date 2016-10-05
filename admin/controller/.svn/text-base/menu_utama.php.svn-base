<?php
include '../../libraries/config.php';
$req = $_GET['req'];
switch($req){
	
	
	case edit:
	$id_menu = $_GET['id_menu'];
	
	extract($_POST);
	
		$Mysql->edit("menus","name='$name', content='$rte1'","id_menu='$id_menu'");
		
		
	break;
	
	
}

header('Location: ../../admin.php?page=admin/view/menu_utama&did=2');
?>