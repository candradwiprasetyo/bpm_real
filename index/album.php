  <?php
	$_GET['album_id'] = (isset($_GET['album_id'])) ? $_GET['album_id'] : '';
    if(isset($_GET['page']) && $_GET['page'] == "album"){
		$link_search = "index.php?page=".$_GET['page']."&album_id=".abs((int)$_GET['album_id']);
	}
	
	?>
<div id="content">


<!-- 960 Container -->
<div class="container floated">

	<div class="sixteen floated page-title">

		<h2>Album BPM Jawa Timur</h2>

		<!-- <nav id="breadcrumbs">
			<ul>
				<li>You are here:</li>
				<li><a href="index.html">Home</a></li>
				<li>Left Sidebar</li>
			</ul>
		</nav> -->

	</div>

</div>
<!-- 960 Container / End -->


<!-- 960 Container -->
<div class="container floated">
	<!-- Sidebar -->
	<div class="four_new floated sidebar left" style="padding:0px;">
		<aside class="sidebar" style="padding:0px">

		<!-- Search -->
			<nav class="widget-search">
				<form name="form1" method="post" enctype="multipart/form-data" action="<?php echo $link_search; ?>">
					<button class="search-btn-widget"></button>
					<input class="search-field" type="text" placeholder="Cari disini" value="<?= (isset($_POST['search_publication'])) ? $_POST['search_publication'] : ''; ?>" name="search_publication">
				</form>
			</nav>
			<div class="clearfix"></div>

			<!-- Categories -->
			<nav class="widget">
				
				<div class="pricing-table-new">
				<div class="color-1">
					<ul>
						<?php
						$where = '';
					if(isset($_POST['search_publication'])){
					  $where = "and album_title like '%".$_POST['search_publication']."%'"; 
					  }
					 $query = "SELECT * FROM album where active_status = '1' $where ORDER BY album_id DESC";
					 $excute = mysql_query($query);
					  while($data = mysql_fetch_array($excute)){
					?>    
						<a href="index.php?page=album&album_id=<?= $data['album_id']?>">        
					
						<li class="sign-up" style="padding-right:50px;"><i class="icon-check-circle"></i><?= $data['album_title']?>
							<br>
							<span class="album-date"><i class="icon-calendar medium-calendar"></i>
								<?= format_date($data['album_date'])?></span>
						</li><div class="album-count"><?php echo count_data('album_pic', "album_id = $data[album_id]"); ?></div>
						
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

	 <?php
	if(abs((int)$_GET['album_id']) == ""){
		$q_max = mysql_query("select max(album_id) as new_id from album");
		$r_max = mysql_fetch_array($q_max);
		$album_id = $r_max['new_id'];
	}else{
    	$album_id = abs((int)$_GET['album_id']);
	}
	$query_judul = mysql_query("SELECT album_title FROM album where album_id = '$album_id'");
    $data_judul = mysql_fetch_array($query_judul);
	?>
	<!-- Page Content -->
	<div class="eleven floated right">
		<div class="page-content">

			<h3 class="margin-reset"><?php echo $data_judul['album_title'] ?></h3><br>
		
			
			  <?php
			$query_pub = mysql_query("SELECT * FROM album_pic where album_id = '$album_id'");
		    while($data_pub = mysql_fetch_array($query_pub)){
			?>
			<p>
			<img src="<?php echo $data_pub['location']?>" style="width: 100%;" alt=""><br>
			<h5><?=  $data_pub['name']; ?></h5><br>
			<?php
		    echo $data_pub['description'];
			?>
			</p>
			<?php
			}
			?>

			


		</div>
	</div>
	<!-- Page Content / End -->

</div>
<!-- 960 Container / End -->

</div>