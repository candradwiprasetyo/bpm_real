<?php
//session_start();
?>
<style>
body{

	background-color:#888E8E;
	background:url(img/images/7login.png) repeat;
	font-family:Tahoma, Geneva, sans-serif;
	color:#666;
	font-size:24px;
	margin:0px;
}
.atas{
	height:200px;
	width:100%;
}
.welcome{
	color:#fff;
	text-align:center;
	margin-bottom:20px;
	font-size:16px;
}
.copyright{
	color:#fff;
	text-align:center;
	margin-bottom:10px;
	font-size:12px;
}
.form_login_trans{
	background:url(img/images/trans_putih.png) repeat;
	width:410px;
	height:205px;
	margin-left:auto;
	margin-right:auto;
	padding:5px;
	padding-top:7px;
	border-radius:25px;
}
.form_login{
	width:400px;
	height:200px;
	border-radius:20px;
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
#background_img{
	width:100%;
	height:100%;
	min-width:1024px;
	min-height:768px;
	position:fixed;
	z-index:-999999;
	/*filter: blur(5px);

	-webkit-filter: blur(5px);
	-moz-filter: blur(5px);
	-o-filter: blur(5px);
	-ms-filter: blur(5px);*/
}
.textfield{
	width:180px;
	padding:10px;
	border:none;
	border-radius:5px;
}
.button{
	width:100px;
	height:200px;
  	border-bottom-right-radius:20px;
	border-top-right-radius:20px;
	border:none;
	cursor:pointer;
	background:url(img/images/button_go.png);
}
.err{
	margin-bottom:10px;
	text-align:center;
	border:#FFF 1px solid;
	padding-bottom:10px;
	padding-top:10px;
	font-family:Arial, Helvetica, sans-serif;
	color:#FFF;
	font-size:12px;
	font-weight:bold;
	background-color:#F60;
	width:300px;
	margin-left:auto;
	margin-right:auto;
}

</style>
<title>LOGIN ADMIN</title>
<div id="background_img"><img class="bground" src="img/images/7login.png" width="100%" height="100%" /></div>
<div class="atas"></div>

<div class="welcome">Halaman Login Admin Website BPM Jawa Timur</div>
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
      <td valign="top"><div class="login_left">
        <table width="100%" border="0" cellspacing="0" cellpadding="10">
          <tr>
            <td style="border-bottom:1px solid #444;"><div style="color:#fff; padding:5px; font-weight:bold;">LOGIN</div></td>
          </tr>
          <tr>
            <td>
              <table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td><span style="color:#ccc; font-size:12px;">Username</span></td>
                  <td><input type="text" name="user_username" id="user_username" class="textfield" placeholder="Username Anda" /></td>
                </tr>
                <tr>
                  <td><span style="color:#ccc; font-size:12px;">Password</span></td>
                  <td><input type="password" name="user_password" id="user_password" class="textfield" placeholder="Password Anda"/></td>
                </tr>
              </table>
              <br /></td>
          </tr>
          <tr>
            <td><br /></td>
          </tr>
        </table>
      </div></td>
      <td valign="top"><div class="login_right">
        <input type="submit" name="button" id="button" value="" class="button" />
        
      </div></td>
    </tr>
  </table>
  </div>
</form>
<div class="copyright">Copyright@2013</div>

