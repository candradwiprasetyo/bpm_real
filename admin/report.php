<?php
session_start();
define('FPDF_FONTPATH','../fpdf/font/');
require('../fpdf/fpdf.php');
include '../lib/config.php';

	$page = $_GET['page'];
	if($page){
		try{
		$Mysql->MyInclude($page.".php");
				}
		catch(Exception $yt){
			echo $yt->getMessage();	
			}
		}else{
			require_once("report/empty.php");
		}

?>