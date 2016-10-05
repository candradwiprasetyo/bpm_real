<?php
include '../../libraries/config.php';
# sementara
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'bpm';



$title = $_POST['i_title'];
$deskripsi = $_POST['i_deskripsi'];
$gambar[1] = $_FILES['img1'];
$gambar[2] = $_FILES['img2'];
$gambar[3] = $_FILES['img3'];
$gambar[4] = $_FILES['img4'];
$gambar[5] = $_FILES['img5'];


//fungsi untuk menyimpan data disini
	$album_date = date('Y-m-d'); 
	$id = date('Ymdzhms');
	$query = "INSERT INTO album VALUES('$id','$title','$deskripsi','$album_date')";
	if (mysql_query($query)){
		doupload($gambar, $id);
	}else{
		echo "something error";
		
		//require_once("admin/view/news.php");
	} 
	

// fungsi untuk menyimpan foto ada disini
function doupload($gambar,$id){
	$i = 0;
	$path = "img/img_album/";
	
	for($i=1;$i<=5;$i++){
		if ($gambar[$i] == null){
		// data tidak ada, maka tidak ada aksi disni
		
		}else{
			$gambarku = $path.$gambar[$i]['name'];
			$query = "INSERT album_pic VALUES ('','$id','$gambarku')";
			move_uploaded_file($gambar[$i]['tmp_name'],"../../".$path.$gambar[$i]['name']);
			mysql_query($query);
		}
	}
}

echo mysql_error(mysql_query($query));
echo mysql_errno();
?>