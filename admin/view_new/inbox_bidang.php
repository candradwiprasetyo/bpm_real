
<table width="100%" border="0" cellspacing="2" cellpadding="0" class="table">
    <tr>
      <td width="9%" height="30">No</td>
      <td width="31%">Nama</td>
      <td width="26%" align="left">Judul Pesan</td>
      <td width="13%" align="center">Status</td>
      <td width="21%" align="center">Config</td>
    </tr>
     <?php
	if (isset($_GET['pageno2'])) {
   $pageno2 = $_GET['pageno2'];
} else {
   $pageno2 = 1;
}

$query = "select count(*) from contact_questions a 
						join forwards b on b.question_id = a.id
						where user_type_id = '".$_SESSION['user_type_id']."'
	
	order by tgl desc";
$result = mysql_query($query);
$query_data = mysql_fetch_row($result);
$numrows = $query_data[0];

$rows_per_page = 5;
$lastpage      = ceil($numrows/$rows_per_page);

$pageno2 = (int)$pageno2;
if ($pageno2 > $lastpage) {
   $pageno2 = $lastpage;
} 
if ($pageno2 < 1) {
   $pageno2 = 1;
} 

$limit = 'LIMIT ' .($pageno2 - 1) * $rows_per_page .',' .$rows_per_page;
$query = "select * from contact_questions a 
						join forwards b on b.question_id = a.id
						where user_type_id = '".$_SESSION['user_type_id']."'
	
	order by tgl desc $limit";
$result = mysql_query($query);
$i = 1;
while($b=mysql_fetch_array($result)){
		
	?>
   
  
    <tr  <?php if($i%2==1){ ?>class="tr"<?php }else{ ?> class="tr2"<?php } ?>>
      <td height="28" class="td"><?php echo $i ?></td>
      <td  class="td"><a href="admin.php?page=admin/view_new/inbox_form_view&id=<?php echo $b[0]?>"><?php echo $b['nama'] ?></a></td>
      <td  class="td"><?php echo $b['judul_pesan'] ?></td>
      <td  class="td"><?php echo ($b['status']==1) ? "Belum terjawab" : "Sudah terjawab"; ?></td>
      <td  class="td">
      <?php if($b['status'] == 1){?>
     <a href="admin.php?page=admin/view_new/inbox_form_bidang&id=<?php echo $b[0] ?>"><div class="edit"></div></a>
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
<div class="page_kanan"><?php
if ($pageno2 == 1) {
   echo "<div class=\"page\"> FIRST PREV </div>";
} else {
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view_new/inbox_bidang&pageno2=1'><div class=\"page\"> FIRST</div></a> ";
   $prevpage = $pageno2-1;
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view_new/inbox_bidang&pageno2=$prevpage'><div class=\"page\"> PREV</div> </a>";
} // if

echo "<div class=\"page\"> ( Halaman ke $pageno2 dari $lastpage )</div> ";

if ($pageno2 == $lastpage) {
   echo "<div class=\"page\"> NEXT LAST</div> ";
} else {
   $nextpage = $pageno2+1;
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view_new/inbox_bidang&pageno2=$nextpage'><div class=\"page\"> NEXT</div></a> ";
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view_new/inbox_bidang&pageno2=$lastpage'><div class=\"page\"> LAST</div></a> ";
} 

?></div>