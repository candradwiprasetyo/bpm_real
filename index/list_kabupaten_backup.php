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
<div class="sixteen columns">

	

	<!-- Number of Tables / From 2 to 5 / -->
	<div class="two-tables">
		<?php
		$no=1;
		$query_news1 = mysql_query("select * from cities  ORDER BY city_id desc ");
		while($row_news1 = mysql_fetch_array($query_news1)){
			$row = $no%2;
			if($row==1){
		?>
		<div class="pricing-table">
			<div class="color-1">
				<h3><?= $row_news1['city_name']?></h3>
				
				<ul>
					<li>Alamat : <?php echo $row_news1['city_address']; ?></li>
					<li>No telepon : <?php echo $row_news1['city_phone'];?></li>
					<li>Email : <?php echo $row_news1['city_email'];?></li>
					<li class="sign-up"><a href="#" class="button medium light">Informasi Investasi</a></li>
				</ul>
			</div>
		</div>
		<?php
		}else{
		?>
		<div class="pricing-table">
			<div class="color-2">
				<h3><?= $row_news1['city_name']?></h3>
				
				<ul>
					<li>Alamat : <?php echo $row_news1['city_address']; ?></li>
					<li>No telepon : <?php echo $row_news1['city_phone'];?></li>
					<li>Email : <?php echo $row_news1['city_email'];?></li>
					<li class="sign-up"><a href="#" class="button medium light">Sign Up</a></li>
				</ul>
			</div>
		</div>
		<?php
		}
		$no++;
		}
		?>

	</div>
	<div class="clearfix"></div>
	<br>
	<br>
	</div>
</div>

</div>
<!-- 960 Container / End -->

</div>