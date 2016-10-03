<!-- 960 Container -->
<div class="container floated">
	<div class="blank floated">
		<section class="entire">
				<a href="index.php?page=news&news_cat_id=0"><h3>Kinerja Investasi <span>dan Indikator Kinerja Utama</span></h3></a>
				
			</section>
		<!-- Recent Work Entire -->
		<div class="four columns carousel-intro">

			<section class="entire">
				
				<p>“Jatim menduduki urutan pertama dalam kontribusi kinerja investasi terhadap realisasi investasi nasional di atas Kalimantan Timur, Kalimantan Selatan, Sumatera Utara, dan DKI Jakarta. Total realisasi PMDN Jatim memberikan kontribusi terhadap nasional sebesar 32,2 persen“</p>
				<p>
				<span style="font-weight: bold;">Warno Harisasono</span>
				</p>
			</section>

			<div class="carousel-navi">
				<div id="work-prev" class="arl jcarousel-prev"><i class="icon-chevron-left"></i></div>
				<div id="work-next" class="arr jcarousel-next"><i class="icon-chevron-right"></i></div>
			</div>
			<div class="clearfix"></div>

		</div>

		<!-- jCarousel -->
		<section class="jcarousel recent-work-jc">
			<ul>
				<?php
				$query_news1 = mysql_query("SELECT * FROM news WHERE news_cat_id = 0 and active_status = '1'  ORDER BY news_date DESC LIMIT 0,10");
					while($row_news1 = mysql_fetch_array($query_news1)){
				?>
				<!-- Recent Work Item -->
				<li class="four columns">
					<a href="index.php?page=read&num=<?= $row_news1['news_id']?>" class="portfolio-item">
						<figure>
							<img src="<?php echo $row_news1['news_img'] ?>" alt=""/>
							<figcaption class="item-description">
								<h5><?= $row_news1['news_title']?></h5>
								<span><?= format_date($row_news1['news_date']) ?></span>
							</figcaption>
						</figure>
					</a>
				</li>

				<?php
				}
				?>

				
			</ul>
		</section>
		<!-- jCarousel / End -->

	</div>
</div>
<!-- 960 Container / End -->