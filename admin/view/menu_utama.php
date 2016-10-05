
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
      <td width="25%" height="30">Nama Menu</td>
      <td width="15%" align="right">Config</td>
    </tr>
    <?php
	$key="";
	 if($_POST['search_field']){
  $key = "and name like '%".$_POST['search_field']."%'"; 
  }
    $a = mysql_query("select * from menus where level = '1' and id_menu <> 1".$key." order by id_menu");
	$i = 1;
	while($b = mysql_fetch_array($a)){
	?>
    <tr <?php if($i%2==1){ ?>class="tr" <?php }else{?> class="tr2"<?php } ?>>
      <td height="28"  class="td"><?php echo $b['name'] ?></td>
      <td  class="td">
    
     <a href="admin.php?page=admin/view/menu_utama_form&id_menu=<?php echo $b[0] ?>"><div class="edit"></div></a>
      
      </td>
    </tr>
   
    <?php
	
	$i++;
	}
	?>
  </table>
