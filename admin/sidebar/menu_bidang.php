<script src="js/SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<link href="js/SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />
<div id="CollapsiblePanel1" class="CollapsiblePanel">
  <div class="CollapsiblePanelTab" tabindex="0">Menu dan Berita</div>
  <div class="CollapsiblePanelContent">
  <div id="lpanela">
  	
	
    <div class="fpanela" ><a href="admin.php?page=admin/view/news_menu_bidang2">Menu Bidang</a></div>
   <?php
$query_cq = "select count(*) from contact_questions a 
						join forwards b on b.question_id = a.id
						where user_type_id = '".$_SESSION['user_type_id']."'
						and status = '1'
	
	order by tgl desc";
$result_cq = mysql_query($query_cq);
$query_data_cq = mysql_fetch_row($result_cq);

?>

 	<div class="fpanela" ><a href="admin.php?page=admin/view/inbox_bidang">INBOX  
    <?php if($query_data_cq[0] > 0){ ?>
    <span class="inbox_masuk"> <?php echo $query_data_cq[0] ?></span>
    <?php } ?>
    </a></div> 
</div> 
  </div>
</div>

<div id="CollapsiblePanel2" class="CollapsiblePanel">
  <div class="CollapsiblePanelTab" tabindex="0">Publikasi</div>
  <div class="CollapsiblePanelContent">
  <div id="lpanela">
 	<div class="fpanela" ><a href="admin.php?page=admin/view/east_java_investment">East Java Investment</a></div>
    <div class="fpanela" ><a href="admin.php?page=admin/view/pamflet">Pamflet</a></div>
     <div class="fpanela" ><a href="admin.php?page=admin/view/brosur">Brosur</a></div>
 
</div> 
  </div>
</div>

<div id="CollapsiblePanel3" class="CollapsiblePanel">
  <div class="CollapsiblePanelTab" tabindex="0">User Management</div>
  <div class="CollapsiblePanelContent">
  <div id="lpanela">
 	
 <div class="fpanela" ><a href="admin.php?page=admin/view/change_password">Ganti Password</a></div>
</div> 
  </div>
</div>


<script type="text/javascript">
var CollapsiblePanel1 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel1");
var CollapsiblePanel2 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel2");
var CollapsiblePanel3 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel3");


</script>
