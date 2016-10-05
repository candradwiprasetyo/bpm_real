<?php
define('FPDF_FONTPATH','../fpdf/font/');
require('../fpdf/fpdf.php');
include '../lib/config.php';

$id_kontrak = $_GET['id_kontrak'];
$Mysql = new Mysql();
$a = $Mysql->select("contract","*","id_kontrak='$id_kontrak'");
$c = $Mysql->fetch_array($a);


class PDF extends FPDF{
	function Header(){
		$this->Image('../img/image/bannerx.jpg',1,1,19);
		$this->SetFont('Arial','B',20);
		$this->SetTextColor(255,255,255);
		$this->Cell(27,1.8,'Kredit Motor',0,0,'C');
		$this->Ln();
		$this->SetFont('Arial','B',8);
		$this->Cell(28,1,date("D, d M Y  H:m:s",time()),0,0,'C');
		$this->Ln();
		$this->SetFont('Arial','B',12);
		$this->SetTextColor(0,98,200);
		$this->Cell(19,1.2,'Transaksi Kredit','B',0,'L');
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
	
	$pdf->Cell(5,1,'ID Kontrak',0,0);
	$pdf->Cell(0,1,$id_kontrak,0,0);
	$pdf->Output();


?>