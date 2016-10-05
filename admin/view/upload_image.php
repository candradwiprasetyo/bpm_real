<script type="text/javascript" src="js/zoom/fancybox/zoom.js"></script>
	<script>
		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>
	<script type="text/javascript" src="js/zoom/fancybox/zoom2.js"></script>
	<script type="text/javascript" src="js/zoom/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="js/zoom/fancybox/jquery.fancybox-1.3.4.css" media="screen" />


<?php 
if(isset($_GET['err']) && $_GET['err']==1){ 
?>
<div class="err">Isi Gambar dahulu</div>
<br />
<?php 
}else if(isset($_GET['did']) && $_GET['did']==1){ 
?>
<div class="did">Simpan berhasil</div>
<br />
<?php 
}else if(isset($_GET['did']) && $_GET['did']==3){ 
?>
<div class="did">Hapus berhasil</div>
<br />
<?php 
}
?>

<form name="form1" method="post" enctype="multipart/form-data" action="admin/controller/upload_image.php?req=edit" class="form">
  <table width="100%" border="0" cellspacing="0" cellpadding="2">
   <?php
	$no = 1;
    $q_tmp = mysql_query("select * from publication_tmp");
	while($r_tmp = mysql_fetch_array($q_tmp)){
	?>
    <tr>
      <td width="20%" valign="top">Foto</td>
      <td valign="top">
      <input type="file" name="gallery_image<?php echo $no; ?>" id="gallery_image<?php echo $no; ?>" /></td>
    </tr>
    <?php
	 $no++;
	}
	 ?>
    <tr>
      <td>&nbsp;</td>
      <td>
	  
    </td>
    </tr>
   <tr>
      <td colspan="2" align="left"><input type="submit" name="button" id="button" value="Simpan" class="button_new" ></td>
    </tr>
 
  </table>
</form>
<br /><br />
<table width="100%" border="0" cellspacing="0" cellpadding="2" class="table">
    <tr class="judul"> 
      <td width="1%" height="30">&nbsp;</td>
      <td width="25%">Gambar</td>
      <td width="74%">Location</td>
<td>Config</td>
     
    </tr>
     <?php
	if (isset($_GET['pageno2'])) {
   $pageno2 = $_GET['pageno2'];
} else {
   $pageno2 = 1;
}

$where = '';
if($_POST['search_field']){
  $where = "and b.user_type_name like '%".$_POST['search_field']."%'"; 
  }

$query = "SELECT count(*) FROM gallery a
			join user_types b on b.user_type_id = a.gallery_user_type
 where gallery_type = '1' $where order by gallery_id DESC ";
 //echo $query;
$result = mysql_query($query);
$query_data = mysql_fetch_row($result);
$numrows = $query_data[0];

$rows_per_page = 30;
$lastpage      = ceil($numrows/$rows_per_page);

$pageno2 = (int)$pageno2;
if ($pageno2 > $lastpage) {
   $pageno2 = $lastpage;
} 
if ($pageno2 < 1) {
   $pageno2 = 1;
} 

$limit = 'LIMIT ' .($pageno2 - 1) * $rows_per_page .',' .$rows_per_page;
$query = "SELECT * FROM gallery a
			join user_types b on b.user_type_id = a.gallery_user_type
 where gallery_type = '1' $where order by gallery_id DESC ";
$result = mysql_query($query);
$i = 1;
while($b=mysql_fetch_array($result)){
		
	?>

  
   <tr <?php if($i%2==1){ echo "class='tr'"; }else{ echo "class='tr2'"; } ?> >
      <td height="28" class="td"></td>
   
      <td  class="td">
       <a href="<?php echo $b['gallery_url']?>" id="example2">
     <img src="<?php echo $b['gallery_url']	?>" class="tr_img_medium" />
      </a>
      </td>
      <td>   <?php echo "http://".$_SERVER['SERVER_NAME']."/bpm/".$b['gallery_url']?> </td>
	 <td  class="td">
       
      <a href="javascript:void(0)" onclick="confirm_delete(<?php echo $b[0]; ?>,'admin/controller/upload_image.php?req=delete&gallery_id=')"><div class="trash"></div></a>
    
      
      </td>
    </tr>

    <?php
	
	$i++;
	}
	?>
    </table>
<div style="clear:both"></div>
<div class="page_kanan">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><?php
if ($pageno2 == 1) {
   echo "<div class=\"page_first_non\"> </div>";
   echo "<div class=\"page_prev_non\"> </div>";
} else {
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view/upload_image&pageno2=1'><div class=\"page_first\"></div></a> ";
   $prevpage = $pageno2-1;
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view/upload_image&pageno2=$prevpage'><div class=\"page_prev\"></div> </a>";
} // if

echo "<div class=\"page_page\">  Halaman ke $pageno2 dari $lastpage </div> ";

if ($pageno2 == $lastpage) {
    echo "<div class=\"page_next_non\"> </div>";
   echo "<div class=\"page_last_non\"> </div>";
} else {
   $nextpage = $pageno2+1;
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view/upload_image&pageno2=$nextpage'><div class=\"page_next\"></div></a> ";
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view/upload_image&pageno2=$lastpage'><div class=\"page_last\"></div></a> ";
} 

?></td>
      <td align="right" style="padding-right:5px;">Jumlah Data : <?php echo $numrows ?></td>
    </tr>
  </table>
</div>
