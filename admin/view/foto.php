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
}
?>
<?php
$query_gambar = mysql_query("select gub_photo from config");
$jml = mysql_num_rows($query_gambar);

if($jml > 0){
	$r_gambar = mysql_fetch_object($query_gambar);
}

?>
<?php
$page = $_GET['page'];
?>

<form name="form1" method="post" enctype="multipart/form-data" action="admin/controller/foto.php?req=edit" class="form">
  <table width="100%" border="0" cellspacing="0" cellpadding="2">
    <tr>
      <td width="20%" valign="top">Foto</td>
      <td valign="top"> <img src="<?php echo $r_gambar->gub_photo ?>"  class="img_medium"/><br />
	 
      <input type="file" name="gub_photo" id="gub_photo" /></td>
    </tr>
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

