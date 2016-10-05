<?php
//session_start();
?>
<style>
body{

	background-color:#888E8E;
	font-family:Arial, Helvetica, sans-serif;
	color:#666;
	font-size:24px;
}
.form_login_trans{
	background:url(../../img/images/trans_putih.png) repeat;
}
.form_login{
	width:400px;
	height:200px;
	border-radius:20px;
	border:1px solid #666;
}
.login_left{
	width:300px;
	background-color:#333;
	height:200px;
   -moz-box-shadow:    inset 0 0 100px #1F1F1F;
   -webkit-box-shadow: inset 0 0 100px #1F1F1F;
   box-shadow:         inset 0 0 100px #1F1F1F;
   border:1px solid #222;
   border-top-left-radius:20px;
	border-bottom-left-radius:20px;
}
.login_right{
	width:100px;
	background-color:#38BADC;
	height:200px;
   -moz-box-shadow:    inset 0 0 100px #319FC2;
   -webkit-box-shadow: inset 0 0 100px #319FC2;
   box-shadow:         inset 0 0 100px #319FC2;
    border:1px solid #2F97B4;
	border-top-right-radius:20px;
	border-bottom-right-radius:20px;
}


</style>
<title>LOGIN ADMIN</title>
<div class="welcome">Halaman Login Admin Website BPM Jawa Timur 2</div>
<?php
 if(isset($_GET['err']) && $_GET['err']=1){
	 
 
 ?>
<div class="err">Username atau Password Anda salah</div>
<?php
 }
?>
<form name="form1" method="post" action="admin/controller/proses.php?req=login">
<div class="form_login_trans">
  <table width="400" border="0" align="center" cellpadding="0" cellspacing="0" class="form_login">
    <tr>
      <td valign="top"><div class="login_left"></div></td>
      <td valign="top"><div class="login_right"></div></td>
    </tr>
  </table>
  </div>
</form>
<div class="copyright">Copyright@2013</div>

