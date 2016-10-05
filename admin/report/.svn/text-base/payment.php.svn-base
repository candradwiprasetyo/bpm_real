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
		$this->Cell(1,1.2,'Bukti Pembayaran Angsuran');
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
		$cri = "where id_angsur ='".$_GET['id']."'";
	}
	$sql = mysql_query("select * from payment ".$cri."");
	$row=mysql_fetch_array($sql);
	$aco = mysql_query("select * from contract where id_kontrak='".$row['id_kontrak']."'");
	$bco = mysql_fetch_array($aco);
	$acl = mysql_query("select * from collection where id_koleksi='".$bco['id_koleksi']."'");
	$bcl = mysql_fetch_array($acl);
	$am = mysql_query("select * from motor where id_motor='".$bcl['id_motor']."'");
	$bm = mysql_fetch_array($am);
	$av = mysql_query("select * from vendor where id_vendor='".$bm['id_vendor']."'");
	$bv = mysql_fetch_array($av);
	$ac =  mysql_query("select * from customer where id_cust='".$bco['id_cust']."'");
	$bc = mysql_fetch_array($ac);
	
	$t = mysql_query("select count(id_angsur) as banyak_angsuran from payment where id_kontrak='".$row['id_kontrak']."'");
	$r = mysql_fetch_object($t);
	$sisa_angsuran = $bco['tenor'] - $r->banyak_angsuran;
	
	$k = mysql_query("select * from payment where id_kontrak='".$row['id_kontrak']."'");
	while($l = mysql_fetch_object($k)){
		$bayarx = ($l->jumlah_bayar - ($bco['bunga'] / 100) * $l->angsuran) - $l->denda;
		$jml += $bayarx;
	}
	
	$sisa = $bco['kredit'] - $jml;
	$jumlah_angsuran = $row['jumlah_bayar'] - $row['denda'];
	$jumlah_bayar = $jml;
	
			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(2,0.8,'ID Kontrak',0,0,'L');
			$pdf->Cell(3,0.8,':',0,0,'R');
			$pdf->Cell(2,0.8,$row['id_kontrak'],0,0,'L');
			$pdf->Ln();
			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(2,0.8,'No Faktur',0,0,'L');
			$pdf->Cell(3,0.8,':',0,0,'R');
			$pdf->Cell(2,0.8,$row['no_faktur'],0,0,'L');
			$pdf->Ln();
			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(2,0.8,'Nama Customer',0,0,'L');
			$pdf->Cell(3,0.8,':',0,0,'R');
			$pdf->Cell(2,0.8,$bc['nama'],0,0,'L');
			$pdf->Ln();
			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(2,0.8,'Angsuran Ke',0,0,'L');
			$pdf->Cell(3,0.8,':',0,0,'R');
			$pdf->Cell(2,0.8,$row['angsuran_ke'],0,0,'L');
			$pdf->Ln();
			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(2,0.8,'Telah Terbayar',0,0,'L');
			$pdf->Cell(3,0.8,':',0,0,'R');
			$pdf->Cell(2,0.8,number_format($jumlah_bayar,2),0,0,'L');
			$pdf->Ln();
			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(2,0.8,'Sisa Bayar',0,0,'L');
			$pdf->Cell(3,0.8,':',0,0,'R');
			$pdf->Cell(2,0.8,number_format($sisa,2),0,0,'L');
			$pdf->Ln();
			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(2,0.8,'Jumlah Angsuran',0,0,'L');
			$pdf->Cell(3,0.8,':',0,0,'R');
			$pdf->Cell(2,0.8,number_format($jumlah_angsuran,2),0,0,'L');
			$pdf->Ln();
			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(2,0.8,'Denda',0,0,'L');
			$pdf->Cell(3,0.8,':',0,0,'R');
			$pdf->Cell(2,0.8,$row['denda'],0,0,'L');
			$pdf->Ln();
			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(2,0.8,'Total Bayar',0,0,'L');
			$pdf->Cell(3,0.8,':',0,0,'R');
			$pdf->Cell(2,0.8,number_format($row['jumlah_bayar'],2),0,0,'L');
			$pdf->Ln();
			$pdf->SetFillColor(224,255,255);
			$pdf->Cell(2,0.8,'Terbilang',0,0,'L');
			$pdf->Cell(3,0.8,':',0,0,'R');
			$pdf->Cell(2,0.8,$angka,0,0,'L');
			$pdf->Ln();
			
			$pdf->Ln();$pdf->Ln();
			$pdf->SetFillColor(224,255,255);
			$pdf->SetFont('Arial','B',8);
			$pdf->Cell(5,1,'KETERANGAN :',0,0,'L');
			$pdf->Cell(6,1,'',0,0,'L');
			$pdf->Cell(4,1,'Teller',0,0,'C');
			$pdf->Cell(4,1,'Customer',0,0,'C');
			$pdf->Ln();
			
			if($sisa==0){
			$pdf->SetFont('Arial','B',32);
			$pdf->SetTextColor(0,98,200);	
			$pdf->Cell(5,1,'LUNAS',0,0,'L');
			$pdf->Cell(6,1,'',0,0);
			$pdf->Cell(4,1,'',0,0,'C');
			$pdf->Cell(4,1,'',0,0,'C');
			$pdf->Ln();
			$pdf->Cell(11,1,'',0,0,'C');
			}else{
			
			$pdf->Cell(2,0.8,'Sisa Bayar ',0,0,'L');
			$pdf->Cell(1,0.8,':',0,0,'R');
			$pdf->Cell(8,0.8,'Rp '.number_format($sisa,2),0,0,'L');
			$pdf->Cell(4,0.8,'',0,0,'C');
			$pdf->Cell(4,0.8,'',0,0,'C');
			$pdf->Ln();
			$pdf->SetTextColor(0,0,0);
			$pdf->SetFont('Arial','B',8);
			$pdf->Cell(2,0.8,'Sisa Angsuran ',0,0,'L');
			$pdf->Cell(1,0.8,':',0,0,'R');
			$pdf->Cell(8,0.8,$sisa_angsuran." kali",0,0,'L');
			}
			$pdf->SetTextColor(0,0,0);
			$pdf->SetFont('Arial','B',8);
		
			$pdf->Cell(4,1,'(..............................)',0,0,'C');
			$pdf->Cell(4,1,'(..............................)',0,0,'C');
			
	$pdf->Ln();
	$pdf->Output();

?>