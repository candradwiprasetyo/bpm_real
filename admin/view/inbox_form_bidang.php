<?php 
if(isset($_GET['err']) && $_GET['err']==1){ 
?>
<div class="err">Isi jawaban dahulu</div>
<br />
<?php 
}
?>
<?php
$page = $_GET['page'];
$q = mysql_query("select * from contact_questions where id = '".$_GET['id']."'");
$r = mysql_fetch_object($q);
?>
	
<script language="JavaScript" type="text/javascript" src="js/cbrte/html2xhtml.min.js"></script>
<script language="JavaScript" type="text/javascript" src="js/cbrte/richtext_compressed.js"></script>

<form name="RTEDemo" method="post" enctype="multipart/form-data" action="admin/controller/inbox_bidang.php?req=answer&id=<?php echo $_GET['id']; ?>" class="form" onsubmit="return submitForm();">
  <table width="100%" border="0" cellspacing="0" cellpadding="4">
    <tr>
      <td width="20%">Subject</td>
      <td><input name="subject" type="text" class="field" id="subject" value="<?php echo $r->judul_pesan?>" size="50" readonly="readonly" /></td>
    </tr>
   <tr>
      <td valign="top">Deskripsi</td>
      <td valign="top"><textarea name="pesan" cols="80" rows="5" readonly="readonly" id="pesan" class="area" style="width:500px;"><?php echo $r->pesan?></textarea>
	  
      </td>
    </tr>
    
     <tr>
      <td>Nama Pengirim</td>
      <td><input name="nama" type="text" class="field" id="nama" value="<?php echo $r->nama ?>" size="50" readonly="readonly" />
	  
      </td>
    </tr>
	<tr>
      <td>Email Pengirim</td>
      <td><input name="email" type="text" class="field" id="email" value="<?php echo $r->email ?>" size="50" readonly="readonly" />
	  
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
	$content = '';
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
   <table>
    <tr>
      <td colspan="2" align="left"><input type="submit" name="button" id="button" value="Simpan"  class="button_new">
    
      </td>
    </tr>
   
  </table>
</form>

<br />
<?php

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
