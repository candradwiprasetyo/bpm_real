<?php
if($_SESSION['user_type_type'] == 0){
	include 'menu_admin.php';
}else if($_SESSION['user_type_type'] == 1){
	include 'menu_bidang.php';
}else{
	include 'menu_kabupaten.php';
}
?>