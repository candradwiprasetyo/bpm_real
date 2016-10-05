<?php
include '../libraries/config.php';
$req = $_GET['req'];
switch($req){
	case save:
	extract($_POST);
	
		$Mysql->save("contact_questions",
					"('','$nama','$email', '$negara', '$judul_pesan', '$pesan','".date("Y-m-d H:m:s")."','1', '0')");	
	
	break;
	
	
	
}
header('Location: ../index.php?page=contact_question&did=1');
?>