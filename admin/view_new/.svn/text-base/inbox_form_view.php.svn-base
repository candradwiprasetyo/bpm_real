
<?php
$page = $_GET['page'];
$q = mysql_query("select * from contact_questions where id = '".$_GET['id']."'");
$r = mysql_fetch_object($q);

$q2 = mysql_query("select * from answers where question_id = '".$_GET['id']."'");
$r2 = mysql_fetch_object($q2);

$q3 = mysql_query("select * from user where user_id = '".$r2->user_id."'");
$r3 = mysql_fetch_object($q3);

?>

<form name="form1" method="post" enctype="multipart/form-data" action="admin/controller/inbox.php?req=answer&id=<?php echo $_GET['id']; ?>" class="form">
  <table width="800" border="0" cellspacing="0" cellpadding="4">
    <tr>
      <td width="20%">Sucject</td>
      <td><input name="subject" type="text" class="field" id="subject" value="<?php echo $r->judul_pesan?>" size="50" readonly="readonly" /></td>
    </tr>
   <tr>
      <td valign="top">Deskripsi</td>
      <td valign="top"><textarea name="pesan" cols="80" rows="5" readonly="readonly" id="pesan"><?php echo $r->pesan?></textarea>
	  
      </td>
    </tr>
     <tr>
      <td valign="top">Jawaban</td>
      <td valign="top"><textarea name="jawaban" cols="80" rows="5" readonly="readonly" id="jawaban"><?php echo $r2->answer_description?></textarea>
	  
      </td>
    </tr>
     <tr>
      <td>Nama Pengirim</td>
      <td><input name="nama" type="text" class="field" id="nama" value="<?php echo $r->nama ?>" size="50" readonly="readonly" />
	  
      </td>
    </tr>
     <tr>
      <td>Penjawab</td>
      <td><input name="penjawab" type="text" class="field" id="penjawab" value="<?php echo $r3->user_name ?>" size="50" readonly="readonly" />
	  
      </td>
    </tr>
   
    <tr>
      <td colspan="2" align="left">&nbsp;</td>
    </tr>
   
  </table>
</form>

<br />
