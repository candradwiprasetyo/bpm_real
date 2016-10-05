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
		$this->SetTextColor(0,98,200);
		$this->Cell(1,1.2,'Supplier');
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

$cri = "";
	if($_GET['id']){
		$cri = "where id_supplier='".$_GET['id']."'";
	}
	$sql=  mysql_query("select * from supplier ".$cri."");
	$row = mysql_fetch_array($sql);
			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(1,0.8,'ID Supplier',0,0,'L');
			$pdf->Cell(3,0.8,':',0,0,'R');
			$pdf->Cell(6,0.8,$row['id_supplier'],0,0,'L');
			$pdf->Ln();
			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(1,0.8,'Nama',0,0,'L');
			$pdf->Cell(3,0.8,':',0,0,'R');
			$pdf->Cell(6,0.8,$row['nama'],0,0,'L');
			$pdf->Ln();
			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(1,0.8,'Alamat',0,0,'L');
			$pdf->Cell(3,0.8,':',0,0,'R');
			$pdf->Cell(6,0.8,$row['alamat'],0,0,'L');
			$pdf->Ln();
			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(1,0.8,'Kota',0,0,'L');
			$pdf->Cell(3,0.8,':',0,0,'R');
			$pdf->Cell(6,0.8,$row['kota'],0,0,'L');
			$pdf->Ln();
			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(1,0.8,'Email',0,0,'L');
			$pdf->Cell(3,0.8,':',0,0,'R');
			$pdf->Cell(6,0.8,$row['email'],0,0,'L');
			$pdf->Ln();
			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(1,0.8,'Telepon',0,0,'L');
			$pdf->Cell(3,0.8,':',0,0,'R');
			$pdf->Cell(6,0.8,$row['telp'],0,0,'L');
			$pdf->Ln();
	
			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(1,0.8,'Fax',0,0,'L');
			$pdf->Cell(3,0.8,':',0,0,'R');
			$pdf->Cell(6,0.8,$row['fax'],0,0,'L');
			$pdf->Ln();
		
	
			
			
			
			
	$pdf->Ln();
	$pdf->Output();

?>