<?php
include '../../libraries/config.php';
$req = $_GET['req'];
switch($req){
	
	
	case edit:
	$user_type_id = $_GET['user_type_id'];
	
	$Mysql->delete("permissions","user_type_id ='$user_type_id'");
	
	$q_b  = mysql_query("select * from menus where level = '3' and id_parent = '7' order by id_menu");
	while($r_b = mysql_fetch_array($q_b)){
		if($_POST['c_'.$r_b['id_menu']] == "1"){
			$Mysql->save("permissions",
					"('','$user_type_id', '".$r_b['id_menu']."')");	
		}
	}

	break;
	
	case edit_city:
	$user_type_id = $_GET['user_type_id'];
	
	$Mysql->delete("permissions_city","user_type_id ='$user_type_id'");
	
	$q_b  = mysql_query("select * from cities order by city_id");
	while($r_b = mysql_fetch_array($q_b)){
		if($_POST['c_'.$r_b['city_id']] == "1"){
			$Mysql->save("permissions_city",
					"('','$user_type_id', '".$r_b['city_id']."')");	
		}
	}

	break;
	
	
	
}header('Location: ../../admin.php?page=admin/view/hak_akses&did=1');
?>