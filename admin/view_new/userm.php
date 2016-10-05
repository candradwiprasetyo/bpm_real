<h2>LIST USER</h2>

<table class="pure-table">
	<tr class="pure-table-odd">
		<td>ID</td>
		<td>Username</td>
		<td>Level</td>
		<td>Owner</td>
		<td>Email</td>
		<td>Phone</td>
		<td>Config</td>
	</tr>
	<?php
		$query = "SELECT a.*,b.nama FROM user a
					JOIN user_types b ON b.id_user = a.type";
		$excute = mysql_query($query);
		
		while($data = mysql_fetch_array($excute)){
		
	?>
	<tr>
		<td><?= $data['user_id']?></td>
		<td><?= $data['user_username']?></td>
		<td><?= $data['nama']?></td>
		<td><?= $data['user_name']?></td>
		<td><?= $data['user_email']?></td>
		<td><?= $data['user_phone']?></td>
		<td>
			<a href="admin/controller/userm.php?delete=<?= $data['user_id']?>"><div class="trash"></div></a>
     
		</td>
	<? }?>
	</tr>
</table>
<br />
<form method="POST" action="admin/controller/userm.php" class="pure-form  pure-form-aligned">
  <fieldset>
	<label>Nama Lengkap</label>
	<input type="text" name="i_nama" />
	
	<br /><br />
	<label>Jenis Kelamin</label>
	<select name="i_jk">
		<option value="L">Laki - Laki</option>
		<option value="P">Perempuan</option>
	</select>
	
	<br /><br />
	<label class="pure-control-group">Alamat</label>	
	<input name="i_address" type="text" />
	<br /><br />
	<label class="pure-control-group">no HP</label>
	<input type="number" name="i_hp" />
	<br><br />
	<label class="pure-control-group">Email</label>
	<input type="email" name="i_email" />
	<br /><br />
	<label>Group Level</label>
	<select name="i_group">
		<?php
			$query3 = "SELECT * FROM user_types";
			$eksekusi = mysql_query($query3);
			while ($dataku = mysql_fetch_array($eksekusi)) {
		?>
		 <option value="<?= $dataku['id_user']?>"><?= $dataku['nama']?></option>
		<? } ?>
	</select>
	<br /><br />
	<label class="pure-control-group">user Name</label>
	<input type="text" name="i_uname" />
	<br /><br />
	<label class="pure-control-group">password</label>
	<input type="password" name="i_pass" />
 </fieldset>
 <input type="submit" value="SIMPAN" class="pure-button pure-button-primary"/>	
</form>