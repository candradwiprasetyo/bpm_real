<?php
session_start();
include '../../libraries/config.php';
$req = $_GET['req'];
switch($req){
	case answer:
	$user_id = $_SESSION['user_id'];
	$id = $_GET['id'];
	extract($_POST);
	
	if($rte1 == ""){
		header("Location: ../../admin.php?page=admin/view/inbox_form_bidang&id=$id&err=1");
	}else{
		
			require_once "Mail.php";
		$subject = $subject;
		  $body = $rte1;
		  //mail($to, $subject, $body,$headers);
		  //ganti baris ini dengan email yang dituju
		  $to = $email;
		//ganti dengan emailmu /email resmi website
		  $from = "invest@bpm.jatimprov.go.id";
		  $host = "ssl://mail.bpm.jatimprov.go.id";
		  $port = "465";
		  //emailmu untuk login k gmail
		  $username = "invest@bpm.jatimprov.go.id";
		   
		  //passwordmu waktu login gmail
		  $password = "investorbpm2013";
		 
		$headers = array('From' => $from, 'To' => $to,
		'Subject' => $subject);
		$smtp = Mail::factory('smtp', array('host' => $host,
		 'port' => $port, 'auth' => true,
		 'username' => $username, 'password' => $password));
		 
		  $mail = $smtp -> send($to, $headers, $body);
		 /*
		if (PEAR::isError($mail)) {
		echo("<p> Email Gagal dikirim" . $mail -> getMessage() . "</p>");
		}else{
		echo "Email berhasil di kirim ";
		}
*/
	
		$Mysql->save("answers",
					"('','$id', '$user_id', '$rte1', '".date("Y-m-d H:m:s")."')");	
					
		$Mysql->edit("contact_questions","status='0'","id='$id'");			
	header('Location: ../../admin.php?page=admin/view/inbox_bidang&did=1');
	
}
	
	break;
	
	
}
//header('Location: ../../admin.php?page=admin/view/inbox');
?>