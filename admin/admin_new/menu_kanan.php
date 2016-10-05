<?php
if($_SESSION['user_type_type'] == 0){
	include 'menu_super_admin.php';
}else if($_SESSION['user_type_type'] == 1){
	include 'menu_bidang.php';
}else if($_SESSION['user_type_type'] == 2){
	include 'menu_kabupaten.php';
}else{
	include 'menu_admin.php';
}
?>