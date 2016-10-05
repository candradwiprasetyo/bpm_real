<div id="content">


<!-- 960 Container -->
<div class="container floated">

	<div class="sixteen floated page-title">

		<h2>Kirim Pertanyaan</h2>

		<nav id="breadcrumbs">
			<ul>
				
				
				<li>Buku Tamu</li>
			</ul>
		</nav>

	</div>

</div>
<!-- 960 Container / End -->


<!-- 960 Container -->
<div class="container floated">



	<!-- Sidebar -->
	<div class="four floated sidebar left">
		<aside class="sidebar padding-reset">

			

			<div class="widget">
				<h4>BPM Jawa Timur</h4>

				<ul class="contact-informations">
					<li><span class="address">Jalan Rajawali No. 6-8 Surabaya</span></li>
					<li><span class="address">Jawa Timur, Indonesia</span></li>
				</ul>

				<ul class="contact-informations second">
					<li><i class="halflings headphones"></i> <p>031-3537537</p></li>
					<li><i class="halflings icon-fax"></i>031-3531008</li>
					<li><i class="halflings envelope"></i> <p>support@example.com</p></li>
					<li><i class="halflings globe"></i> <p>bpm.jatimprov.go.id</p></li>
				</ul>

			</div>

			<div class="widget">
				<h4>Jam Kerja</h4>
				<ul class="contact-informations hours">
					<li><i class="halflings time"></i>Senin - Jumat <span class="hours">8 pagi to 5 sore</span></li>
				
					<li><i class="halflings ban-circle"></i>Saturday / Sunday <span class="hours">Closed</span></li>
				</ul>
			</div>

		</aside>
	</div>
	<!-- Sidebar / End -->

	<!-- Page Content -->
	<div class="eleven floated right">
		

		<!-- Contact Form -->
				<section class="page-content">

				<div class="notification notice closeable" style="margin: 0px 0px 40px; display: block;" id="notification_1">
			<p>Terima kasih. Pertanyaan Anda akan segera kami tanggapi</p>
		<a class="close" href="#"><i class="icon-remove"></i></a></div>

			<h3 class="margin">Form pertanyaan</h3>
			
				
			
			<p class="margin">Pertanyaan, Ide, saran atau kritik silahkan isi pada Form Komentar berikut.</p>

				<!-- Contact Form -->
				<section id="contact">

					<!-- Success Message -->
					<mark id="message"></mark>

					<!-- Form -->
					<form method="post" action="index/contact_question_controller.php?req=save" name="form_contact" id="form_contact" onsubmit="return validasi_contact()">

						<fieldset>

							<div>
								<label for="name" accesskey="U">Nama :</label>
								<input name="nama" type="text" id="nama"  />
								<div id="pesan_nama_con" class="err2"></div>
							</div>

							<div>
								<label for="email" accesskey="E">Email : <span></span></label>
								<input name="email" type="email" id="email" />
								<div id="pesan_email_con" class="err2"></div>
							</div>

							<div>
								<label for="email" accesskey="E">Negara : <span></span></label>
								<select name="negara" id="negara" class="list">
							      <?php
							      $q_negara = mysql_query("select * from countries order by country_id");
								  while($r_negara = mysql_fetch_array($q_negara)){
								  ?>
							      <option value="<?= $r_negara['country_id']?>" <?php if($r_negara['country_id'] == 78){ ?> selected="selected"<?php }?>><?= $r_negara['country_name']?></option>
							      <?php
								  }
								  ?>
							      </select>
							       <div id="pesan_negara_con" class="err2"></div>
							</div>

							<div>
								<label for="email" accesskey="E">Judul : <span></span></label>
								<textarea rows="1" id="comments" spellcheck="true" style="min-height: 30px;" name="judul_pesan" id="judul_pesan" ></textarea>
								<div id="pesan_judul_pesan_con" class="err2"></div>
							</div>

							<div>
								<label for="comments" accesskey="C">Pertanyaan : <span></span></label>
								<textarea cols="40" rows="3" id="comments" spellcheck="true" name="pesan" id="pesan" ></textarea>
								<div id="pesan_pesan_con" class="err2" ></div>
							</div>

						</fieldset>

						<input type="submit" class="submit" id="submit" value="Send Message" />
						<div class="clearfix"></div>

					</form>

				</section>
				<!-- Contact Form / End -->


		</section>


		
	</div>
	<!-- Page Content / End -->


</div>
<!-- 960 Container / End -->

</div>


