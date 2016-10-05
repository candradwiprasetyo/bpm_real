

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
     <a href="admin_new.php?page=admin/view_new/user&user_id=<?php echo $b[0] ?>"><div class="edit"></div></a>
      
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
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view/user_new&pageno2=1'><div class=\"page_first\"></div></a> ";
   $prevpage = $pageno2-1;
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view/user_new&pageno2=$prevpage'><div class=\"page_prev\"></div> </a>";
} // if

echo "<div class=\"page_page\">  Halaman ke $pageno2 dari $lastpage </div> ";

if ($pageno2 == $lastpage) {
    echo "<div class=\"page_next_non\"> </div>";
   echo "<div class=\"page_last_non\"> </div>";
} else {
   $nextpage = $pageno2+1;
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view/user_new&pageno2=$nextpage'><div class=\"page_next\"></div></a> ";
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view/user_new&pageno2=$lastpage'><div class=\"page_last\"></div></a> ";
} 

?></td>
      <td align="right" style="padding-right:5px;">Jumlah Data : <?php echo $numrows ?></td>
    </tr>
  </table>
</div>
 