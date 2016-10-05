<?php 
if(isset($_GET['did']) && $_GET['did']==1){ 
?>
<div class="did">Simpan berhasil</div>
<br />
<?php
}
?>
<?php
$q_data = mysql_query("select * from user_types");
$go = mysql_fetch_object($q_data);

?>
<?php
$page = $_GET['page'];
?>

<table width="100%" border="0" cellspacing="0" cellpadding="5" class="table">
    <tr class="judul">
    <td width="1%">&nbsp;</td>
      <td width="84%" height="30">Nama </td>
      <td width="15%" align="right">Config</td>
    </tr>
         <?php
	if (isset($_GET['pageno2'])) {
   $pageno2 = $_GET['pageno2'];
} else {
   $pageno2 = 1;
}

$where = '';
if($_POST['search_field']){
  $where = "and user_type_name like '%".$_POST['search_field']."%'"; 
  }

$query = "select count(*) from user_types where user_type_id <> 1 $where order by user_type_id desc";
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
$query = "select * from user_types where user_type_id <> 1 $where order by user_type_id desc";
$result = mysql_query($query);
$i = 1;
while($b=mysql_fetch_array($result)){
		
	?>
   
    <tr <?php if($i%2==1){ ?>class="tr"<?php }else{ ?> class="tr2"<?php } ?>>
     <td>&nbsp;</td>
      <td height="28"  class="td"><?php echo $b[1] ?></td>
      <td  class="td">
    <?php
    if($b['user_type_type'] == 1){
	?>
     <a href="admin.php?page=admin/view/hak_akses_form&user_type_id=<?php echo $b[0] ?>"><div class="edit"></div></a>
      <?php
	}else{
	  ?>
       <a href="admin.php?page=admin/view/hak_akses_form2&user_type_id=<?php echo $b[0] ?>"><div class="edit"></div></a>
      <?php
	}
	  ?>
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
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view/hak_akses&pageno2=1'><div class=\"page_first\"></div></a> ";
   $prevpage = $pageno2-1;
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view/hak_akses&pageno2=$prevpage'><div class=\"page_prev\"></div> </a>";
} // if

echo "<div class=\"page_page\">  Halaman ke $pageno2 dari $lastpage </div> ";

if ($pageno2 == $lastpage) {
    echo "<div class=\"page_next_non\"> </div>";
   echo "<div class=\"page_last_non\"> </div>";
} else {
   $nextpage = $pageno2+1;
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view/hak_akses&pageno2=$nextpage'><div class=\"page_next\"></div></a> ";
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view/hak_akses&pageno2=$lastpage'><div class=\"page_last\"></div></a> ";
} 

?></td>
      <td align="right" style="padding-right:5px;">Jumlah Data : <?php echo $numrows ?></td>
    </tr>
  </table>
</div>
