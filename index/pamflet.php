  <?php
	$_GET['publication_id'] = (isset($_GET['publication_id'])) ? $_GET['publication_id'] : '';
 

	  if($_GET['page'] == "pamflet"){
		$link_search = "index.php?page=".$_GET['page']."&publication_id=".abs((int)$_GET['publication_id']);
	}
	
	?>
<div id="content">


<!-- 960 Container -->
<div class="container floated">

	<div class="sixteen floated page-title">

		<h2>Pamflet</h2>

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
					  $where = "and publication_title like '%".$_POST['search_publication']."%'"; 
					  }
					 $query = "SELECT * FROM publications where publication_type = '2' and active_status = '1' $where ORDER BY publication_id DESC";
					 $excute = mysql_query($query);
					  while($data = mysql_fetch_array($excute)){
					?>
						<a href="index.php?page=pamflet&publication_id=<?= $data['publication_id']?>&title=<?= $data['publication_title']?>">        
					
						<li class="sign-up" style="padding-right:50px;"><i class="icon-check-circle"></i><?= $data['publication_title']?>
							<br>
							<span class="album-date"><i class="icon-calendar medium-calendar"></i><?= format_date($data['publication_date'])?></span>
						</li><div class="album-count"><?php echo count_data('publication_pic', "publication_id = $data[publication_id]"); ?></div>
						
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
	if(abs((int)$_GET['publication_id']) == ""){
		$q_max = mysql_query("select max(publication_id) as new_id from publications where publication_type = '2' and active_status = '1'");
		$r_max = mysql_fetch_array($q_max);
		$publication_id = $r_max['new_id'];
	}else{
    	$publication_id = abs((int)$_GET['publication_id']);
	}
	$query_judul = mysql_query("SELECT publication_title FROM publications where publication_id = '$publication_id'");
    $data_judul = mysql_fetch_array($query_judul);
	?>
	<!-- Page Content -->
	<div class="eleven floated right">
		<div class="page-content">

			<h3 class="margin-reset"><?php echo $data_judul['publication_title'] ?></h3><br>
		
			
			 <?php
	$query_pub = mysql_query("SELECT * FROM publication_pic where publication_id = '$publication_id' order by pic_id asc");
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