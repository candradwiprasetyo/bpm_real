<?php
include '../../libraries/config.php';
# sementara

$title = $_POST['i_title'];
$deskripsi = $_POST['i_deskripsi'];
$gambar[1] = $_FILES['img1'];
$gambar[2] = $_FILES['img2'];
$gambar[3] = $_FILES['img3'];
$gambar[4] = $_FILES['img4'];
$gambar[5] = $_FILES['img5'];
$id_delete  = $_GET['delete'] ;

if ($id_delete <> 0){
	$query = "DELETE FROM slider WHERE id = '$id_delete'";
	mysql_query($query);
}else{
// fungsi untuk menyimpan foto ada disini
	$i = 0;
	$path = "img/img_slider/";
	$date = date('Ymd');
	for($i=1;$i<=5;$i++){
		if ($gambar[$i] == null){
		// data tidak ada, maka tidak ada aksi disni
		
		}else{
			$gambarku = $path.$gambar[$i]['name'];
			$query = "INSERT INTO slider VALUES('','$title','$deskripsi','$gambarku','$date')";
			move_uploaded_file($gambar[$i]['tmp_name'],"../../".$path.$gambar[$i]['name']);
			mysql_query($query);
		}
	}

echo mysql_error(mysql_query($query));
echo mysql_errno();
}
header('Location: ../../admin.php?page=admin/view/slider');
?>