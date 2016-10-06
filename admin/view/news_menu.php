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
if($_GET['news_id'] || $_GET['add'] == 1){
$q_data = mysql_query("select * from news_menu where news_id = '".$_GET['news_id']."'");
$go = mysql_fetch_object($q_data);

?>

<script>
function show_sub(str)
{
	if (str=="")
	{
	document.getElementById("i_smenu").innerHTML="";
	return;
	} 
	if (window.XMLHttpRequest)
	{// kode for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
	}
	else
	{// kode for IE6, IE5
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("i_smenu").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","admin/controller/search_sub_menu.php?id="+str,true);
	xmlhttp.send();
	}
</script>


<?php
$page = $_GET['page'];

?>

	
<script language="JavaScript" type="text/javascript" src="js/cbrte/html2xhtml.min.js"></script>
<script language="JavaScript" type="text/javascript" src="js/cbrte/richtext_compressed.js"></script>
<form name="RTEDemo" method="post" enctype="multipart/form-data" action="<?php if($_GET['news_id']){ echo "admin/controller/news_menu.php?req=edit&news_id=$_GET[news_id]"; }else{ echo "admin/controller/news_menu.php?req=save"; } ?>" class="form" onsubmit="return submitForm();">
 <table width="100%" border="0" cellspacing="0" cellpadding="2">
    <tr>
    	<td>KATEGORI</td>
    	<td><select name="i_pmenu" onchange="show_sub(this.value)" class="list" style="width:200px;">
        <option value="0">---</option>
    		<?php $ekcute = mysql_query('Select * FROM menus Where id_parent = 0 and id_menu <> 1');
    			
				while($datax = mysql_fetch_object($ekcute)){
					?>
				 <option value="<?= $datax->id_menu?>"><?= $datax->name?></option>
			<?	}
    		 ?>
    		 </select>
    		 <select name="i_smenu" id="i_smenu" class="list" style="width:200px;">
    		 	<option value="<?= $go->news_cat_id ?>"></option>
    		 </select></td>
    <tr>
    	<td>Tampilkan</td>
    	<td><input type="checkbox" name="i_show" value="1" id="i_show"
    		<?php
    		if (@$go->active_status == 1){
    			echo 'checked=""';
    		}
    		 ?>
    		 /></td>
    </tr>
   
    <tr>
      <td width="20%">Judul</td>
      <td>
	  <input name="news_title" type="text" id="news_title" value="<?php echo @$go->news_title ?>" class="field" />
      <input name="img_id" type="hidden" class="field" id="img_id" value="<?php echo @$go->img_id ?>" size="10" /></td>
    </tr>
	<tr>
      <td width="20%" valign="top">Deskripsi Index</td>
      <td><textarea name="news_desc_index" id="news_desc_index" cols="45" rows="5" class="area"><?php echo @$go->news_desc_index ?></textarea></td>
  </tr>
     <tr>
      <td>Foto</td>
      <td>
	  <?php
	  if($_GET['news_id']){ ?>
      <img src="<?php echo @$go->news_img ?>" height="100" /><br />
	  <?php } ?>
      <input type="file" name="img" id="img" />
	  <a href="admin/controller/news_menu.php?req=delete_photo&news_id=<?php echo @$_GET[news_id] ?>">Hapus</a>
	  </td>
	  
    </tr>
    
	<tr>
      <td width="20%">Sumber Foto</td>
      <td>
	  <input name="news_img_sumber" type="text" id="news_img_sumber" value="<?php echo @$go->news_img_sumber ?>" class="field" />
	  
     </td>
    </tr>
  <tr>
      <td>&nbsp;</td>
      <td>
    </td>
    </tr>
  </table>
  
<script language="JavaScript" type="text/javascript">
<!--
function submitForm() {
	//make sure hidden and iframe values are in sync for all rtes before submitting form
	updateRTEs();
	
	return true;
}

//Usage: initRTE(imagesPath, includesPath, cssFile, genXHTML, encHTML)
initRTE("js/cbrte/images/", "js/cbrte/", "", true);
//-->
</script>
<noscript><p><b>Javascript must be enabled to use this form.</b></p></noscript>

<script language="JavaScript" type="text/javascript">
<!--
//build new richTextEditor
var rte1 = new richTextEditor('rte1');
<?php
//format content for preloading
if (!(isset($_POST["rte1"]))) {
	$content = $go->news_content;
	$content = rteSafe($content);
} else {
	//retrieve posted value
	$content = rteSafe($_POST["rte1"]);
}
?>
rte1.html = '<?=$content;?>';
//rte1.toggleSrc = false;
rte1.build();
//-->
</script>
<br />

<table width="100%">
   <?php if($_GET['news_id']){ ?>
    <tr>
     <td colspan="2" align="left">
       <table width="100%" border="0" cellspacing="0" cellpadding="4">
         <tr>
           <td width="69%"><input type="submit" name="button" id="button" value="  Edit  "  class="button_new"></td>
           
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
	
	$where2 = '';
if($_POST['category_search_field']){
  	$_SESSION['category_search_field'] = $_POST['category_search_field'];
 // echo $_SESSION['category_search_field'];
}
if($_SESSION['category_search_field']!=99 && $_SESSION['category_search_field']!=""){
	$where2 = "and b.id_parent = '".$_SESSION['category_search_field']."'"; 
}else{
	$where2 = '';
}

?>
<div style="text-align:right;">
<form id="form1" name="form1" method="post" action="">
  <select name="category_search_field" id="category_search_field" class="category_search_field">
  <option value="99">Seluruh Data</option>
 	<?php $query_search_category = mysql_query('Select * FROM menus Where id_parent = 0 and id_menu <> 1 and id_menu <> 30 and id_menu <> 42');
    			
				while($row_search_category = mysql_fetch_object($query_search_category)){
					?>
				 <option value="<?= $row_search_category->id_menu?>" <?php if($row_search_category->id_menu == $_SESSION['category_search_field']){ ?>  selected="selected"<?php }?> ><?= $row_search_category->name?></option>
			<?	}
    		 ?>
  </select>
  <input type="submit" name="button2" id="button2" value="Cari" class="category_search_button" />
</form>
</div>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="2" class="table">
    <tr class="judul">
      <td width="11%" height="30">&nbsp;</td>
      <td width="28%">Kategori</td>
      <td width="24%">Judul</td>
      <td width="20%">Tanggal</td>
      <td width="17%" align="center">Config</td>
    </tr>
       <?php
	if (isset($_GET['pageno2'])) {
   $pageno2 = $_GET['pageno2'];
} else {
   $pageno2 = 1;
}

$where = '';
if($_POST['search_field']){
  $where = "and a.news_title like '%".$_POST['search_field']."%'"; 
}
 
//echo  $_SESSION['category_search_field'];

//echo $where2;

$query = "select count(*) from news_menu a 
					join menus b on b.id_menu = a.news_cat_id
					where b.level = '2' $where $where2 order by news_id desc";
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
$query = "select * from news_menu a 
					join menus b on b.id_menu = a.news_cat_id
					where b.level = '2' $where $where2 order by news_id desc $limit";
$result = mysql_query($query);
$i = 1;
while($b=mysql_fetch_array($result)){
		$query_category = mysql_query("select * from menus where id_menu = '".$b['news_cat_id']."'");
		$row_category = mysql_fetch_array($query_category);
		
		$query_category2 = mysql_query("select * from menus where id_menu = '".$row_category['id_parent']."'");
		$row_category2 = mysql_fetch_array($query_category2);
		
	?>
	
    
    <tr <?php if($i%2==1){ echo "class='tr'"; }else{ echo "class='tr2'"; } ?>>
      <td height="28" class="td"><img src="<?php echo $b['news_img'] ?>" class="tr_img" /></td>
       <td height="28" class="td"> <strong><?php echo $row_category2['name'] ?></strong><br />- <?php echo $row_category['name'] ?></td>
      <td  class="td"><?php echo $b[1] ?></td>
      <td class="td"><?php echo $b['news_date'] ?></td>
      <td  class="td">
      <a href="javascript:void(0)" onclick="confirm_delete(<?php echo $b[0]; ?>,'admin/controller/news_menu.php?req=delete&news_id=')"><div class="trash"></div></a>
     <a href="admin.php?page=admin/view/news_menu&news_id=<?php echo $b[0] ?>"><div class="edit"></div></a>
       <?php if($b['active_status'] == 0){?>
      <a href="admin/controller/news_menu.php?req=act&news_id=<?php echo $b[0] ?>" title="Tampilkan"><div class="act"></div></a>
      <?php
	 }else{
	  ?>
       <a href="admin/controller/news_menu.php?req=deact&news_id=<?php echo $b[0] ?>" title="Tidak ditampilkan"><div class="deact"></div></a>
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
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view/news_menu&pageno2=1'><div class=\"page_first\"></div></a> ";
   $prevpage = $pageno2-1;
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view/news_menu&pageno2=$prevpage'><div class=\"page_prev\"></div> </a>";
} // if

echo "<div class=\"page_page\">  Halaman ke $pageno2 dari $lastpage </div> ";

if ($pageno2 == $lastpage) {
    echo "<div class=\"page_next_non\"> </div>";
   echo "<div class=\"page_last_non\"> </div>";
} else {
   $nextpage = $pageno2+1;
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view/news_menu&pageno2=$nextpage'><div class=\"page_next\"></div></a> ";
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view/news_menu&pageno2=$lastpage'><div class=\"page_last\"></div></a> ";
} 

?></td>
      <td align="right" style="padding-right:5px;">Jumlah Data : <?php echo $numrows ?></td>
    </tr>
  </table>
</div>

<?php
}
function rteSafe($strText) {
	//returns safe code for preloading in the RTE
	$tmpString = $strText;
	
	//convert all types of single quotes
	$tmpString = str_replace(chr(145), chr(39), $tmpString);
	$tmpString = str_replace(chr(146), chr(39), $tmpString);
	$tmpString = str_replace("'", "&#39;", $tmpString);
	
	//convert all types of double quotes
	$tmpString = str_replace(chr(147), chr(34), $tmpString);
	$tmpString = str_replace(chr(148), chr(34), $tmpString);
//	$tmpString = str_replace("\"", "\"", $tmpString);
	
	//replace carriage returns & line feeds
	$tmpString = str_replace(chr(10), " ", $tmpString);
	$tmpString = str_replace(chr(13), " ", $tmpString);
	
	return $tmpString;
}
?>
