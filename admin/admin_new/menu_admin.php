
<div class="menu_kanan_atas">
</div>
<div class="menu_kanan">


  <div id="Accordion1" class="Accordion" tabindex="0">
    <div class="AccordionPanel">
      <div class="AccordionPanelTab">Menu dan Berita</div>
      <div class="AccordionPanelContent">
<a href="admin.php?page=admin/view/news" style="text-decoration:none;"><div class="fpanela" >Beranda</div></a>      
  <a href="admin.php?page=admin/view/menu_utama" style="text-decoration:none;">
 

  <div class="fpanela" > <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Menu Utama</td>
    <td align="right" style="padding-right:5px;"></td>
  </tr>
</table></div>
  </a>
	<a href="admin.php?page=admin/view/news_menu" style="text-decoration:none;"><div class="fpanela" >Menu</div></a>
    <a href="admin.php?page=admin/view/news_menu_bidang" style="text-decoration:none;"><div class="fpanela" >Berita Bidang</div></a>
    <a href="admin.php?page=admin/view/news_city" style="text-decoration:none;"><div class="fpanela" >Berita Kabupaten</div></a>
     <a href="admin.php?page=admin/view/kabupaten" style="text-decoration:none;"><div class="fpanela" >Kabupaten / Kota</div></a>
    <!-- <a href="admin.php?page=admin/view/ppid" style="text-decoration:none;"><div class="fpanela" >PPID</div></a> -->
    
 	<a href="admin.php?page=admin/view/album" style="text-decoration:none;"><div class="fpanela" >Album</div></a>
 	
    <?php /*<a href="admin.php?page=admin/view/application_form" style="text-decoration:none;"><div class="fpanela" >Form Aplikasi</div></a>
*/?>

<?php
$query_cq = "SELECT count(*) FROM contact_questions where status = '1'";
$result_cq = mysql_query($query_cq);
$query_data_cq = mysql_fetch_row($result_cq);

?>
 	<a href="admin.php?page=admin/view/inbox" style="text-decoration:none;"><div class="fpanela" >
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>INBOX </td>
    <td align="right" style="padding-right:5px;">
     <?php if($query_data_cq[0] > 0){ ?>
    <span class="inbox_masuk"> <?php echo $query_data_cq[0] ?></span>
    <?php } ?></td>
  </tr>
</table>
    
    
    </div> </a>
      
  <a href="admin.php?page=admin/view/one_stop_service" style="text-decoration:none;"><div class="fpanela" >One Stop Service</div></a>
       <a href="admin.php?page=admin/view/faq" style="text-decoration:none;"><div class="fpanela" >FAQ</div></a>
  		<? /*<a href="admin.php?page=admin/view/peraturan_terkait" style="text-decoration:none;"><div class="fpanela" >Peraturan Terkait</div></a>
*/ ?>
   
      </div>
    </div>
    
    <div class="AccordionPanel">
      <div class="AccordionPanelTab">Publikasi</div>
      <div class="AccordionPanelContent">
       <a href="admin.php?page=admin/view/east_java_investment" style="text-decoration:none;"><div class="fpanela" >East Java Investment</div></a>
    <a href="admin.php?page=admin/view/pamflet" style="text-decoration:none"><div class="fpanela" >Pamflet</div></a>
     <a href="admin.php?page=admin/view/brosur" style="text-decoration:none"><div class="fpanela" >Brosur</div></a>
     <a href="admin.php?page=admin/view/buku_biru" style="text-decoration:none"><div class="fpanela" >Potensi dan Peluang Investasi</div></a>
      </div>
    </div>
    
	<?php /*
     <div class="AccordionPanel">
      <div class="AccordionPanelTab">Panduan Investasi</div>
      <div class="AccordionPanelContent">
       <a href="admin.php?page=admin/view/investment_guide&ig_type=35" style="text-decoration:none;"><div class="fpanela" >Negative Investment List</div></a>
   <a href="admin.php?page=admin/view/investment_guide&ig_type=36" style="text-decoration:none;"><div class="fpanela" >Langkah-Langkah Investasi</div></a>
   <a href="admin.php?page=admin/view/investment_guide&ig_type=37" style="text-decoration:none;"><div class="fpanela" >Hukum dan Regulasi</div></a>
   <a href="admin.php?page=admin/view/investment_guide&ig_type=38" style="text-decoration:none;"><div class="fpanela" >Pajak</div></a>
   <a href="admin.php?page=admin/view/investment_guide&ig_type=39" style="text-decoration:none;"><div class="fpanela" >Form Aplikasi</div></a>
      </div>
    </div>
    */
	?>
     <div class="AccordionPanel">
      <div class="AccordionPanelTab">User Management</div>
      <div class="AccordionPanelContent">
    
 <a href="admin.php?page=admin/view/change_password" style="text-decoration:none"><div class="fpanela" >Ganti Password</div></a>
      </div>
    </div>
    
    
     <div class="AccordionPanel">
      <div class="AccordionPanelTab">Pengaturan</div>
      <div class="AccordionPanelContent">
      <a href="admin.php?page=admin/view/slider" style="text-decoration:none"><div class="fpanela" >Slider</div></a>
    <a href="admin.php?page=admin/view/background" style="text-decoration:none"><div class="fpanela" >Background</div></a>
     <a href="admin.php?page=admin/view/foto" style="text-decoration:none"><div class="fpanela" >Foto Banner</div></a>
  <a href="admin.php?page=admin/view/welcome_page" style="text-decoration:none"><div class="fpanela" >Welcome Page</div></a>
  <a href="admin.php?page=admin/view/profile" style="text-decoration:none"><div class="fpanela" >Profil</div></a>
  <a href="admin.php?page=admin/view/upload_image" style="text-decoration:none"><div class="fpanela" >Upload Gambar</div></a>
    <a href="admin.php?page=admin/view/upload_file" style="text-decoration:none"><div class="fpanela" >Upload File</div></a>
     <a href="admin.php?page=admin/view/popup_home" style="text-decoration:none"><div class="fpanela" >Popup Home</div></a>
      </div>
    </div>
    
  </div>
</div>

<script type="text/javascript">
var Accordion1 = new Spry.Widget.Accordion("Accordion1");
</script>
