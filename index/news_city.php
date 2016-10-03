<?php
$city_id = abs((int)$_GET['city_id']);
$q_cat = mysql_query("select city_name from cities where city_id='$city_id'");
$r_cat = mysql_fetch_array($q_cat);

if($_GET['page'] == "news_city"){
	$link_search = "index.php?page=".$_GET['page']."&city_id=".abs((int)$_GET['city_id']);
}

?>
<div id="content">


<!-- 960 Container -->
<div class="container floated">

	<div class="sixteen floated page-title">

		<h2><?= $r_cat['city_name']?></h2>

		<nav id="breadcrumbs">
			<ul>
				<!-- <li>You are here:</li> -->
				
				
			</ul>
		</nav>

	</div>

</div>
<!-- 960 Container / End -->


<!-- 960 Container -->
<div class="container floated">

	<!-- Page Content -->
	<div class="eleven floated">
		<div class="page-content">

		<?php
	if(!isset($_GET['news_id'])){
		$q_max = mysql_query("select max(news_id) as new_id from news_city where city_id = '".abs((int)$_GET['city_id'])."' and active_status = '1'");
		$r_max = mysql_fetch_array($q_max);
		$news_id = $r_max['new_id'];
	}else{
    	$news_id = $_GET['news_id'];
	}

	$query_pub = mysql_query("SELECT * FROM news_city where news_id = '$news_id'");
    $data_pub = mysql_fetch_array($query_pub);

	?>
			<h3 style="margin-top: -10px;"><?php echo $data_pub['news_title'] ?></h3>
			<br>
			<p>
			<?php
		    if($data_pub['news_img']){
			?> 
			<img class="image-left" src="<?= $data_pub['news_img']?>" style="width: 45%;" alt="">
			<?php
			}
			?>
			<?= $data_pub['news_content']?></p>

			<br>
			
	
		<a href="javascript: history.back()" class="button gray medium">Kembali</a>			

		</div>
	</div>
	<!-- Page Content / End -->


	<!-- Sidebar -->
	<div class="four_new floated sidebar right" style="padding:0">
		<aside class="sidebar" style="padding:0px">

			<!-- Search -->
			<div class="box-kabupaten">
			<div class="title">Informasi Investasi di Kabupaten/Kota:</div>
			<select name="i_search_kabupaten" id="i_search_kabupaten" class="select" onselect="get_kabupaten()">
				<option value="0">Pilih Kab/Kota</option>
		        <?php
		        $q_city = mysql_query("select * from cities");
				while($r_city = mysql_fetch_array($q_city)){
				?>
		          <option value="<?= $r_city[0] ?>">
		            <?= $r_city[1] ?>
		          </option>
		          <?php
				}
				?>
			</select>
			<br>
			<a class="button gray medium" onclick="get_kabupaten()">Cari</a>
			</div>

			<div class="clearfix"></div>


			<!-- Categories -->
			<nav class="widget">
				
				<div class="pricing-table-new">
				<div class="color-1">
					<ul>
						<?
						$where = '';
						if(isset($_POST['search_content'])){
						  $where = "and news_title like '%".$_POST['search_content']."%'"; 
						  }
						 $query = "SELECT * FROM news_city WHERE city_id = '".abs((int)$_GET['city_id'])."' and active_status = '1' $where ORDER BY news_id DESC";
						 $excute = mysql_query($query);
						  while($data = mysql_fetch_array($excute)){
						?>
						<a href="index.php?page=news_city&city_id=<?php echo abs((int)$_GET['city_id']); ?>&news_id=<?= $data['news_id']?>">            
						<li class="sign-up"><i class="icon-check-circle"></i><?= $data['news_title']?></li>
						</a>
						<?php
						}
						?>
					</ul>
					<br>
				</div>
			</div>
			</nav>
		

		
			
		</aside>
	</div>
	<!-- Sidebar / End -->

</div>
<!-- 960 Container / End -->

</div>


<script type="text/javascript">
function get_kabupaten(){
	var e = document.getElementById("i_search_kabupaten");
	var value = e.options[e.selectedIndex].value;
	if(value==0){
		alert('Pilih kabupaten terlebih dahulu');
	}else{
		window.location = 'index.php?page=news_city&city_id='+value;
	}
}
</script>