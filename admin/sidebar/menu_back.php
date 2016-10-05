<?php
$max = mysql_query("select max(id_type_sidebar) as max_type from type_sidebar");
$max_type = mysql_fetch_object($max);
$f = $max_type->max_type;
for($t=1; $t<=$f; $t++){ ?>
<?php
$o = mysql_query("select nama from type_sidebar where id_type_sidebar='$t'");
$p = mysql_fetch_object($o);
?>
<div class="isi_tab">
<div class="judul_tab"><?php echo ucfirst($p->nama); ?></div>
<div id="lpanela">
<?php
if($_SESSION['id_employee']){
	$a = mysql_query("select * from sidebar where type='".$t."' and type_user='2' order by nama ASC");
}else{
	$a = mysql_query("select * from sidebar where type='".$t."' order by nama ASC");
}
while($b = mysql_fetch_object($a)){
?>
    <div class="fpanela" ><a href="<?php echo $b->link; ?>"><?php
	$x = explode("_",$b->nama); 
	$y = count($x);
	for($i=0; $i<=$y; $i++){
	echo $x[$i]." ";
	}  
	?></a></div>
<?php
}
?>
</div>  
</div>
<?php
}
?>