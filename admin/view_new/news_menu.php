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
 <table width="800" border="0" cellspacing="0" cellpadding="2">
    <tr>
    	<td>KATEGORI</td>
    	<td><select name="i_pmenu" onchange="show_sub(this.value)" class="list" style="width:200px;">
        <option value="0">---</option>
    		<?php $ekcute = mysql_query('Select * FROM menus Where id_parent = 0 and id_menu <> 1 and id_menu <> 30 and id_menu <> 42');
    			
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
    		if ($go->active_status == 1){
    			echo 'checked=""';
    		}
    		 ?>
    		 /></td>
    </tr>
    </tr>
    <tr>
      <td width="20%">Judul</td>
      <td><input name="news_title" type="text" id="news_title" value="<?php echo $go->news_title ?>" class="field" />
      <input name="img_id" type="hidden" class="field" id="img_id" value="<?php echo $go->img_id ?>" size="10" /></td>
    </tr>
     <tr>
      <td>Foto</td>
      <td>
	  <?php
	  if($_GET['news_id']){ ?>
      <img src="<?php echo $go->news_img ?>" height="100" /><br />
	  <?php } ?>
      <input type="file" name="img" id="img" /></td>
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
           <td width="69%"><input type="submit" name="button" id="button" value="  Edit  " ></td>
           
           <td width="31%">&nbsp;</td>
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

<?php
}else{
?>

<table width="100%" border="0" cellspacing="2" cellpadding="0" class="table">
    <tr>
      <td width="6%" height="30">No</td>
      <td width="28%">Kategori</td>
      <td width="26%">Judul</td>
      <td width="13%">Tanggal</td>
      <td width="12%">Photo</td>
      <td width="15%" align="center">Config</td>
    </tr>
       <?php
	if (isset($_GET['pageno2'])) {
   $pageno2 = $_GET['pageno2'];
} else {
   $pageno2 = 1;
}

$query = "select count(*) from news_menu a 
					join menus b on b.id_menu = a.news_cat_id
					where b.level = '2' order by news_id desc";
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
					where b.level = '2' order by news_id desc $limit";
$result = mysql_query($query);
$i = 1;
while($b=mysql_fetch_array($result)){
		$query_category = mysql_query("select * from menus where id_menu = '".$b['news_cat_id']."'");
		$row_category = mysql_fetch_array($query_category);
		
		$query_category2 = mysql_query("select * from menus where id_menu = '".$row_category['id_parent']."'");
		$row_category2 = mysql_fetch_array($query_category2);
		
	?>
	
    
    <tr <?php if($i%2==1){ echo "class='tr'"; }else{ echo "class='tr2'"; } ?>>
      <td height="28" class="td"><?php echo $i ?></td>
       <td height="28" class="td"><p> <strong><?php echo $row_category2['name'] ?></strong></p>- <?php echo $row_category['name'] ?></td>
      <td  class="td"><?php echo $b[1] ?></td>
      <td class="td"><?php echo $b[3] ?></td>
      <td class="td"><img src="<?php echo $b['news_img'] ?>" height="20" /></td>
      <td  class="td">
      <a href="javascript:void(0)" onclick="confirm_delete(<?php echo $b[0]; ?>,'admin/controller/news_menu.php?req=delete&news_id=')"><div class="trash"></div></a>
     <a href="admin.php?page=admin/view_new/news_menu&news_id=<?php echo $b[0] ?>"><div class="edit"></div></a>
      
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
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view_new/news_menu&pageno2=1'><div class=\"page\"> FIRST</div></a> ";
   $prevpage = $pageno2-1;
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view_new/news_menu&pageno2=$prevpage'><div class=\"page\"> PREV</div> </a>";
} // if

echo "<div class=\"page\"> ( Halaman ke $pageno2 dari $lastpage )</div> ";

if ($pageno2 == $lastpage) {
   echo "<div class=\"page\"> NEXT LAST</div> ";
} else {
   $nextpage = $pageno2+1;
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view_new/news_menu&pageno2=$nextpage'><div class=\"page\"> NEXT</div></a> ";
   echo "<a href='{$_SERVER['PHP_SELF']}?page=admin/view_new/news_menu&pageno2=$lastpage'><div class=\"page\"> LAST</div></a> ";
} 

?></div>

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
