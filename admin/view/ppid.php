
<?php 
if(isset($_GET['did']) && $_GET['did']==2){ 
?>
<div class="did">Edit berhasil</div>
<br />
<?php 
}
?>

<table width="100%" border="0" cellspacing="0" cellpadding="5" class="table">
    <tr class="judul">
      <td width="25%" height="30">Nama</td>
      <td width="15%" align="right">Config</td>
    </tr>
    <?php
	$key="";
	 if($_POST['search_field']){
  $key = "and name like '%".$_POST['search_field']."%'"; 
  }
    $a = mysql_query("select * from menus where level = '2' and id_parent = '59'".$key." order by id_menu");
	$i = 1;
	while($b = mysql_fetch_array($a)){
	?>
    <tr <?php if($i%2==1){ ?>class="tr" <?php }else{?> class="tr2"<?php } ?>>
      <td height="28"  class="td"><?php echo $b['name'] ?></td>
      <td  class="td">
       <a href="javascript:void(0)" onclick="confirm_delete(<?php echo $b[0]; ?>,'admin/controller/ppid.php?req=delete&id=')"><div class="trash"></div></a>
    
     <a href="admin.php?page=admin/view/ppid_form&id_menu=<?php echo $b[0] ?>"><div class="edit"></div></a>
     <a href="admin.php?page=admin/view/ppid_form_add_child&id_menu=<?php echo $b[0] ?>" class="add_child" >Add Child</a>
	 
      </td>
    </tr>
   
    <?php
	
	$q_child =  mysql_query("select * from menus where level = '3' and id_parent = '".$b[0]."'".$key." order by id_menu");
	while($r_child = mysql_fetch_array($q_child)){
	?>
	<tr <?php if($i%2==1){ ?>class="tr" <?php }else{?> class="tr2"<?php } ?>>
      <td height="28"  class="td">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $r_child['name'] ?></td>
      <td  class="td">
       <a href="javascript:void(0)" onclick="confirm_delete(<?php echo $r_child[0]; ?>,'admin/controller/ppid.php?req=delete&id=')"><div class="trash"></div></a>
    
     <a href="admin.php?page=admin/view/ppid_form&id_menu=<?php echo $r_child[0] ?>"><div class="edit"></div></a>
     
      </td>
    </tr>
	<?php
	}
	$i++;
	}
	?>
  </table>
  <div style="clear:both;"></div>
  <br>
  <a href="admin.php?page=admin/view/ppid_form_add" class="button_new" >Add</a>
