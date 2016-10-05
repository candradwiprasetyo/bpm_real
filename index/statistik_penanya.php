 <div id="content">

<!-- 960 Container -->
<div class="container floated">
	<div class="sixteen floated page-title">
		<h2>Statistik Penanya</h2>
	</div>
</div>
<!-- 960 Container / End -->

<!-- 960 Container -->
<div class="container">
	<div class="page-content">	
	
<table  width="100%" height="400" border="0" cellspacing="0" cellpadding="0" class="tengah" style="margin-bottom:10px;" >
  <tr>
    <td valign="top" align="center">  
<div style="background:url(img/images/chart_back.jpg) no-repeat left top; width:100%; height:360px; position: absolute;">	

</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="360" style="margin-left:100px; position: absolute; margin-top: 40px;">
  <tr>
    <td valign="bottom">
    <?php 
	/*select DatePart(month, <ColumnName>) from <tablename>
	SELECT * FROM
table
WHERE MONTH(date) = 4 AND YEAR(date) = 2010*/
	
	$country_id = array('78','85','36','185','186','9999');
	
	$country_name = array(
					'Indonesia',
					'Jepang',
					'China',
					'Inggris',
					'USA',
					'Others'
	);
	
	function nama_bulan($bulan){
		$nama_bulan = array(
						'',
						'Januari',
						'Februari',
						'Maret',
						'April',
						'Mei',
						'Juni',
						'Juli',
						'Agustus',
						'September',
						'Oktober',
						'November',
						'Desember'
		);
		return $nama_bulan[$bulan];
	}
	
	for($i_country = 0; $i_country <= 5; $i_country++){
//	$q_chart = mysql_query("select * from countries");
	//while($r_chart = mysql_fetch_object($q_chart)){
		
		$month1 = date("m");
		$year1 = date("Y");
		if($month1 <= 1){
			$month2 = 12;
			$year2 = $year1 - 1;
		}else{
			$month2 = $month1 - 1;
			$year2 = $year1;
		}
		if($month2 <= 1){
			$month3 = 12;
			$year3 = $year2 -1;
		}else{
			$month3 = $month2 - 1;
			$year3 = $year2;
		}
		//echo $month1."/".$year1."-".$month2."/".$year2."-".$month3."/".$year3;
		
		$month = array($month1, $month2, $month3);
		$year = array($year1, $year2, $year3);
	
		
	?>
   
    <div class="chart">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
  <?php
  /*Mengambil jumlah data 3 bulan terakhir*/
  $query_all = mysql_query("SELECT count(*) FROM contact_questions where 
  							(MONTH(tgl) = '$month1' and YEAR(tgl) = '$year1') || 
							(MONTH(tgl) = '$month2' and YEAR(tgl) = '$year2') ||
							(MONTH(tgl) = '$month3' and YEAR(tgl) = '$year3')
							");
  $row_all = mysql_fetch_row($query_all);
  $jumlah_data = $row_all[0];
  $i_color = 0;
  for($i_date=2; $i_date>=0; $i_date--){

		
	
		if($country_id[$i_country] == 9999){
			$where = "where (negara <> 78 && negara <> 85 && negara <> 36 && negara <> 157 && negara <> 185 && negara <> 186) and
			(MONTH(tgl) = '".$month[$i_date]."' and YEAR(tgl) = '".$year[$i_date]."')";
			
		}else{
			$where = "where negara = '".$country_id[$i_country]."' and MONTH(tgl) = '".$month[$i_date]."' and YEAR(tgl) = '".$year[$i_date]."'";
		}
		
		//echo $where;
		$query_country = mysql_query("SELECT count(*) FROM contact_questions $where ");
		$row_country = mysql_fetch_row($query_country);
		
		//echo $row_country[0];
		
		$c_height = $row_country[0] / $jumlah_data * 300;
		$c_margin_top = 335 - $c_height;
		$isi_chart_margin_top = $c_margin_top - 50;
		$c_isi = $c_height / 300 * 100;
		$c_isi = number_format($c_isi, 1);
  ?>
    <td>
     <span onmouseover="tooltip.show('Jumlah Penanya : <?php echo $row_country[0] ?>');" onmouseout="tooltip.hide()">
    <div class="isi_chart<?php echo $i_color+1?>" style="margin-top:<?= $isi_chart_margin_top;?>px"><?= $c_isi?></div>
    </span>
    <div class="chart<?php echo $i_color+1?>" style="height:<?= $c_height?>px; margin-top:0px;"></div></td>
   
    
    <?php
	$i_color++;
  }
	?>
  </tr>
  <tr>
    <td colspan="3" align="center" height="40"><?php echo $country_name[$i_country]; ?></td>
    </tr>
    </table>
    </div>
    	
	
    <?php
	}
	?>
    </td>
  
  </tr>
</table>

<br /><br /><br />
<table width="200" border="0" align="center" cellpadding="0" cellspacing="0" style="color:#9F9F9F; margin-top: 360px;">
  <tr>
  <?php
  $i_color_bulan = 0;
   for($i_bulan=2; $i_bulan>=0; $i_bulan--){
	   
	   $bulan = nama_bulan($month[$i_bulan]);
  ?>
    <td align="center">
    <div class="bulan<?php echo $i_color_bulan+1; ?>"></div>
    <?php echo $bulan; ?>
    </td>
  <?php
  $i_color_bulan++;
   }
  ?>
  </tr>
</table>

</td>
</tr>
</table>

	</div>
</div>
<!-- End 960 Container -->

</div>
