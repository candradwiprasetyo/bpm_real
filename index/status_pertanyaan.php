<div class="content">


<div class="container floated">

	<div class="sixteen floated page-title">

		<h2>Status Pertanyaan</h2>


	</div>

</div>

<!-- 960 Container -->
<div class="container">
	<div class="page-content">

		 <?php
		$query_news1 = mysql_query("select * from contact_questions where active_status='1' ORDER BY tgl DESC ");
			while($row_news1 = mysql_fetch_array($query_news1)){
				
				$q_j = mysql_query("select * from answers where question_id = '".$row_news1['id']."'");
				$r_j = mysql_fetch_object($q_j);
			?>
		<div class="sixteen columns">
			<div class="testimonials"> <?= format_date($row_news1['tgl']) ?>
			</div>
			<div class="testimonials-answer">
			<h3>Pertanyaan :</h3><br><blockquote><?php echo $row_news1['pesan'] ?></blockquote>
				<h3>Jawaban :</h3><br>
			<blockquote><?php echo $r_j->answer_description; ?></blockquote>
				</div>
			<div class="testimonials-bg"></div>
			<div class="testimonials-author"><?= $row_news1['judul_pesan']." (".$row_news1['email'].")"?></div>
		</div>

		<?php
		}
		?>

	</div>
</div>

</div>