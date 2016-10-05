
<?php
$page = $_GET['page'];
?>
<?php 
if(isset($_GET['err']) && $_GET['err']==1){ 
?>
<div class="err">Username sudah ada. Isi dengan Username lain</div>
<br />
<?php 
}
?>

<form name="form1" method="post" enctype="multipart/form-data" action="<?php if($halw[0] !="" && $halw[1]!=""){ echo "admin/controller/admin.php?req=edit&$halw[0]=$halw[1]"; }else{ echo "admin/controller/admin.php?req=save"; } ?>" class="form">
  <table width="800" border="0" cellspacing="0" cellpadding="2">
    <tr>
      <td width="20%">Name</td>
      <td><input name="nama" type="text" id="nama" value="<?php echo $go->nama ?>" class="field" /></td>
    </tr>
     <tr>
      <td>Photo</td>
      <td>
	  <?php
	  if($halw[0] !="" && $halw[1]!=""){ ?>
      <img src="img/img_admin.php?id=<?php echo $go->id_admin; ?>" height="100" /><br />
	  <?php } ?>
      <input type="file" name="photo" id="photo" /></td>
    </tr>
    <tr>
      <td valign="top">Sex</td>
      <td valign="top"> <?php 
	  if($go->sex=="P"){
	  ?> 
       <input name="sex" type="radio" id="radio" value="L" >
      Laki-laki
      <br />
      <input type="radio" name="sex" id="radio2" value="P" checked="checked">
      Perempuan
        <?php }else{ ?>
        <input name="sex" type="radio" id="radio" value="L" checked="checked">
      Laki-laki<br>
      <input type="radio" name="sex" id="radio2" value="P">
      Perempuan
	  <?php } ?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><input name="address" type="text" id="address" value="<?php echo $go->address ?>" class="field"  /></td>
    </tr>
    <tr>
      <td>Phone</td>
      <td><input name="phone" type="text" id="phone" value="<?php echo $go->phone ?>" class="field"  /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input name="email" type="text" id="email" value="<?php echo $go->email ?>" class="field"  /></td>
    </tr>
    <tr>
      <td>Username</td>
      <td><input name="username" type="text" id="username" value="<?= $go->username ?>"  class="field" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input name="password" type="password" id="password" class="field"  /></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><input name="c_password" type="password" id="c_password" class="field"  /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
	  
    </td>
    </tr>
     <?php if($halw[0] !="" && $halw[1]!=""){ ?>
    <tr>
     <td colspan="2" align="left">
       <table width="100%" border="0" cellspacing="0" cellpadding="4">
         <tr>
           <td width="69%"><input type="submit" name="button" id="button" value="  Edit  " ></td>
           
           <td width="31%"><?php $p = $_GET['page']; ?><a href="admin.php?page=<?php echo $p ?>"><span class="backtoinput">Back To Input</span></a></td>
          </tr>
        </table>
    </tr>
    <?php }else{ ?>
    <tr>
      <td colspan="2" align="left"><input type="submit" name="button" id="button" value="Submit" >
      <input type="reset" name="button2" id="button2" value="Reset" ></td>
    </tr>
    <?php } ?>
  </table>
</form>

<br />

<table width="100%" border="0" cellspacing="2" cellpadding="0" class="table">
    <tr>
      <td width="12%" height="30">ID Admin</td>
      <td width="25%">Name</td>
      <td width="23%">Address</td>
      <td width="14%">Phone</td>
      <td width="12%">Photo</td>
      <td width="15%" align="center">Config</td>
    </tr>
    <?php
	$key="";
	 if($_POST['hidden_key']){
  $key = "where nama like '%".$_POST['keyword']."%'"; 
  }
    $a = mysql_query("select * from admin ".$key."");
	$i = 1;
	while($b = mysql_fetch_array($a)){
	?>
     <?php
    if($i%2==1){ ?>
    <tr class="tr">
      <td height="28" class="td"><?php echo $b['id_admin'] ?></td>
      <td  class="td"><?php echo $b[1] ?></td>
      <td  class="td"><?php echo $b['address'] ?></td>
      <td class="td"><?php echo $b['phone'] ?></td>
      <td class="td"><img src="img/img_admin.php?id=<?php echo $b['id_admin'] ?>" height="20" /></td>
      <td  class="td">
      <a href="javascript:void(0)" onclick="confirm_delete(<?php echo $b['id_admin']; ?>,'admin/controller/admin.php?req=delete&id_admin=')"><div class="trash"></div></a>
     <a href="admin.php?page=admin/view_new/admin&id_admin=<?php echo $b['id_admin'] ?>"><div class="edit"></div></a>
      
      </td>
    </tr>
    <?php
	}else{
	?>
    <tr class="tr2">
      <td height="28" class="td"><?php echo $b['id_admin'] ?></td>
      <td  class="td"><?php echo $b['nama'] ?></td>
      <td  class="td"><?php echo $b['address'] ?></td>
      <td class="td"><?php echo $b['phone'] ?></td>
        <td class="td"><img src="img/img_admin.php?id=<?php echo $b['id_admin'] ?>" height="20" /></td>
      <td  class="td">
      
       <a href="javascript:void(0)" onclick="confirm_delete(<?php echo $b['id_admin']; ?>,'admin/controller/admin.php?req=delete&id_admin=')"><div class="trash"></div></a>
     <a href="admin.php?page=admin/view_new/admin&id_admin=<?php echo $b['id_admin'] ?>"><div class="edit"></div></a>
      
      
      </td>
    </tr>
    <?php
	}
	$i++;
	}
	?>
  </table>
