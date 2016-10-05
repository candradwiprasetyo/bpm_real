<?php
class PDF extends FPDF{
	function Header(){
		$this->Image('../img/image/bannerx.jpg',1,1,19);
		$this->SetFont('Arial','B',20);
		$this->SetTextColor(255,255,255);
		$this->Cell(25,1.8,'Tulus Kredit Motor',0,0,'C');
		$this->Ln();
		$this->SetFont('Arial','B',8);
		$this->Cell(28,1,date("D, d M Y  H:m:s",time()),0,0,'C');
		$this->Ln();
		$this->SetFont('Arial','B',12);
		$this->SetTextColor(200,10,40);
		$this->Cell(1,1.2,'Kredit Harian');
		$this->Ln();
		$this->SetFont('Arial','B',8);
		$this->SetTextColor(0,98,200);
		$this->SetFillColor(194,254,255);
		$this->Cell(1,1,'ID','B',0,'');
		$this->Cell(2,1,'ID Customer','B',0,'');
		$this->Cell(3,1,'Nama','B',0,'');
		$this->Cell(2,1,'ID Koleksi','B',0,'');
		$this->Cell(2,1,'Motor','B',0,'');
		$this->Cell(2.5,1,'Harga','B',0,'R');
		$this->Cell(2.5,1,'DP','B',0,'R');
		$this->Cell(2,1,'Tenor','B',0,'C');
		$this->Cell(2,1,'Angsuran','B',0,'R');
		$this->Ln();
	}
	function Footer(){
		$this->Image('../img/image/bawah.png',1,28,19);
		$this->SetY(-1.7);
		$this->SetFont('Arial','',7);
		$this->SetTextColor(255,255,255);
		$this->Write(1,'Copyright@2011');
		$this->Write(1,' By Melon','http://www.nocantik.cocotmu.com');
		$this->Cell(0,1,'Halaman '.$this->PageNo().'  ',0,0,'R');
	}
}

	$pdf = new PDF('P','cm','A4');
	$pdf->Open();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial','',8);

$cri=" status='0'";
if($_GET['tgl1'] && $_GET['tgl2']){
	$cri = " tanggal_mulai >= '".$_GET['tgl1']."' and tanggal_mulai <= '".$_GET['tgl2']."' and status='0'";
}else{
	$cri = " status='0'";
}
	$sql = mysql_query("select * from contract where ".$cri."");
	$t = 0;
	while($row=mysql_fetch_array($sql)){
	$aco = mysql_query("select * from collection where id_koleksi='".$row['id_koleksi']."'");
	$bco = mysql_fetch_array($aco);	
	$am = mysql_query("select * from motor where id_motor='".$bco['id_motor']."'");
	$bm = mysql_fetch_array($am);
	$ac =  mysql_query("select * from customer where id_cust='".$row['id_cust']."'");
	$bc = mysql_fetch_array($ac);
		if($t%2==1){
			$pdf->Cell(1,0.7,$row['id_kontrak'],0,0,'');
			$pdf->Cell(2,0.7,$row['id_cust'],0,0,'');
			$pdf->Cell(3,0.7,$bc['nama'],0,0,'');
			$pdf->Cell(2,0.7,$row['id_koleksi'],0,0,'');
			$pdf->Cell(2,0.7,$bm['nama'],0,0,'');
			$pdf->Cell(2.5,0.7,number_format($row['harga_pokok']),0,0,'R');
			$pdf->Cell(2.5,0.7,number_format($row['DP']),0,0,'R');
			$pdf->Cell(1.5,0.7,number_format($row['tenor']),0,0,'R');
			$pdf->Cell(2.5,0.7,number_format($row['angsuran']),0,0,'R');
			$pdf->Ln();
		}else{

			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(1,0.7,$row['id_kontrak'],0,0,'',1);
			$pdf->Cell(2,0.7,$row['id_cust'],0,0,'',1);
			$pdf->Cell(3,0.7,$bc['nama'],0,0,'',1);
			$pdf->Cell(2,0.7,$row['id_koleksi'],0,0,'',1);
			$pdf->Cell(2,0.7,$bm['nama'],0,0,'',1);
			$pdf->Cell(2.5,0.7,number_format($row['harga_pokok']),0,0,'R',1);
			$pdf->Cell(2.5,0.7,number_format($row['DP']),0,0,'R',1);
			$pdf->Cell(1.5,0.7,$row['tenor'],0,0,'R',1);
			$pdf->Cell(2.5,0.7,number_format($row['angsuran']),0,0,'R',1);
			$pdf->Ln();
		}
		$t++;
	}
	$pdf->Output();
?>