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
}else if(isset($_GET['did']) && $_GET['did']==4){ 
?>
<div class="did">Data ditampilkan</div>
<br />
<?php 
}else if(isset($_GET['did']) && $_GET['did']==5){ 
?>
<div class="did">Data tidak ditampilkan</div>
<br />
<?php 
}
?>

<?php
if($_GET['af_id'] || $_GET['add'] == 1){
$q_data = mysql_query("select * from application_forms where af_id = '".$_GET['af_id']."'");
$go = mysql_fetch_object($q_data);

?>
<?php
$page = $_GET['page'];
?>

<form name="form1" method="post" enctype="multipart/form-data" action="<?php if($_GET['af_id']){ echo "admin/controller/application_form.php?req=edit&af_id=$_GET[af_id]"; }else{ echo "admin/controller/application_form.php?req=save"; } ?>" class="form">
  <table width="100%" border="0" cellspacing="0" cellpadding="2">
    <tr>
      <td width="20%">Nama</td>
      <td><input name="af_name" type="text" id="af_name" value="<?php echo $go->af_name ?>" class="field" /></td>
    </tr>
     <tr>
      <td width="20%" valign="top">Deskripsi</td>
      <td valign="top"><textarea name="af_description" id="af_description" cols="45" rows="5" class="area"><?php echo $go->af_description ?></textarea></td>
    </tr>
     <tr>
      <td width="20%">File</td>
      <td>
      <?php
      if($_GET['af_id']){
	  ?>
      <a href="<?php echo $go->af_file ?>">Download</a>
      <?php
	  }
	  ?>
      <input type="file" name="af_file" id="af_file" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
	  
    </td>
    </tr>
     <?php if($_GET['af_id']){ ?>
    <tr>
     <td colspan="2" align="left">
       <table width="100%" border="0" cellspacing="0" cellpadding="4">
         <tr>
           <td width="69%"><input type="submit" name="button" id="button" value="  Edit  " class="button_new" ></td>
           
           <td width="31%">&nbsp;</td>
          </tr>
        </table>
    </tr>
    <?php }else{ ?>
    <tr>
      <td colspan="2" align="left"><input type="submit" name="button" id="button" value="Simpan" class="button_new" ></td>
    </tr>
    <?php } ?>
  </table>
</form>

<br />
<?php
}else{
?>
<table width="100%" border="0" cellspacing="0" cellpadding="5" class="table">
    <tr class="judul">
      <td width="6%" height="30">No</td>
      <td width="24%">Nama</td>
      <td width="18%" align="left">Tanggal</td>
      <td width="15%" align="left">File</td>
      <td width="16%" align="center">Config</td>
    </tr>
    
    <?php
	if (isset($_GET['pageno2'])) {
   $pageno2 = $_GET['pageno2'];
} else {
   $pageno2 = 1;
}

$where = '';
if($_POST['search_field']){
  $where = "where af_name like '%".$_POST['search_field']."%'"; 
  }

$query = "SELECT count(*) FROM application_forms $where order by af_id DESC ";
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
$query = "SELECT * FROM application_forms $where order by af_id DESC $limit";
$result = mysql_query($query);
$i = 1;
while($b=mysql_fetch_array($result)){

	?>
    
    <tr  <?php if($i%2==1){ ?>class="tr" <?php }else{ ?>class="tr2"<?php } ?>>
      <td height="28" class="td"><?php echo $i ?></td>
      <td  class="td"><?php echo $b[1] ?></td>
      <td  class="td"><?php echo $b[3] ?></td>
      <td  class="td"><a href="<?php echo $b[4] ?>">Download</a> </td>
      <td  class="td">   <a href="javascript:void(0)" onclick="confirm_delete(<?php echo $b[0]; ?>,'admin/controller/application_form.php?req=delete&af_id=')"><div class="trash"></div></a>
     <a href="admin.php?page=admin/view/application_form&af_id=<?php echo $b[0] ?>"><div class="edit"></div></a>
      <?php if($b['active_status'] == 0){?>
      <a href="admin/controller/application_form.php?req=act&af_id=<?php echo $b[0] ?>" title="Tampilkan"><div class="act"></div></a>
      <?php
	 }else{
	  ?>
       <a href="admin/controller/application_form.php?req=deact&af_id=<?php echo $b[0] ?>" title="Tidak ditampilkan"><div class="deact"></div></a>
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
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view/application_form&pageno2=1'><div class=\"page_first\"></div></a> ";
   $prevpage = $pageno2-1;
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view/application_form&pageno2=$prevpage'><div class=\"page_prev\"></div> </a>";
} // if

echo "<div class=\"page_page\">  Halaman ke $pageno2 dari $lastpage </div> ";

if ($pageno2 == $lastpage) {
    echo "<div class=\"page_next_non\"> </div>";
   echo "<div class=\"page_last_non\"> </div>";
} else {
   $nextpage = $pageno2+1;
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view/application_form&pageno2=$nextpage'><div class=\"page_next\"></div></a> ";
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view/application_form&pageno2=$lastpage'><div class=\"page_last\"></div></a> ";
} 

?></td>
      <td align="right" style="padding-right:5px;">Jumlah Data : <?php echo $numrows ?></td>
    </tr>
  </table>
</div>
<?php
}
?>