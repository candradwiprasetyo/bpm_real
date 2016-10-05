<?php
	function Terbilang($x){
	 	$x = floor($x);  
		  $bil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		  if($x<1&& $x>0){
		 	$que = "nol";
		  }elseif ($x < 12){
			$que = " " . $bil[$x];
		  }elseif ($x < 20){
			$que = Terbilang($x - 10) . " belas";
		  }elseif ($x < 100){
			$que = Terbilang($x / 10) . " puluh" . Terbilang($x % 10);
		  }elseif ($x < 200){
			$que = " seratus" . Terbilang($x - 100);
		  }elseif ($x < 1000){
			$que = Terbilang($x / 100) . " ratus" . Terbilang($x % 100);
		  }elseif ($x < 2000){
			$que = " seribu" . Terbilang($x - 1000);
		  }elseif ($x < 1000000){
			$que = Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000);
		  }elseif ($x < 1000000000){
			$que = Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000);
		  }elseif($x < 1000000000000){
			$b = floor($x/1000000000);
			$c = $x-($b*1000000000);
			$que = Terbilang($x / 1000000000)." milyar ".Terbilang($c);
		  }elseif($x<1000000000000000){
			$b = floor($x/1000000000000);
			$c = $x-($b*1000000000000);
			$que = Terbilang($x / 1000000000000)." Trilyun".Terbilang($c);
		  }
		  return $que;
	}
	function Desimal($x){
		$bil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$real = floor($x);
		$decimal = $x - $real;
		$dec = explode(".",$decimal);
		  $u = $dec[1];
			  if($u<12){
				 $in = $bil[$dec[1]];
			  }elseif($u<100){
				 $o1 = floor($u/10);
				 $o2 = $u%10;
				 $in = $bil[$o1]." ".$bil[$o2];
			  }else{
				  $o1 = substr($u,0,1);
				  $o2 = substr($u,1,1);
				   $in = $bil[$o1]." ".$bil[$o2+1];
			  }
		return $in;
	}
include '../../libraries/config.php';
$Mysql = new Mysql;
$req = $_GET['req'];
switch($req){
	case login:
		$cx = array("<",">","-","%");
		$f = array("","","","");
		$user_username = $_POST['user_username'];
		$user_password = md5($_POST['user_password']);
		$user_username = str_replace($cx,$f,$user_username);
		$user_password =  str_replace($cx,$f,$user_password);
		$que = mysql_query("select * from user where user_username='$user_username' and user_password = '$user_password'");
		$q = mysql_fetch_object($que);
		$r = mysql_num_rows($que);
		
		//$expired = time() + 3600 * 24;
		if($r>0){
			$_SESSION["logon"] = 1;
			$_SESSION["user_id"] = $q->user_id;
			$_SESSION["user_type_id"] = $q->user_type_id;
			$q_type = mysql_query("select user_type_type from user_types where user_type_id = '".$q->user_type_id."'");
			$r_type = mysql_fetch_object($q_type);
			$_SESSION["user_type_type"] = $r_type->user_type_type;
			$_SESSION["user_username"] = $q->user_username;
			//setcookie("login",1,$expired,'/','');
			//setcookie("username",$q->username,$expired,'/','');
			//setcookie("id_librarian",$q->id_librarian,$expired,'/','');
			if($r_type->user_type_type == 0){
				header('Location: ../../admin.php?page=admin/view/news');
			}else if($r_type->user_type_type == 1){
				header('Location:../../admin.php?page=admin/view/news_menu_bidang2');
			}else if($r_type->user_type_type == 2){
				header('Location:../../admin.php?page=admin/view/news_city2');
			}else{
				header('Location:../../admin.php?page=admin/view/news');
			}
		}else{
			$_SESSION["user_username_tmp"] = $user_username;
			$_SESSION["user_password_tmp"] = $_POST['user_password'];
			header('Location: ../../admin.php?err=1');
			
		} 
	break;
	case logout:

		//unset($_SESSION["username_a"]);
		session_destroy();
		header('Location: ../../admin.php');
		
	break;
	
	
	
	case 45:
		
		unset($_SESSION['id_cust']);
		unset($_SESSION['id_kontrak']);
		unset($_SESSION['no_faktur']);
		unset($_SESSION['id_koleksi']);
		unset($_SESSION['id_vendor']);
		unset($_SESSION['dp']);
		unset($_SESSION['harga']);
		unset($_SESSION['kredit']);
		unset($_SESSION['tenor']);
		unset($_SESSION['angsuran']);
		unset($_SESSION['bunga']);
		unset($_SESSION['bunga_rupiah']);
		unset($_SESSION['jumlah']);
		unset($_SESSION['warna']);
		header('Location: ../../admin.php?page=admin/view/contract');
	break;
}
?>