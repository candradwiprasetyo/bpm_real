<?php
if($_SESSION['user_id']){
$q_data = mysql_query("select * from user where user_id = '".$_SESSION['user_id']."'");
$go = mysql_fetch_object($q_data);
}?>
<?php
$page = $_GET['page'];
?>
<?php
if(isset($_GET['did']) && $_GET['did']==1){ 
?>
<div class="did">Password berhasil diganti</div>
<br />
<?php 
}else if(isset($_GET['err']) && $_GET['err']==1){ 
?>
<div class="err">Isi password dan confirm password</div>
<br />
<?php 
}else if(isset($_GET['err']) && $_GET['err']==2){ 
?>
<div class="err">Password dan Confirm Password harus sama</div>
<br />
<?php 
}

?>


<form name="form1" method="post" enctype="multipart/form-data" action="admin/controller/change_password.php?req=save&user_id=<?php echo $_SESSION['user_id']?>" class="form">
  <table width="800" border="0" cellspacing="0" cellpadding="2">
    <tr>
      <td width="20%">Nama</td>
      <td><input name="user_name" type="text" class="field" id="user_name" value="<?php echo $go->user_name ?>" readonly="readonly" /></td>
    </tr>
    <tr>
      <td>Username</td>
      <td><input name="user_username" type="text"  class="field" id="user_username" value="<?php echo $go->user_username ?>" readonly="readonly" /></td>
    </tr>
    <tr>
      <td>Password Baru</td>
      <td><input name="user_password" type="password" id="user_password" class="field"  /></td>
    </tr>
    <tr>
      <td>Confirm Password Baru</td>
      <td><input name="c_user_password" type="password" id="c_user_password" class="field"  /></td>
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

