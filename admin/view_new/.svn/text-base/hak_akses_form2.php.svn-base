
<?php
$page = $_GET['page'];
$q_bidang = mysql_query("select user_type_name from user_types where user_type_id = '".$_GET['user_type_id']."'");
$r_bidang = mysql_fetch_object($q_bidang);
?>

<form name="form1" method="post" enctype="multipart/form-data" action="admin/controller/hak_akses.php?req=edit_city&user_type_id=<?php echo $_GET['user_type_id']; ?>" class="form">
  <table width="800" border="0" cellspacing="0" cellpadding="4">
    <tr>
      <td width="20%">Nama</td>
      <td><input name="user_type_name" type="text" class="field" id="user_type_name" value="<?php echo $r_bidang->user_type_name ?>" readonly="readonly" /></td>
    </tr>
    <?php
    $q_b  = mysql_query("select * from cities order by city_id");
	while($r_b = mysql_fetch_array($q_b)){
		
		$q_c = mysql_query("select * from permissions_city where user_type_id = '".$_GET['user_type_id']."' and city_id = '".$r_b['city_id']."'");
		$jml_c = mysql_num_rows($q_c);
		
    ?>
    <tr>
      <td><?= $r_b['city_name']?></td>
      <td><input type="checkbox" name="c_<?php echo $r_b['city_id']?>" id="c_<?php echo $r_b['city_id']?>" <?php if($jml_c > 0 ){ ?> checked="checked"<?php } ?> value="1" />
	  
      </td>
    </tr>
    <?php
	}
	?>
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

<br />
