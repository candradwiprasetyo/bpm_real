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
		header("Location: ../../admin.php?page=admin/view/inbox_form&id=$id&err=1");
	}
	else{
	
				

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
		header('Location: ../../admin.php?page=admin/view/inbox&did=1');
	}
	break;
	
	case reanswer:
	$user_id = $_SESSION['user_id'];
	$id = $_GET['id'];
	$id_answer = $_GET['id_answer'];

	extract($_POST);
	
	if($rte1 == ""){
		header("Location: ../../admin.php?page=admin/view/inbox_form&id=$id&err=1");
	}
	else{
	
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

		
		$Mysql->save("answers",
					"('','$id', '$user_id', '$rte1', '".date("Y-m-d H:m:s")."')");	
					
		$Mysql->edit("contact_questions","status='0'","id='$id'");		*/	
		$Mysql->edit("answers","answer_description='$rte1'","answer_id='$id_answer'");
		header('Location: ../../admin.php?page=admin/view/inbox&did=1');
	}
	break;
	
	case act:
	$id = $_GET['id'];
	
	
	$query = mysql_query("select status from contact_questions where id = '$id'");
	$row = mysql_fetch_array($query);
	
	if($row['status'] == 1){
		?>
	<script>
	alert("Silahkan jawab pertanyaan terlebih dahulu untuk menampilkan pertanyaan");
	document.location = "../../admin.php?page=admin/view/inbox";
	</script>
	<?php
	}else{
	
	extract($_POST);
	
		$Mysql->edit("contact_questions","active_status='1'","id='$id'");
		header('Location: ../../admin.php?page=admin/view/inbox&did=4');
	}
		
	break;
	
	case deact:
	$id = $_GET['id'];
	
	extract($_POST);
	
		$Mysql->edit("contact_questions","active_status='0'","id='$id'");
		
		header('Location: ../../admin.php?page=admin/view/inbox&did=5');
	break;
	
	case delete:
	$id = $_GET['id'];
	
	$Mysql->delete("contact_questions","id ='$id'");
	$Mysql->delete("forwards","question_id ='$id'");
	$Mysql->delete("answers","question_id ='$id'");
	header('Location: ../../admin.php?page=admin/view/inbox&did=3');
	break;
	
	case forward:
	$id = $_GET['id'];
	$user_type_id = $_GET['user_type_id'];
	
	$cek_query = mysql_query("SELECT count(*) FROM forwards where user_type_id = '$user_type_id' and question_id = '$id'");
	$cek_row = mysql_fetch_row($cek_query);
	
	if($cek_row[0] > 0){
		header('Location: ../../admin.php?page=admin/view/inbox&err=7');
	}else{
	$Mysql->save("forwards",
					"('','$user_type_id', '$id', '')");	
	
		//$Mysql->edit("contact_questions","active_status='0'","id='$id'");
		
		header('Location: ../../admin.php?page=admin/view/inbox&did=6');
	}
	break;
	
}
//header('Location: ../../admin.php?page=admin/view/inbox');
?>