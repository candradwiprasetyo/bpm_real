	<?php
		$query = "SELECT * FROM slider ORDER BY date DESC";
		$excute = mysql_query($query);
	?>
<div id="fulling">
 <table class="pure-table" width="100%" height="100%">
  	 <tr class="pure-table-odd">
		 <td>ID</td>
		 <td>JUDUL</td>
		 <td>Deskripsi</td>
		 <td>tanggal</td>
		 <td>Action</td>
	 </tr>
	 <? while ( $data = mysql_fetch_array($excute)) { ?>
		 <tr>
			 <td><?= $data['id']?></td>
			 <td><?= $data['name']?></td>
			 <td><?= $data['description']?></td>
			 <td><?= $data['date']?></td>
			 <td><a href="admin/controller/slider_proses.php?delete=<?= $data['id']?>"><div class="trash"></div></a></td>
		 </tr>
	 <? }  ?>
 </table><br />
 	<form action="admin/controller/slider_proses.php" method="POST" enctype="multipart/form-data" class="pure-form  pure-form-aligned">
    <fieldset>
        <div class="pure-control-group">
            <label for="title">Title</label>
            <input id="title" type="text" placeholder="title" name="i_title" width>
        </div><br />
		
        <div class="pure-control-group">
            <label for="description">Deskripsi</label>
            <textarea id="deskripsi" name="i_deskripsi" placeholder="deskripsi"></textarea>
        </div><br />

        <div class="pure-control-group">
            <label for="email">Inputkan Gambar</label><br />
            <input id="file" type="file" name="img1" /><br />
            <input id="file" type="file" name="img2"/><br />
            <input id="file" type="file" name="img3"/><br />
            <input id="file" type="file" name="img4"/><br />
            <input id="file" type="file" name="img5"/><br />
           <br /> maximal 5 file.
        </div><br />

        <div class="pure-controls">
            <button type="submit" class="pure-button pure-button-primary">Submit</button>
        </div>
    </fieldset>		
 
 	</form>

</div>
