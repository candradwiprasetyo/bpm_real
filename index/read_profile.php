<?php   
   $query = "SELECT profile_page, profile_page_name FROM config";
   $excute =  mysql_query($query);
   $data = mysql_fetch_array($excute);
?>

<div id="content">

<!-- 960 Container -->
<div class="container floated">
	<div class="sixteen floated page-title">
		<h2><?= $data['profile_page_name']?></h2>
	</div>
</div>
<!-- 960 Container / End -->

<!-- 960 Container -->
<div class="container">
	<div class="page-content">
		<img src="images/surabaya.jpg" class="image-left" style="width: 30%; margin-bottom: 40px;">
		<p><?= $data['profile_page']?></p>
	</div>
</div>
<!-- End 960 Container -->

</div>
