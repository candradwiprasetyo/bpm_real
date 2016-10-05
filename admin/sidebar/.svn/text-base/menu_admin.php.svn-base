<script src="js/SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<link href="js/SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />
<div id="CollapsiblePanel1" class="CollapsiblePanel">
  <div class="CollapsiblePanelTab" tabindex="0">Menu dan Berita</div>
  <div class="CollapsiblePanelContent">
  <div id="lpanela">
  	<div class="fpanela" ><a href="admin.php?page=admin/view/menu_utama">Menu Utama</a></div>
	<div class="fpanela" ><a href="admin.php?page=admin/view/news_menu">Menu</a></div>
    <div class="fpanela" ><a href="admin.php?page=admin/view/news_menu_bidang">Berita Bidang</a></div>
    <div class="fpanela" ><a href="admin.php?page=admin/view/news_city">Berita Kabupaten</a></div>
     <div class="fpanela" ><a href="admin.php?page=admin/view/kabupaten">Kabupaten / Kota</a></div>
    <div class="fpanela" ><a href="admin.php?page=admin/view/news">Berita</a></div>
 	<div class="fpanela" ><a href="admin.php?page=admin/view/album">Album</a></div>
 	
    <div class="fpanela" ><a href="admin.php?page=admin/view/application_form">Form Aplikasi</a></div>
<?php
$query_cq = "SELECT count(*) FROM contact_questions where status = '1'";
$result_cq = mysql_query($query_cq);
$query_data_cq = mysql_fetch_row($result_cq);

?>
 	<div class="fpanela" ><a href="admin.php?page=admin/view/inbox">INBOX 
     <?php if($query_data_cq[0] > 0){ ?>
    <span class="inbox_masuk"> <?php echo $query_data_cq[0] ?></span>
    <?php } ?>
    </a></div> 
  
</div> 
  </div>
</div>


<div id="CollapsiblePanel4" class="CollapsiblePanel">
  <div class="CollapsiblePanelTab" tabindex="0">Publikasi</div>
  <div class="CollapsiblePanelContent">
  <div id="lpanela">
 	<div class="fpanela" ><a href="admin.php?page=admin/view/east_java_investment">East Java Investment</a></div>
    <div class="fpanela" ><a href="admin.php?page=admin/view/pamflet">Pamflet</a></div>
     <div class="fpanela" ><a href="admin.php?page=admin/view/brosur">Brosur</a></div>
 
</div> 
  </div>
</div>

<div id="CollapsiblePanel2" class="CollapsiblePanel">
  <div class="CollapsiblePanelTab" tabindex="0">User Management</div>
  <div class="CollapsiblePanelContent">
  <div id="lpanela">
 	<div class="fpanela" ><a href="admin.php?page=admin/view/user">User</a></div>
    <div class="fpanela" ><a href="admin.php?page=admin/view/user_types">Tipe User</a></div>
     <div class="fpanela" ><a href="admin.php?page=admin/view/hak_akses">Hak Akses</a></div>
 <div class="fpanela" ><a href="admin.php?page=admin/view/change_password">Ganti Password</a></div>
</div> 
  </div>
</div>



<div id="CollapsiblePanel3" class="CollapsiblePanel">
  <div class="CollapsiblePanelTab" tabindex="0">Pengaturan</div>
  <div class="CollapsiblePanelContent">
  <div id="lpanela">
 	<div class="fpanela" ><a href="admin.php?page=admin/view/slider">Slider</a></div>
    <div class="fpanela" ><a href="admin.php?page=admin/view/background">Background</a></div>
     <div class="fpanela" ><a href="admin.php?page=admin/view/foto">Foto Banner</a></div>
  <div class="fpanela" ><a href="admin.php?page=admin/view/welcome_page">Welcome Page</a></div>
  <div class="fpanela" ><a href="admin.php?page=admin/view/profile">Profil</a></div>
</div> 
  </div>
</div>

<script type="text/javascript">
var CollapsiblePanel1 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel1");
var CollapsiblePanel2 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel2");
var CollapsiblePanel3 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel3");
var CollapsiblePanel4 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel4");


</script>
