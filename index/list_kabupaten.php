<div class="content">


<div class="container floated">

	<div class="sixteen floated page-title">

		<h2>Alamat Kabupaten dan Kota</h2>


	</div>

</div>



<!-- Three Tables
================================================== -->

<!-- 960 Container -->
<div class="container">
	<div class="page-content">

		<?php
		$no=1;
		$query_news1 = mysql_query("select * from cities  ORDER BY city_id desc ");
		while($row_news1 = mysql_fetch_array($query_news1)){
			$row = $no%2;
			
		?>
		<div class="eight columns">

			<!-- <div class="list-kabupaten">
				<div class="title"><?= $row_news1['city_name']?></div>
				<div class="desc">
					Alamat : <?php echo $row_news1['city_address']; ?><br>
					No telepon : <?php echo $row_news1['city_phone'];?><br>
					Email : <?php echo $row_news1['city_email'];?>
				</div>
				<a href="#" class="button light">Button</a>
			</div> -->
			<div class="large-notice">
				<h3><?= $row_news1['city_name']?></h3>
				<p>Alamat : <?php echo $row_news1['city_address']; ?><br>
					No telepon : <?php echo $row_news1['city_phone'];?><br>
					Email : <?php echo $row_news1['city_email'];?></p>
				<a href="index.php?page=news_city&city_id=<?= $row_news1['city_id']?>" class="button medium color">Informasi Investasi</a>
			</div>

		</div>
		<?php
		}
		?>
	</div>
</div>

</div>
<!-- 960 Container / End -->

</div>