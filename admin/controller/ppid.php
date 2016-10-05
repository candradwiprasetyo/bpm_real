<?php
include '../../libraries/config.php';
$req = $_GET['req'];
switch($req){
	
	case add:
	
		extract($_POST);
	
		$Mysql->save("menus","(
						'',
						'59',
						'2',
						'$name',
						'',
						'$rte1',
						''
					)");
		
		
	break;
	
	case add_child:
		$id_menu = $_GET['id_menu'];
		
		extract($_POST);
	
		$Mysql->save("menus","(
						'',
						'$id_menu',
						'3',
						'$name',
						'',
						'$rte1',
						''
					)");
		
		
	break;
	
	case edit:
	$id_menu = $_GET['id_menu'];
	
	extract($_POST);
	
		$Mysql->edit("menus","name='$name', content='$rte1'","id_menu='$id_menu'");
		
		
	break;
	
	case delete:
	$id = $_GET['id'];
	
	$Mysql->delete("menus","id_menu='$id'");
	
	break;
	
	
}

header('Location: ../../admin.php?page=admin/view/ppid&did=2');
?>