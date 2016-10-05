<?php
if($_GET['pic_id']){
$q_data = mysql_query("select * from album_pic where pic_id = '".$_GET['pic_id']."'");
$go = mysql_fetch_object($q_data);
}?>
<?php
$page = $_GET['page'];
?>
<?php 
if(isset($_GET['err']) && $_GET['err']==1){ 
?>
<div class="err">Isi data dengan lengkap dan benar</div>
<br />
<?php 

}

?>


<form name="form1" method="post" enctype="multipart/form-data" action="<?php if($_GET['pic_id']){ echo "admin/controller/album_pic.php?req=edit&album_id=$_GET[album_id]&pic_id=$_GET[pic_id]"; }else{ echo "admin/controller/album_pic.php?req=save&album_id=$_GET[album_id]"; } ?>" class="form">
  <table width="800" border="0" cellspacing="0" cellpadding="2">
    <tr>
      <td width="20%">Judul</td>
      <td><input name="name" type="text" id="name" value="<?php echo $go->name ?>" class="field" /></td>
    </tr>
      <tr>
      <td width="20%" valign="top">Deskripsi</td>
      <td valign="top"><textarea name="description" id="description" cols="45" rows="5" style="font-size:small;"><?php echo $go->description ?></textarea></td>
    </tr>
     <tr>
      <td valign="top">Foto</td>
      <td valign="top">
	  <?php
	  if($_GET['pic_id']){ ?>
      <img src="<?php echo $go->location; ?>" width="300" /><br />
	  <?php } ?>
      <input type="file" name="location" id="location" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
	  
    </td>
    </tr>
     <?php if($_GET['pic_id']){ ?>
    <tr>
     <td colspan="2" align="left">
       <table width="100%" border="0" cellspacing="0" cellpadding="4">
         <tr>
           <td width="69%"><input type="submit" name="button" id="button" value="  Edit  " ></td>
           
           <td width="31%"><?php $p = $_GET['page']; ?><a href="admin.php?page=<?php echo $p ?>&album_id=<?php echo $_GET['album_id']?>"><span class="backtoinput">Back To Input</span></a></td>
          </tr>
        </table>
    </tr>
    <?php }else{ ?>
    <tr>
      <td colspan="2" align="left"><input type="submit" name="button" id="button" value="Simpan" ></td>
    </tr>
    <?php } ?>
  </table>
</form>

<br />

<table width="100%" border="0" cellspacing="2" cellpadding="0" class="table">
    <tr>
      <td width="7%" height="30">No</td>
      <td width="34%">Judul</td>
      <td width="19%">Tanggal</td>
      <td width="8%">Foto</td>
      <td width="21%" align="center">Config</td>
    </tr>
     <?php
	if (isset($_GET['pageno2'])) {
   $pageno2 = $_GET['pageno2'];
} else {
   $pageno2 = 1;
}

$query = "SELECT count(*) FROM album_pic where album_id = '".$_GET['album_id']."' order by pic_id DESC ";
$result = mysql_query($query);
$query_data = mysql_fetch_row($result);
$numrows = $query_data[0];

$rows_per_page = 20;
$lastpage      = ceil($numrows/$rows_per_page);

$pageno2 = (int)$pageno2;
if ($pageno2 > $lastpage) {
   $pageno2 = $lastpage;
} 
if ($pageno2 < 1) {
   $pageno2 = 1;
} 

$limit = 'LIMIT ' .($pageno2 - 1) * $rows_per_page .',' .$rows_per_page;
$query = "SELECT * FROM album_pic where album_id = '".$_GET['album_id']."' order by pic_id DESC $limit";
$result = mysql_query($query);
$i = 1;
while($b=mysql_fetch_array($result)){
		
	?>
  

    <tr <?php if($i%2==1){ echo "class='tr'"; }else{ echo "class='tr2'"; } ?> >
      <td height="28" class="td"><?php echo $i ?></td>
      <td  class="td"><?php echo $b[3] ?></td>
      <td class="td"><?php echo $b[5] ?></td>
      <td class="td"><img src="<?php echo $b['location'] ?>" height="20" /></td>
      <td  class="td">
       
      <a href="javascript:void(0)" onclick="confirm_delete(<?php echo $b[0]; ?>,'admin/controller/album_pic.php?req=delete&album_id=<?php echo $_GET['album_id']?>&pic_id=')"><div class="trash"></div></a>
     <a href="admin.php?page=admin/view_new/album_pic&album_id=<?php echo $_GET['album_id']?>&pic_id=<?php echo $b[0] ?>"><div class="edit"></div></a>
      
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
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view_new/slider&pageno2=1'><div class=\"page\"> FIRST</div></a> ";
   $prevpage = $pageno2-1;
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view_new/slider&pageno2=$prevpage'><div class=\"page\"> PREV</div> </a>";
} // if

echo "<div class=\"page\"> ( Halaman ke $pageno2 dari $lastpage )</div> ";

if ($pageno2 == $lastpage) {
   echo "<div class=\"page\"> NEXT LAST</div> ";
} else {
   $nextpage = $pageno2+1;
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view_new/slider&pageno2=$nextpage'><div class=\"page\"> NEXT</div></a> ";
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view_new/slider&pageno2=$lastpage'><div class=\"page\"> LAST</div></a> ";
} 

?></div>