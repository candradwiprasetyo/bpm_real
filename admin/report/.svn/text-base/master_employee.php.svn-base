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
		$this->Cell(1,1.2,'Master Employee');
		$this->Ln();
		$this->SetFont('Arial','B',8);
		$this->SetTextColor(0,98,200);
		$this->SetFillColor(194,254,255);
		$this->Cell(2,1,'No','B',0,'');
		$this->Cell(5,1,'Nama','B',0,'');
		$this->Cell(4,1,'Alamat','B',0,'');
		$this->Cell(4,1,'Telp','B',0,'');
		$this->Cell(4,1,'Email','B',0,'');
		$this->Ln();
	}
	function Footer(){
		$this->Image('../img/image/bawah.png',1,28,19);
		$this->SetY(-1.7);
		$this->SetFont('Arial','',7);
		$this->SetTextColor(255,255,255);
		$this->Cell(0,1,'  Copyright@2011',0,0,'L');
		$this->Cell(0,1,'Halaman '.$this->PageNo().'  ',0,0,'R');
	}
}

	$pdf = new PDF('P','cm','A4');
	$pdf->Open();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial','',8);


$cri = "";
	if($_GET['nama']){
		$cri = "where nama like '%".$_GET['nama']."%'";
	}
	
	$sql = mysql_query("select * from employee ".$cri."");
	$t = 0;
	while($row=mysql_fetch_array($sql)){
		if($t%2==1){
			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(2,1,$row[0],0,0,'L',1);
			$pdf->Cell(5,1,$row[1],0,0,'L',1);
			$pdf->Cell(4,1,$row['address'],0,0,'L',1);
			$pdf->Cell(4,1,$row['phone'],0,0,'L',1);
			$pdf->Cell(4,1,$row['email'],0,0,'L',1);
			$pdf->Ln();
		}else{
			$pdf->Cell(2,1,$row[0],0,0,'L');
			$pdf->Cell(5,1,$row[1],0,0,'L');
			$pdf->Cell(4,1,$row['address'],0,0,'L');
			$pdf->Cell(4,1,$row['phone'],0,0,'L');
			$pdf->Cell(4,1,$row['email'],0,0,'L');
			$pdf->Ln();
		}
		$t++;
	}
	$pdf->Output();
?>