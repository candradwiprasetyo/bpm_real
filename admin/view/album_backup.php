	<?php
		$query = "SELECT * FROM album";
		$excute = mysql_query($query);
	?>
<div id="fulling">
 <table class="pure-table" width="100%" height="100%">
  	 <tr class="pure-table-odd">
		 <td>ID</td>
		 <td>JUDUL</td>
		 <td>Deskripsi</td>
		 <td>tanggal</td>
	 </tr>
	 <? while ( $data = mysql_fetch_array($excute)) { ?>
		 <tr>
			 <td><?= $data['album_id']?></td>
			 <td><?= $data['album_title']?></td>
			 <td><?= $data['album_description']?></td>
			 <td><?= $data['album_date']?></td>
		 </tr>
	 <? }  ?>
 </table><br />
 	<form action="admin/controller/album_proses.php" method="POST" enctype="multipart/form-data" class="pure-form  pure-form-aligned">
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
