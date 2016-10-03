<div class="container floated" style="background: #f6f6f6">
	<div class="ten floated" style="padding: 0px;">
		<!-- FlexSlider  -->
		<section class="flexslider home">
			<ul class="slides">
				<?php 
				$query = "SELECT * FROM slider where active_status = '1' ORDER BY date DESC LIMIT 0,7 ";
				$excute = mysql_query($query);
				$i = 1;
				while ($data = mysql_fetch_array($excute)){
				?>
				<li><a href="index.php?page=read_slider&id=<?= $data['id']?>"><img src="<?= $data['location']?>" alt="" />
					<article class="slide-caption">
						<div class="slide-description">
							<h3><?php echo $data['name'] ?></h3>
							<p><?php
							$a = explode(" ", $data['description']);
							for($c=0; $c<=12; $c++){
								if(isset($a[$c])){
									echo $a[$c]." ";
								}
							}echo "... ";
							?></p>
						</div>
					</article>
					</a>
				</li>
				<?php
				$i++;
				}
				?>
			</ul>
		</section>
		<!-- FlexSlider / End -->
	</div>
	<div class="five floated">
		<div class="content-welcome-page">
			<?php
			$query_wp = mysql_query("select welcome_page, welcome_page_photo, welcome_page_name from config");
			$jml_wp = mysql_num_rows($query_wp);
			$r_wp = mysql_fetch_object($query_wp);

			$welcome_page = "Website ini menyajikan informasi yang tersedia untuk mendukung investasi di Jawa Timur pada Morfologi melibatkan singkat, jelas, dan komprehensif, Geografis, Penduduk, Pertumbuhan Ekonomi, PDB, Struktur Ekonomi, Ketenagakerjaan, Inflasi, Pertumbuhan Investasi, Infrastruktur meliputi: Bandara, Pelabuhan, Terminal Tanah Transportasi, Listrik, Air, Telekomunikasi, Hotel, Perbankan dan lain-lain.";
			$welcome_page_photo = "img/images/kepala.jpg";
			$welcome_page_name = "Selamat datang di website BPM Provinsi Jawa Timur";

			if($r_wp->welcome_page_photo != ""){	
				$welcome_page_photo = $r_wp->welcome_page_photo;
			}
			if($r_wp->welcome_page != ""){	
				$welcome_page = $r_wp->welcome_page;
			}
			if($r_wp->welcome_page_name != ""){	
				$welcome_page_name = $r_wp->welcome_page_name;
			}
			//echo $gambar;
			?>

			<a href="index.php?page=read_welcome_page">
			<h3 class="margin-reset">
			<?//= $welcome_page_name?>
			<div class="welcome-page-title">Selamat datang di </div>
			<div class="welcome-page-subtitle">Website BPM Provinsi Jawa Timur</div></h3><br>
			</a>
			<p><img class="image-right" src="<?= $welcome_page_photo?>" style="width: 40%;" alt="">
			<span class="dropcap gray">D</span>
			<?php
				$ad = explode(" ", $welcome_page);
				for($cd=0; $cd<=80; $cd++){
				echo $ad[$cd]." ";
				}echo "... ";
			?>
		</div>
	</div>
</div>