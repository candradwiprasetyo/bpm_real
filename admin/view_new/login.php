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
.tabel{
	border-radius:10px;
	-moz-box-shadow:0px 0px 10px #666;
    -webkit-box-shadow:0px 0px 10px #666;
    box-shadow:0px 0px 10px #666;
	
	border:2px solid #999;
}
.textfield{
	height:40px;
	color:#999;
	font-size:16px;
	padding-left:20px;
	background:#f9f9f9;
	border:1px solid #ddd;
	width:210px;
	border-radius:3px;
	background:url(img/images/text_back.gif) repeat-x;
}
.button{
	
	font-family: Arial, Helvetica, sans-serif;
	text-align: center;
	font-size: 11px;
	font-weight: bold;
	width: 70px;
	background: #4E69A2;
	padding: 0px 2px;
	line-height: 18px !important;
	line-height: 16px;
	height: 40px;
	border-radius:3px;
	margin: 1px;
	margin-right:-2px;
	cursor:pointer;
	border:1px solid #435A8B;
	color:#fff;
	text-shadow:0 -1px 0 rgba(0, 0, 0, 0.2);
	background:url(img/images/but.gif) repeat-x;
}
.err{
	color:#Fff;
	background-color:#D43F00;
	border-radius:3px;
	padding:5px;
	width:340px;
	font-size:12px;
	margin-left:auto;
	margin-right:auto;
	text-align:center;
	margin-bottom:20px;
	-moz-box-shadow:0px 0px 5px #666;
    -webkit-box-shadow:0px 0px 5px #666;
    box-shadow:0px 0px 5px #666;
}
.logo{
	margin-top:120px;
	width:254px;
	height:106px;
	background:url(img/images/logo2.png);
	margin-left:auto;
	margin-right:auto;
}
.welcome{
	width:600px;
	height:50px;
	margin-left:auto;
	margin-right:auto;
	text-align:center;
	color:#ccc;
	margin-top:150px;
}
.copyright{
	width:200px;
	font-size:11px;
	margin-left:auto;
	margin-right:auto;
	color:#bbb;
	text-align:center;
	margin-top:-10px;
}
.login_kiri{
	width:50px;
	height:228px;
	border-top-left-radius:10px;
	border-bottom-left-radius:10px;
	background:url(img/images/login.jpg) no-repeat;
	background-color:#393939;
}
.login_tengah{
	background:url(img/images/back.gif) repeat-x;
	height:228px;
	width:300px;
	border-top-right-radius:10px;
	border-bottom-right-radius:10px;
}
.login_kanan{
	background-color:#393939;
	width:46px;
	height:228px;
	border-top-right-radius:10px;
	border-bottom-right-radius:10px;
}

</style>
<title>LOGIN ADMIN</title>
<div class="welcome">Halaman Login Admin Website BPM Jawa Timur</div>
<?php
 if(isset($_GET['err']) && $_GET['err']=1){
	 
 
 ?>
<div class="err">Username atau Password Anda salah</div>
<?php
 }
?>
<form name="form1" method="post" action="admin/controller/proses.php?req=login">
  <table width="300" border="0" align="center" cellpadding="0" cellspacing="0" class="tabel">
    <tr>
      <td width="50" valign="top"><div class="login_kiri"></div></td>
      <td width="300" valign="top"><div class="login_tengah">
        <table width="100%" border="0" cellspacing="0" cellpadding="5" style="padding:10px; padding-left:40px; font-size:14px; font-weight:bold;">
          <tr>
            <td>USERNAME</td>
          </tr>
          <tr>
            <td>
             <?php
      $user_username = ($_SESSION['user_username_tmp']) ? $_SESSION['user_username_tmp'] : "Username Anda";
	  $user_password = ($_SESSION['user_password_tmp']) ? $_SESSION['user_password_tmp'] : "Password";
	  ?>
            <input type="text" name="user_username" id="user_username" class="textfield" onfocus="if(this.value=='Username Anda'){this.value='';}" onblur="if(this.value==''){this.value='Username Anda';}" value="<?= $user_username?>" required="required" /></td>
          </tr>
          <tr>
            <td>PASSWORD</td>
          </tr>
          <tr>
            <td><input type="password" name="user_password" id="user_password" class="textfield" onfocus="if(this.value=='Password'){this.value='';}" onblur="if(this.value==''){this.value='Password';}" value="<?= $user_password?>" required="required" /></td>
          </tr>
          <tr>
            <td><input type="submit" name="button" id="button" value="LOGIN" class="button" /></td>
          </tr>
        </table>
      </div></td>
     
    </tr>
  </table>
</form>
<div class="copyright">Copyright@2013</div>

