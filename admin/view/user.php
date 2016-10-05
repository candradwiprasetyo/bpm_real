<?php
$page = $_GET['page'];
?>
<?php 
if(isset($_GET['did']) && $_GET['did']==1){ 
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
}else
if(isset($_GET['err']) && $_GET['err']==1){ 
?>
<div class="err">Username sudah ada. Isi dengan Username lain</div>
<br />
<?php 
}else if(isset($_GET['err']) && $_GET['err']==2){ 
?>
<div class="err">Password dan Confirm Password harus sama</div>
<br />
<?php 
}else if(isset($_GET['err']) && $_GET['err']==3){ 
?>
<div class="err">Isi data dengan lengkap</div>
<br />
<?php 
}

?>

<?php
if($_GET['user_id'] || $_GET['add'] == 1){
$q_data = mysql_query("select * from user where user_id = '".$_GET['user_id']."'");
$go = mysql_fetch_object($q_data);
?>


<form name="form1" method="post" enctype="multipart/form-data" action="<?php if($_GET['user_id']){ echo "admin/controller/user.php?req=edit&user_id=$_GET[user_id]"; }else{ echo "admin/controller/user.php?req=save"; } ?>" class="form">
  <table width="100%" border="0" cellspacing="0" cellpadding="2">
    <tr>
      <td width="20%">Nama</td>
      <td><input name="user_name" type="text" id="user_name" value="<?php echo $go->user_name ?>" class="field" /></td>
    </tr>
     <tr>
      <td>Foto</td>
      <td>
	  <?php
	  if($_GET['user_id']){ ?>
      <img src="<?php echo $go->user_img; ?>" height="100" /><br />
	  <?php } ?>
      <input type="file" name="user_img" id="user_img" /></td>
    </tr>
    <tr>
      <td valign="top">Jenis Kelamin</td>
      <td valign="top"> <?php 
	  if($go->user_gender=="P"){
	  ?> 
       <input name="user_gender" type="radio" id="radio" value="L" >
      Laki-laki
      <br />
      <input type="radio" name="user_gender" id="radio2" value="P" checked="checked">
      Perempuan
        <?php }else{ ?>
        <input name="user_gender" type="radio" id="radio" value="L" checked="checked">
      Laki-laki<br>
      <input type="radio" name="user_gender" id="radio2" value="P">
      Perempuan
	  <?php } ?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><input name="user_address" type="text" id="user_address" value="<?php echo $go->user_address ?>" class="field"  /></td>
    </tr>
    <tr>
      <td>Telepon</td>
      <td><input name="user_phone" type="text" id="user_phone" value="<?php echo $go->user_phone ?>" class="field"  /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input name="user_email" type="text" id="user_email" value="<?php echo $go->user_email ?>" class="field"  /></td>
    </tr>
     <tr>
      <td>Hak Akses</td>
      <td><select name="user_type_id" id="user_type_id" class="list">
      <?php
      $quti = mysql_query("select * from user_types order by user_type_id");
	  while($ruti = mysql_fetch_object($quti)){
	  ?>
      
        <option value="<?php echo $ruti->user_type_id ?>" <?php if($go->user_type_id == $ruti->user_type_id){?> selected="selected"  <?php } ?>><?php echo $ruti->user_type_name?></option>
        <?php
	  }
		?>
      </select></td>
    </tr>
    <tr>
      <td>Username</td>
      <td><input name="user_username" type="text" id="user_username" value="<?php echo $go->user_username ?>"  class="field" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input name="user_password" type="password" id="user_password" class="field"  /></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><input name="c_user_password" type="password" id="c_user_password" class="field"  /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
	  
    </td>
    </tr>
     <?php if($_GET['user_id']){ ?>
    <tr>
     <td colspan="2" align="left">
       <table width="100%" border="0" cellspacing="0" cellpadding="4">
         <tr>
           <td width="69%"><input type="submit" name="button" id="button" value="  Edit  " class="button_new" ></td>
           
           <td width="31%">&nbsp;</td>
          </tr>
        </table>
    </tr>
    <?php }else{ ?>
    <tr>
      <td colspan="2" align="left"><input type="submit" name="button" id="button" value="Simpan"  class="button_new">
      <input type="reset" name="button2" id="button2" value="Hapus" ></td>
    </tr>
    <?php } ?>
  </table>
</form>

<br />
<?php
}else{
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
    <tr class="judul">
    <td width="10%" height="30">&nbsp;</td>
      <td width="30%">Nama</td>
      <td width="24%">Alamat</td>
      <td width="15%">Telepon</td>
      <td width="21%" align="center">Config</td>
    </tr>
     <?php
	if (isset($_GET['pageno2'])) {
   $pageno2 = $_GET['pageno2'];
} else {
   $pageno2 = 1;
}

$where = '';

if($_POST['search_field']){
  $where = "where user_name like '%".$_POST['search_field']."%'"; 
  }

$query = "SELECT count(*) FROM user $where order by user_id DESC ";
$result = mysql_query($query);
$query_data = mysql_fetch_row($result);
$numrows = $query_data[0];

$rows_per_page = 10;
$lastpage      = ceil($numrows/$rows_per_page);

$pageno2 = (int)$pageno2;
if ($pageno2 > $lastpage) {
   $pageno2 = $lastpage;
} 
if ($pageno2 < 1) {
   $pageno2 = 1;
} 

$limit = 'LIMIT ' .($pageno2 - 1) * $rows_per_page .',' .$rows_per_page;
$query = "SELECT * FROM user $where order by user_id DESC $limit";
$result = mysql_query($query);
$i = 1;
while($b=mysql_fetch_array($result)){
		
	?>
  

    <tr <?php if($i%2==1){ echo "class='tr'"; }else{ echo "class='tr2'"; } ?> >
      <td height="28" class="td"><img src="<?php echo $b['user_img'] ?>" width="30" height="30" class="tr_img" /></td>
      <td  class="td"><?php echo $b[1] ?></td>
      <td  class="td"><?php echo $b[2] ?></td>
      <td class="td"><?php echo $b[6] ?></td>
      <td  class="td">
      <a href="javascript:void(0)" onclick="confirm_delete(<?php echo $b[0]; ?>,'admin/controller/user.php?req=delete&user_id=')"><div class="trash"></div></a>
     <a href="admin.php?page=admin/view/user&user_id=<?php echo $b[0] ?>"><div class="edit"></div></a>
      
      </td>
    </tr>
   
    <?php
	
	$i++;
	}
	?>
  </table>

<div class="page_kanan">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><?php
if ($pageno2 == 1) {
   echo "<div class=\"page_first_non\"> </div>";
   echo "<div class=\"page_prev_non\"> </div>";
} else {
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view/user&pageno2=1'><div class=\"page_first\"></div></a> ";
   $prevpage = $pageno2-1;
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view/user&pageno2=$prevpage'><div class=\"page_prev\"></div> </a>";
} // if

echo "<div class=\"page_page\">  Halaman ke $pageno2 dari $lastpage </div> ";

if ($pageno2 == $lastpage) {
    echo "<div class=\"page_next_non\"> </div>";
   echo "<div class=\"page_last_non\"> </div>";
} else {
   $nextpage = $pageno2+1;
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view/user&pageno2=$nextpage'><div class=\"page_next\"></div></a> ";
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view/user&pageno2=$lastpage'><div class=\"page_last\"></div></a> ";
} 

?></td>
      <td align="right" style="padding-right:5px;">Jumlah Data : <?php echo $numrows ?></td>
    </tr>
  </table>
</div>
<?php
}
?>
 