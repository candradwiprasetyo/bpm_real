
<?php
$page = $_GET['page'];
?>



<br />

<table width="100%" border="0" cellspacing="2" cellpadding="0" class="table">
    <tr>
      <td width="25%" height="30"> Forward ke</td>
      <td width="15%" align="right">&nbsp;</td>
    </tr>
    <?php
	$key="";
	 if($_POST['hidden_key']){
  $key = "where user_name like '%".$_POST['keyword']."%'"; 
  }
    $a = mysql_query("select * from user_types where user_type_id <> 1 and user_type_type = '1'".$key."");
	$i = 1;
	while($b = mysql_fetch_array($a)){
	?>
    <tr <?php if($i%2==1){ ?>class="tr"<?php }else{ ?> class="tr2"<?php } ?>>
      <td height="28"  class="td"><?php echo $b[1] ?></td>
      <td  class="td">
    
     <a href="admin/controller/inbox.php?req=forward&id=<?php echo $_GET['id']?>&user_type_id=<?php echo $b[0] ?>"><div class="add"></div></a>
      
      </td>
    </tr>
   
    <?php
	
	$i++;
	}
	?>
  </table>
