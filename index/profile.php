<!-- 960 Container -->
<div class="container">
<!-- Icon Boxes -->
	<section class="icon-box-container">

		<!-- Icon Box Start -->
		<div class="one-third column">
			<article class="icon-box">
				<?php
				$query_wp = mysql_query("select profile_page, profile_page_name from config");
				$jml_wp = mysql_num_rows($query_wp);
				$r_wp = mysql_fetch_object($query_wp);

				$profile_page = "Jawa Timur adalah salah satu ekonomi terbesar di Indonesia dan menikmati pertumbuhan ekonomi yang positif dari tahun ke tahun, termasuk 5 tahun terakhir, selalu di atas rata-rata 5,82% per tahun. Krisis ekonomi global sejak pertengahan 2008 tidak membuat perekonomian Jawa Timur merosot, meskipun sedikit penurunanyang tidak terlalu signifikan.";

				$profile_page_name = "Profil Jawa Timur";

				if($r_wp->profile_page != ""){	
					$profile_page = $r_wp->profile_page;
				}
				if($r_wp->profile_page_name != ""){	
					$profile_page_name = $r_wp->profile_page_name;
				}
				//echo $gambar;
				?>
				<a href="index.php?page=read_profile"><h3><?= $profile_page_name ?></h3></a>
				<img src="images/surabaya.jpg" class="profile-img">
				<p>
				<?php
					$ac = explode(" ", $profile_page);
					for($cc=0; $cc<=60; $cc++){
						if(isset($ac[$cc])){
							echo $ac[$cc]." ";
						}
					}echo "... ";
				?></p>
			</article>

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

			
		</div>
		<!-- Icon Box End -->

		<!-- Icon Box Start -->
		<div class="one-third column">
			<article class="icon-box">
				
			<a href="index.php?page=content&id_menu=4"><h3>Pejabat Pengelola Informasi</h3></a>
				<?php
				 	$query_news1 = mysql_query("SELECT * FROM news_menu WHERE news_cat_id = '4' and active_status = '1' ORDER BY news_lock_id desc, news_id DESC LIMIT 0,2");
					//$query_news1 = mysql_query("SELECT * FROM news WHERE news_cat_id = 1 and active_status = '1'  ORDER BY news_date DESC LIMIT 0,2");
					while($row_news1 = mysql_fetch_array($query_news1)){
				?>
				<article class="">
					<div class="medium-image-home">
						<figure class="post-img picture">
							<a href="index.php?page=content&id_menu=4&news_id=<?= $row_news1['news_id']?>"><img src="<?php echo $row_news1['news_img'] ?>" alt=""></a>
						</figure>
					</div>

					<div class="medium-content-home">
						<header class="meta">
							<div class="medium-content-title"><a href="index.php?page=content&id_menu=4&news_id=<?= $row_news1['news_id']?>"><?= $row_news1['news_title']?></a></div>
							
							<span><i class="icon-calendar medium-calendar"></i><a href="#"><?= format_date($row_news1['news_date']) ?></a></span>
						</header>
					</div>
					<div style="clear:both"></div>
					<div class="medium-description">
						<?php
							$a = explode(" ",$row_news1['news_desc_index']);
							for($c=0; $c<=20; $c++){
								if(isset($a[$c])){
									echo $a[$c]." ";
								}
							}echo "... "; 
						?>
					</div>
				</article>
				<?php
				}
				?>

				
				
			</article>
		</div>
		<!-- Icon Box End -->

		<!-- Icon Box Start -->
		<div class="one-third column">
			<article class="icon-box">
				
				<a href="index.php?page=news&news_cat_id=3"><h3>Agenda Kegiatan</h3></a>
				 <?php
				$query_news2 = mysql_query("SELECT * FROM news WHERE news_cat_id = 3 and active_status = '1'  ORDER BY news_date DESC LIMIT 0,2");
					while($row_news2 = mysql_fetch_array($query_news2)){
					?>
				<article class="">
					<div class="medium-image-home">
						<figure class="post-img picture">
							<a href="index.php?page=read&num=<?= $row_news2['news_id']?>"><img src="<?php echo $row_news2['news_img'] ?>" alt=""></a>
						</figure>
					</div>

					<div class="medium-content-home">
						<header class="meta">
							<div class="medium-content-title"><a href="index.php?page=read&num=<?= $row_news2['news_id']?>"><?= $row_news2['news_title']?></a></div>
							
							<span><i class="icon-calendar medium-calendar"></i><a href="#"><?= format_date($row_news2['news_date']) ?></a></span>
						</header>
					</div>
					<div style="clear:both"></div>
					<div class="medium-description">
						<?php
							$a = explode(" ",$row_news2['news_desc_index']);
							for($c=0; $c<=20; $c++){
								if(isset($a[$c])){
									echo $a[$c]." ";
								}
							}echo "... "; 
						?>
					</div>
				</article>
				<?php
				}
				?>

				
				
			</article>
		</div>
		<!-- Icon Box End -->

	</section>
	<!-- Icon Boxes / End -->

	
</div>
<!-- 960 Container / End -->

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