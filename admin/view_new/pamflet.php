

<table width="100%" border="0" cellspacing="2" cellpadding="0" class="table">
    <tr>
      <td width="5%" height="30">No</td>
      <td width="31%">Judul</td>
      <td width="18%">Tanggal</td>
      <td width="23%" align="center">Config</td>
    </tr>
     <?php
	if (isset($_GET['pageno2'])) {
   $pageno2 = $_GET['pageno2'];
} else {
   $pageno2 = 1;
}

$query = "SELECT count(*) FROM publications where publication_type = '2' order by publication_date DESC ";
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
$query = "SELECT * FROM publications where publication_type = '2' order by publication_date DESC $limit";
$result = mysql_query($query);
$i = 1;
while($b=mysql_fetch_array($result)){
		
	?>
  

    <tr <?php if($i%2==1){ echo "class='tr'"; }else{ echo "class='tr2'"; } ?> >
      <td height="28" class="td"><?php echo $i ?></td>
      <td  class="td"><?php echo $b[1] ?></td>
      <td class="td"><?php echo $b[3] ?></td>
      <td  class="td">
       
      <a href="javascript:void(0)" onclick="confirm_delete(<?php echo $b[0]; ?>,'admin/controller/pamflet.php?req=delete&publication_id=')"><div class="trash"></div></a>
     <a href="admin.php?page=admin/view_new/pamflet&publication_id=<?php echo $b[0] ?>"><div class="edit"></div></a>
      <a href="admin.php?page=admin/view_new/pamflet_pic&publication_id=<?php echo $b[0] ?>" title="Tambah Foto"><div class="add"></div></a>
   
	  
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
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view_new/pamflet&pageno2=1'><div class=\"page\"> FIRST</div></a> ";
   $prevpage = $pageno2-1;
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view_new/pamflet&pageno2=$prevpage'><div class=\"page\"> PREV</div> </a>";
} // if

echo "<div class=\"page\"> ( Halaman ke $pageno2 dari $lastpage )</div> ";

if ($pageno2 == $lastpage) {
   echo "<div class=\"page\"> NEXT LAST</div> ";
} else {
   $nextpage = $pageno2+1;
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view_new/pamflet&pageno2=$nextpage'><div class=\"page\"> NEXT</div></a> ";
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view_new/pamflet&pageno2=$lastpage'><div class=\"page\"> LAST</div></a> ";
} 

?></div>
<div style="clear:both;">
<br />
<?php 
if(isset($_GET['err']) && $_GET['err']==1){ 
?>
<div class="err">Isi data dengan lengkap dan benar</div>
<br />
<?php 
}else if(isset($_GET['did']) && $_GET['did']==1){ 
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
}
?>
<?php
if($_GET['publication_id']){
$q_data = mysql_query("select * from publications where publication_id = '".$_GET['publication_id']."'");
$go = mysql_fetch_object($q_data);
}?>
<?php
$page = $_GET['page'];
?>



<form name="form1" method="post" enctype="multipart/form-data" action="<?php if($_GET['publication_id']){ echo "admin/controller/pamflet.php?req=edit&publication_id=$_GET[publication_id]"; }else{ echo "admin/controller/pamflet.php?req=save"; } ?>" class="form">
  <table width="800" border="0" cellspacing="0" cellpadding="2">
    <tr>
      <td width="20%">Judul</td>
      <td><input name="publication_title" type="text" id="publication_title" value="<?php echo $go->publication_title ?>" class="field" /></td>
    </tr>
      <tr>
      <td width="20%" valign="top">Deskripsi</td>
      <td valign="top"><textarea name="publication_description" id="publication_description" cols="45" rows="5" style="font-size:small;" class="area"><?php echo $go->publication_description ?></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
	  
    </td>
    </tr>
     <?php if($_GET['publication_id']){ ?>
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
      <td colspan="2" align="left"><input type="submit" name="button" id="button" value="Simpan" >
      <input type="reset" name="button2" id="button2" value="Hapus" ></td>
    </tr>
    <?php } ?>
  </table>
</form>