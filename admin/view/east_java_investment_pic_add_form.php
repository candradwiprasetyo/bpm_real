<?php
$page = $_GET['page'];
?>
<?php 
if(isset($_GET['err']) && $_GET['err']==1){ 
?>
<div class="err">Isi minimal 1 data</div>
<br />
<?php 
}else if(isset($_GET['did']) && $_GET['did']==1){ 
?>
<div class="did">Simpan berhasil</div>
<br />
<?php 
}else if(isset($_GET['did']) && $_GET['did']==2){ 
?>
<div class="did">Edit berhasil</div>
<br />
<?php 
}else if(isset($_GET['did']) && $_GET['did']==3){ 
?>
<div class="did">Hapus berhasil</div>
<br />
<?php 
}
?>


<form name="form1" method="post" enctype="multipart/form-data" action="admin/controller/east_java_investment_pic.php?req=save_all&publication_id=<?php echo $_GET['publication_id'] ?>" class="form">
  <table width="100%" border="0" cellspacing="0" cellpadding="2">
    <tr>
      <td width="20%">Judul</td>
      <td>Deskripsi</td>
      <td>Foto</td>
    </tr>
    <?php
	$no = 1;
    $q_tmp = mysql_query("select * from publication_tmp");
	while($r_tmp = mysql_fetch_array($q_tmp)){
	?>
      <tr>
      <td width="20%" valign="top"><input name="name<?php echo $no; ?>" type="text" id="name<?php echo $no; ?>" style="width:200px" value="" class="field" /></td>
      <td valign="top"><textarea name="description<?php echo $no; ?>" id="description<?php echo $no; ?>" rows="1" style="font-size:small;" class="area"></textarea></td>
      <td valign="top"><input type="file" name="location<?php echo $no; ?>" id="location<?php echo $no; ?>" /></td>
    </tr>
     <tr>
     <?php
	 $no++;
	}
	 ?>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
    </tr>
    
    <tr>
      <td colspan="3" align="left"><input type="submit" name="button" id="button" value="Simpan" class="button_new" ></td>
    </tr>
   
  </table>
</form>