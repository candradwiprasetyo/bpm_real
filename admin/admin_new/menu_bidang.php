
<div class="menu_kanan_atas">
</div>
<div class="menu_kanan">


  <div id="Accordion1" class="Accordion" tabindex="0">
    <div class="AccordionPanel">
      <div class="AccordionPanelTab">Menu dan Berita</div>
      <div class="AccordionPanelContent">
      
 
    <a href="admin.php?page=admin/view/news_menu_bidang2" style="text-decoration:none;"><div class="fpanela" >Berita Bidang</div></a>
   
<?php
$query_cq = "select count(*) from contact_questions a 
						join forwards b on b.question_id = a.id
						where user_type_id = '".$_SESSION['user_type_id']."'
						and status = '1'
	
	order by tgl desc";
$result_cq = mysql_query($query_cq);
$query_data_cq = mysql_fetch_row($result_cq);

?>
 	<a href="admin.php?page=admin/view/inbox_bidang" style="text-decoration:none;"><div class="fpanela" >INBOX 
     <?php if($query_data_cq[0] > 0){ ?>
    <span class="inbox_masuk"> <?php echo $query_data_cq[0] ?></span>
    <?php } ?>
    </div> </a>
      
  

   
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
    
    <div class="AccordionPanel">
      <div class="AccordionPanelTab">User Management</div>
      <div class="AccordionPanelContent">
    
 <a href="admin.php?page=admin/view/change_password" style="text-decoration:none"><div class="fpanela" >Ganti Password</div></a>
      </div>
    </div>
    
    
   
    
  </div>
</div>

<script type="text/javascript">
var Accordion1 = new Spry.Widget.Accordion("Accordion1");
</script>
