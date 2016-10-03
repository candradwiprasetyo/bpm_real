<?php
 $id = abs((int)$_GET['id']);
   $query = "SELECT * FROM slider WHERE id = $id";
   $excute =  mysql_query($query);
  $data = mysql_fetch_array($excute);
?>

<div id="content">

<!-- 960 Container -->
<div class="container floated">
	<div class="sixteen floated page-title">
		<h2><?= $data['name']?></h2>
	</div>
</div>
<!-- 960 Container / End -->

<!-- 960 Container -->
<div class="container">
	<div class="page-content">
		<img src="<?= $data['location']?>" class="image-left" style="width: 50%; margin-bottom: 40px;"><br>
		<p><?= $data['description']?></p>
	</div>
</div>
<!-- End 960 Container -->

</div>
