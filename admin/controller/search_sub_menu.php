<?php			  
include '../../libraries/config.php';
 
	$id = $_GET['id'];
	
	$query = "SELECT * FROM menus where id_parent= '$id' and id_menu <> 15 and id_menu <> 40";
	$excute = mysql_query($query);
	
	while($row = mysql_fetch_array($excute)){
	?>
	
		<option value="<?php echo $row['id_menu']?>"><?php echo $row['name']?></option>
	
	<?php
	}
?>