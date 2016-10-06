<?php
//session_start();
//echo $_SESSION['user_type_type'];
include 'libraries/config.php';
?>
<?php
if(!isset($_SESSION['logon'])){ 
include 'admin/view/login2.php';

?>
 
<title>Login Page</title>
 <?php
 }else{
 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script type="text/javascript" src="js/function.js"></script>
<!--<script src="js/SpryAssets/SpryAccordion.js" type="text/javascript"></script>-->
<?php include 'js/SpryAssets/SpryAccordion.php'; ?>
<link href="js/SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css">

<link type='text/css' href='css/style_admin_new.css' rel='stylesheet' media='all' />
<link type="text/css" href="css/form_new.css" rel="stylesheet" media="all" />
<link rel="shortcut icon" href="img/images/icon.png"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator Page</title>
<style type="text/css">
<!--

-->
</style>

</head>
	
<body leftmargin="0" rightmargin="0" onLoad="startTime()">
<?php
//include 'admin/view/background_new.php';
?>
<div class="banner"></div>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" id="table_admin">
  <tr>
    <td><div class="atas">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    
     <?php
		$user_id = $_SESSION['user_id'];
		$ax = mysql_query("select * from user where user_id ='$user_id'");
		$bx = mysql_fetch_object($ax);
		$at = mysql_query("select user_type_name from user_types where user_type_id ='".$bx->user_type_id."'");
		$bt = mysql_fetch_object($at); 
		?>
        
      <div class="welcome">  Welcome <?php echo ucfirst($bx->user_name); ?>, You are <?php if($bx->user_type_id == 1 || $bx->user_type_id == 13){ echo ucfirst($bt->user_type_name); }else{ echo ucfirst("User ".$bt->user_type_name); }?>
    </div>
    </td>
    <td align="right"> <table width="200" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div style="color:#fff; font-size:11px; font-weight:bold; padding-top:7px; margin-right:10px;"><?php echo date("d-m-Y"); ?></div></td>
    <td align="right"><div id="clock_field" class="clock_field"></div></td>
    <td align="right" style="padding-top:6px; padding-right:10px;"><a href="admin/controller/proses.php?req=logout" style="color:#FF0; font-size:11px;  font-weight:bold; text-decoration:none;">Logout</a></td>
  </tr>
</table>
</td>
  </tr>
</table>

   </div></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="25%" rowspan="2" valign="top"><?php include 'admin/admin_new/menu_kanan.php'; ?></td>
        <td width="75%" valign="top" style="background: #E9F0F5;">
        <?php include 'admin/admin_new/content.php'; ?>
        
        </td>
      </tr>
     
    </table></td>
  </tr>
</table>
</body>
</html>
<?php
}
?>
