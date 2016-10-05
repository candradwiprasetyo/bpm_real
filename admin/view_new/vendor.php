<?php
include 'lib/edit_lib.php';
?>
<form name="form1" method="post" action="<?php if($halw[0] !="" && $halw[1]!=""){ echo "admin/controller/vendor.php?req=edit&$halw[0]=$halw[1]"; }else{ echo "admin/controller/vendor.php?req=save"; } ?>" class="form">
  <table width="100%" border="0" cellspacing="0" cellpadding="2">
    <tr>
      <td>Vendor</td>
      <td><input name="nama" type="text" class="field" id="nama" value="<?php echo $go->nama ?>"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
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
</form><br>
<table width="100%" border="0" cellspacing="2" cellpadding="0" class="table">
    <tr>
      <td width="46%" height="34">ID Vendor</td>
      <td width="34%">Nama</td>
      <td width="20%">Config</td>
    </tr>
    <?php
	  if($_POST['hidden_key']){
	  $key = "where nama like '%".$_POST['keyword']."%'";
	  }
    $a = mysql_query("select * from vendor ".$key."");
	$i = 1;
	while($b = mysql_fetch_array($a)){
	if($i%2==1){
	?>
    <tr class="tr">
      <td height="28" class="td"><?php echo $b['id_vendor'] ?></td>
      <td class="td"><?php echo $b['nama'] ?></td>
      <td class="td">
      <a href="javascript:void(0)" onclick="confirm_delete(<?php echo $b['id_vendor']; ?>,'admin/controller/vendor.php?req=delete&id_vendor=')"><div class="trash"></div></a>
<a href="admin.php?page=admin/view_new/vendor&id_vendor=<?php echo $b['id_vendor'] ?>"><div class="edit"></div></a>
      
      </td>
    </tr>
    <?php
	}else{
	?>
     <tr class="tr2">
      <td height="28" class="td"><?php echo $b['id_vendor'] ?></td>
      <td class="td"><?php echo $b['nama'] ?></td>
      <td class="td">
      <a href="javascript:void(0)" onclick="confirm_delete(<?php echo $b['id_vendor']; ?>,'admin/controller/vendor.php?req=delete&id_vendor=')"><div class="trash"></div></a>
<a href="admin.php?page=admin/view_new/vendor&id_vendor=<?php echo $b['id_vendor'] ?>"><div class="edit"></div></a>
      </td>
    </tr>
    <?php
	}
	$i++;
	}
	?>
  </table>
