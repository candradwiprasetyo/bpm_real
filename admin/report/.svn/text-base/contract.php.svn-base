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
		$this->Cell(1,1.2,'Transaksi Kredit');
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

$angka = $_SESSION['terbilang']." rupiah";
$cri = "";
	if($_GET['id']){
		$cri = "where id_kontrak ='".$_GET['id']."'";
	}
	$sql = mysql_query("select * from contract ".$cri."");
	$row = mysql_fetch_array($sql);
	$aco = mysql_query("select * from collection where id_koleksi='".$row['id_koleksi']."'");
	$bco = mysql_fetch_array($aco);	
	$am = mysql_query("select * from motor where id_motor='".$bco['id_motor']."'");
	$bm = mysql_fetch_array($am);
	$av = mysql_query("select * from vendor where id_vendor='".$bm['id_vendor']."'");
	$bv = mysql_fetch_array($av);
	$ac =  mysql_query("select * from customer where id_cust='".$row['id_cust']."'");
	$bc = mysql_fetch_array($ac);

			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(2,0.8,'ID Kontrak',0,0,'L');
			$pdf->Cell(3,0.8,':',0,0,'R');
			$pdf->Cell(2,0.8,$row['id_kontrak'],0,0,'L');
			$pdf->Ln();
			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(2,0.8,'Nama',0,0,'L');
			$pdf->Cell(3,0.8,':',0,0,'R');
			$pdf->Cell(2,0.8,$bc['nama'],0,0,'L');
			$pdf->Ln();
			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(2,0.8,'Alamat',0,0,'L');
			$pdf->Cell(3,0.8,':',0,0,'R');
			$pdf->Cell(2,0.8,$bc['alamat'],0,0,'L');
			$pdf->Ln();
			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(2,0.8,'DP',0,0,'L');
			$pdf->Cell(3,0.8,':',0,0,'R');
			$pdf->Cell(2,0.8,number_format($row['DP'],2),0,0,'L');
			$pdf->Ln();
			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(2,0.8,'Tenor',0,0,'L');
			$pdf->Cell(3,0.8,':',0,0,'R');
			$pdf->Cell(2,0.8,$row['tenor'],0,0,'L');
			$pdf->Ln();
			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(2,0.8,'Jumlah Angsuran',0,0,'L');
			$pdf->Cell(3,0.8,':',0,0,'R');
			$pdf->Cell(2,0.8,number_format($row['jumlah'],2),0,0,'L');
			$pdf->Ln();
			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(2,0.8,'Terbilang',0,0,'L');
			$pdf->Cell(3,0.8,':',0,0,'R');
			$pdf->Cell(19,1,$angka,0,0,'L');

			$pdf->Ln();
			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(2,1,'ID Koleksi',0,0,'L',1);
			$pdf->Cell(5,1,'Nama Motor',0,0,'L',1);
			$pdf->Cell(4,1,'Vendor',0,0,'L',1);
			$pdf->Cell(5,1,'Warna',0,0,'L',1);
			$pdf->Cell(3,1,'Harga',0,0,'L',1);
			$pdf->Ln();
			$pdf->Cell(2,1,$row['id_koleksi'],0,0,'L');
			$pdf->Cell(5,1,$bm['nama'],0,0,'L');
			$pdf->Cell(4,1,$bv['nama'],0,0,'L');
			$pdf->Cell(5,1,$row['warna'],0,0,'L');
			$pdf->Cell(3,1,number_format($bco['harga'],2),0,0,'L');
			$pdf->Ln();
			
			$pdf->Ln();$pdf->Ln();
			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(11,1,'',0,0);
			$pdf->Cell(4,1,'Teller',0,0,'C');
			$pdf->Cell(4,1,'Customer',0,0,'C');
			$pdf->Ln();
			$pdf->Cell(11,1,'',0,0);
			$pdf->Cell(4,1,'',0,0,'C');
			$pdf->Ln();
			$pdf->Cell(11,1,'',0,0);
			$pdf->Cell(4,1,'(..............................)',0,0,'C');
			$pdf->Cell(4,1,'(..............................)',0,0,'C');
			
			
	$pdf->Ln();
	$pdf->Output();

?>