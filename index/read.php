<?php
//include '../../libraries/config.php';
 $news_id = abs((int)$_GET['num']);;
   
   $query = "SELECT * FROM news WHERE news_id = $news_id";
   $excute =  mysql_query($query);
   $data = mysql_fetch_array($excute);
?>

<div id="content">

<!-- 960 Container -->
<div class="container floated">
	<div class="sixteen floated page-title">
		<h2><?= $data['news_title']?></h2>
		<nav id="breadcrumbs">
			<ul>
				<!-- <li>You are here:</li> -->
				
				<li>Dipost pada <?= format_date($data['news_date']); ?></li>
			</ul>
		</nav>
	</div>
</div>
<!-- 960 Container / End -->

<!-- 960 Container -->
<div class="container">
	<div class="page-content">
		<?php
         if($data['news_img']){
		 ?>
		<img src="<?= $data['news_img']?>" class="image-left" style="width: 30%; margin-bottom: 40px;">
		<?php
		}
		?>
		<p><?= $data['news_content']?></p>

		<br>
		<a href="javascript: history.back()" class="button gray medium">Kembali</a>
	</div>


</div>


<!-- End 960 Container -->



</div>

