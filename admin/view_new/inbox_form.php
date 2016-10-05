
<?php
$page = $_GET['page'];
$q = mysql_query("select * from contact_questions where id = '".$_GET['id']."'");
$r = mysql_fetch_object($q);
?>

<form name="form1" method="post" enctype="multipart/form-data" action="admin/controller/inbox.php?req=answer&id=<?php echo $_GET['id']; ?>" class="form">
  <table width="800" border="0" cellspacing="0" cellpadding="4">
    <tr>
      <td width="20%">Subject</td>
      <td><input name="subject" type="text" class="field" id="subject" value="<?php echo $r->judul_pesan?>" size="50" readonly="readonly" /></td>
    </tr>
   <tr>
      <td valign="top">Deskripsi</td>
      <td valign="top"><textarea name="pesan" cols="80" rows="5" readonly="readonly" id="pesan"><?php echo $r->pesan?></textarea>
	  
      </td>
    </tr>
     <tr>
      <td valign="top">Jawaban</td>
      <td valign="top"><textarea name="jawaban" id="jawaban" cols="80" rows="5"></textarea>
	  
      </td>
    </tr>
     <tr>
      <td>Nama Pengirim</td>
      <td><input name="nama" type="text" class="field" id="nama" value="<?php echo $r->nama ?>" size="50" readonly="readonly" />
	  
      </td>
    </tr>
     <tr>
      <td>&nbsp;</td>
      <td>
	  
    </td>
    </tr>
   
    <tr>
      <td colspan="2" align="left"><input type="submit" name="button" id="button" value="Simpan" >
     <a href="admin.php?page=admin/view_new/inbox_forward&id=<?php echo $_GET['id']; ?>"> <span class="button">Forward</span></a>
      </td>
    </tr>
   
  </table>
</form>

<br />
