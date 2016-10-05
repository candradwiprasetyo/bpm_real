<?php
$query_gambar = mysql_query("select background from config");
$jml = mysql_num_rows($query_gambar);

if($jml > 0){
	$r_gambar = mysql_fetch_object($query_gambar);
}

?>
<?php
$page = $_GET['page'];
?>

<form name="form1" method="post" enctype="multipart/form-data" action="admin/controller/background.php?req=edit" class="form">
  <table width="800" border="0" cellspacing="0" cellpadding="2">
    <tr>
      <td width="20%" valign="top">Gambar</td>
      <td valign="top"> <img src="<?php echo $r_gambar->background ?>" height="100" /><br />
	 
      <input type="file" name="background" id="background" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
	  
    </td>
    </tr>
   
    <tr>
      <td colspan="2" align="left"><input type="submit" name="button" id="button" value="Simpan" ></td>
    </tr>
 
  </table>
</form>

