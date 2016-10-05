<?php
include '../../libraries/config.php';
$req = $_GET['req'];
switch($req){
/*------ untuk menyimpan data  -------------*/	
	case save:
	extract($_POST);
	$user_id = $_SESSION['user_id'];
	$news_img = $_FILES['img']['name'];
	$date = date("Y-m-d H:m:s");
	$path = "img/menus/";
	
	if($news_img != ""){
		$Mysql->save("news_menu",
					"('','$news_title','$rte1','$date','$user_id','$path$news_img','$i_cat','$i_show')");
		move_uploaded_file($_FILES['img']['tmp_name'],"../../".$path.$_FILES['img']['name']);
	  }else{
		$Mysql->save("news_menu", "('','$news_title','$rte1','$date','$user_id','','$i_cat','$i_show')");
			}
	break;
/*------ untuk mengubah data  -------------*/	
	case edit:
	$news_id = $_GET['news_id'];
	
	extract($_POST);
	$news_img = $_FILES['img']['name'];
	$path = "img/menus/";
	
	$query = mysql_query("select * from news_menu where news_id='$news_id'");
	$obj = mysql_fetch_object($query);
	$fots = $obj->news_img;
	if(file_exists("../../".$fots)){
		unlink("../../".$fots);
		 }
	
	if($news_img != ""){
			$Mysql->edit("news_menu", "news_title='$news_title', news_content ='$rte1', news_img='$path$news_img', 
			             news_cat_id = '$i_cat',active_status = '$i_show' ", 
					     "news_id='$news_id'");
			move_uploaded_file($_FILES['img']['tmp_name'],"../../".$path.$_FILES['img']['name']);
	     }else{
			$Mysql->edit("news_menu","news_title='$news_title', news_content ='$rte1',news_id='$news_id',
			 			  news_cat_id='$i_cat',active_status='$i_show'",
			 		      "news_id='$news_id'");
			}
	break;
/*---------Untuk Delete Data-------------*/
	case delete:
	$news_id = $_GET['news_id'];
	
	$query = mysql_query("select * from news_menu where news_id='$news_id'");
	$obj = mysql_fetch_object($query);
	$fots = $obj->news_img;
	if(file_exists("../../".$fots)){
			unlink("../../".$fots);
	    	}
	$Mysql->delete("news_menu","news_id='$news_id'");
	break;
}

header('Location: ../../admin.php?page=admin/view/menu');
?>