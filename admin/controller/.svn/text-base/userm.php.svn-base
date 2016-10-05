<?
include '../../libraries/config.php';

extract($_POST);
$id = $_GET['id']; # buat edit
$delete = $_GET['delete']; # buat delete

	if($id){
		$query="";
		echo "id";
	}elseif($delete){
		$query = "DELETE FROM user Where user_id = '$delete'";
		mysql_query($query);
		echo "end";
	}else{
		$password = md5($i_pass);
		$date = date('Ymd');
		$query = "INSERT INTO user VALUES(NULL,'$i_nama','$i_uname','$password','$i_jk','$i_address','$i_hp','$i_email','$date','1','$i_group')";
		mysql_query($query);
		echo "off";
	}

echo "file";
  echo mysql_error();
  echo mysql_errno();
//header('Location: ../../admin.php?page=admin/view/userm');
?>