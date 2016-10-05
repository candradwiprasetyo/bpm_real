<?php
include 'libraries/edit_lib.php';
?>
<?php
$page = $_GET['page'];
?>
<?php 
if(isset($_GET['err']) && $_GET['err']==1){ 
?>
<div class="err">newsname sudah ada. Isi dengan newsname lain</div>
<br />
<?php 
}
?>

<form name="form1" method="post" enctype="multipart/form-data" action="<?php if($halw[0] !="" && $halw[1]!=""){ echo "admin/controller/news.php?req=edit&$halw[0]=$halw[1]"; }else{ echo "admin/controller/news.php?req=save"; } ?>" class="form">
  <table width="800" border="0" cellspacing="0" cellpadding="2">
    <tr>
      <td width="20%">Judul</td>
      <td><input name="news_title" type="text" id="news_title" value="<?php echo $go->news_title ?>" class="field" />
      <input name="img_id" type="hidden" class="field" id="img_id" value="<?php echo $go->img_id ?>" size="10" /></td>
    </tr>
     <tr>
      <td>Foto</td>
      <td>
	  <?php
	  if($halw[0] !="" && $halw[1]!=""){ ?>
      <img src="img/images.php?img_id=<?php echo $go->img_id; ?>" height="100" /><br />
	  <?php } ?>
      <input type="file" name="img" id="img" /></td>
    </tr>
    <tr>
      <td valign="top">Berita</td>
      <td valign="top"><textarea name="news_content" id="news_content" cols="45" rows="5"><?php echo $go->news_content; ?></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
	  
    </td>
    </tr>
     <?php if($halw[0] !="" && $halw[1]!=""){ ?>
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

<br />

<table width="100%" border="0" cellspacing="2" cellpadding="0" class="table">
    <tr>
      <td width="12%" height="30">ID</td>
      <td width="25%">Judul</td>
      <td width="23%">Berita</td>
      <td width="14%">Tanggal</td>
      <td width="12%">Photo</td>
      <td width="15%" align="center">Config</td>
    </tr>
    <?php
	$key="";
	 if($_POST['hidden_key']){
  $key = "where news_title like '%".$_POST['keyword']."%'"; 
  }
    $a = mysql_query("select * from news ".$key."");
	$i = 1;
	while($b = mysql_fetch_array($a)){
	?>
     <?php
    if($i%2==1){ ?>
    <tr class="tr">
      <td height="28" class="td"><?php echo $b[0] ?></td>
      <td  class="td"><?php echo $b[1] ?></td>
      <td  class="td"><?php echo $b[2] ?></td>
      <td class="td"><?php echo $b[3] ?></td>
      <td class="td"><img src="img/images.php?img_id=<?php echo $b['img_id'] ?>" height="20" /></td>
      <td  class="td">
      <a href="javascript:void(0)" onclick="confirm_delete(<?php echo $b[0]; ?>,'admin/controller/news.php?req=delete&news_id=')"><div class="trash"></div></a>
     <a href="admin.php?page=admin/view_new/news&news_id=<?php echo $b[0] ?>"><div class="edit"></div></a>
      
      </td>
    </tr>
    <?php
	}else{
	?>
    <tr class="tr2">
      <td height="28" class="td"><?php echo $b[0] ?></td>
      <td  class="td"><?php echo $b[1] ?></td>
      <td  class="td"><?php echo $b[2] ?></td>
      <td class="td"><?php echo $b[3] ?></td>
        <td class="td"><img src="img/images.php?id=<?php echo $b['img_id'] ?>" height="20" /></td>
      <td  class="td">
      
       <a href="javascript:void(0)" onclick="confirm_delete(<?php echo $b['news_id']; ?>,'admin/controller/news.php?req=delete&news_id=')"><div class="trash"></div></a>
     <a href="admin.php?page=admin/view_new/news&news_id=<?php echo $b[0] ?>"><div class="edit"></div></a>
      
      
      </td>
    </tr>
    <?php
	}
	$i++;
	}
	?>
  </table>
