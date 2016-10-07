<div class="content_atas">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="58%">
     <?php
     $_GET['add'] = (isset($_GET['add'])) ? $_GET['add'] : '';
     $_POST['search_field'] = (isset($_POST['search_field'])) ? $_POST['search_field'] : '';
     $_GET['news_id'] = (isset($_GET['news_id'])) ? $_GET['news_id'] : '';
     $_POST['category_search_field'] = (isset($_POST['category_search_field'])) ? $_POST['category_search_field'] : '';
     $_SESSION['category_search_field'] = (isset($_SESSION['category_search_field'])) ? $_SESSION['category_search_field'] : '';
     $_GET['city_id'] = (isset($_GET['city_id'])) ? $_GET['city_id'] : '';
     $_GET['album_id'] = (isset($_GET['album_id'])) ? $_GET['album_id'] : '';
     $_GET['publication_id'] = (isset($_GET['publication_id'])) ? $_GET['publication_id'] :  '';
     $_GET['pic_id'] = (isset($_GET['pic_id'])) ? $_GET['pic_id'] : '';
     $_GET['user_id'] = (isset($_GET['user_id'])) ? $_GET['user_id'] : '';
     $_GET['user_type_id'] = (isset($_GET['user_type_id'])) ? $_GET['user_type_id'] : '';
     $_GET['id'] = (isset($_GET['id'])) ? $_GET['id'] : '';
    $page_menu = (isset($_GET['page'])) ? $_GET['page'] : 'admin/view/news';
	$p = explode("/", $page_menu);
	if($page_menu == "admin/view/album_pic"){
		$link = "admin.php?page=".$page_menu."&album_id=".$_GET['album_id']."&add=1";
	}elseif($page_menu == "admin/view/buku_biru_pic"){
		$link = "admin/controller/buku_biru_pic.php?req=add&publication_id=".$_GET['publication_id'];
		//$link = "admin.php?page=".$page_menu."&publication_id=".$_GET['publication_id']."&add=1";
	}elseif($page_menu == "admin/view/east_java_investment_pic"){
		$link = "admin/controller/east_java_investment_pic.php?req=add&publication_id=".$_GET['publication_id'];
		//$link = "admin.php?page=".$page_menu."&publication_id=".$_GET['publication_id']."&add=1";
	}elseif($page_menu == "admin/view/pamflet_pic"){
		$link = "admin.php?page=".$page_menu."&publication_id=".$_GET['publication_id']."&add=1";
	}elseif($page_menu == "admin/view/brosur_pic"){
		$link = "admin.php?page=".$page_menu."&publication_id=".$_GET['publication_id']."&add=1";
	}elseif($page_menu == "admin/view/investment_guide"){
		$link = "admin.php?page=".$page_menu."&ig_type=".$_GET['ig_type']."&add=1";
	}elseif($page_menu == "admin/view/investment_guide_item"){
		$link = "admin.php?page=".$page_menu."&ig_id=".$_GET['ig_id']."&add=1";
	}else{
		$link = "admin.php?page=".$page_menu."&add=1";
	}
	if(!$_GET['add'] && 
	$p[2] != "menu_utama" &&
	$p[2] != "menu_utama_form" &&
	$p[2] != "inbox" &&
	$p[2] != "change_password" &&
	$p[2] != "background" &&
	$p[2] != "foto" &&
	$p[2] != "welcome_page" && 
	$p[2] != "profile" && 
	$p[2] != "hak_akses" &&
	$p[2] != "one_stop_service" &&
	$p[2] != "faq"
	 ){
	?>
     <a href="<?php echo $link ?>">
<div class="add_config">Tambah</div>
</a>
    <?php
	}
	?>
    <a href="javascript:history.back();">
<div class="kembali_config">Kembali</div>
</a>

 <a href="javascript:location.reload();">
<div class="refresh_config">Refresh</div>
</a>

</td>
<td width="2%">
<!-- <div class="config"></div> -->

</td>
    <td width="40%" align="right">
    <div>
    <?php
    $_GET['page'] = (isset($_GET['page'])) ? $_GET['page'] : 'admin/view/news';
	if($_GET['page'] == "admin/view/album_pic"){
		$link_search = "admin.php?page=".$_GET['page']."&album_id=".$_GET['album_id'];
	}else if($_GET['page'] == "admin/view/east_java_investment_pic"){
		$link_search = "admin.php?page=".$_GET['page']."&publication_id=".$_GET['publication_id'];
	}else if($_GET['page'] == "admin/view/pamflet_pic"){
		$link_search = "admin.php?page=".$_GET['page']."&publication_id=".$_GET['publication_id'];
	}elseif($_GET['page'] == "admin/view/brosur_pic"){
		$link_search = "admin.php?page=".$_GET['page']."&publication_id=".$_GET['publication_id'];
	}elseif($_GET['page'] == "admin/view/investment_guide"){
		$link_search = "admin.php?page=".$_GET['page']."&ig_type=".$_GET['ig_type'];
	}elseif($_GET['page'] == "admin/view/investment_guide_item"){
		$link_search = "admin.php?page=".$_GET['page']."&ig_id=".$_GET['ig_id'];
	}else{
    	$link_search = "admin.php?page=".$_GET['page'];
	}
	?>
    <form name="form1" method="post" enctype="multipart/form-data" action="<?php echo $link_search; ?>" class="form">
   
     <input name="search_button" value="" class="search_icon" type="submit" >
               
     <input name="search_field" id="search_field" type="text" class="search_field" onfocus="if(this.value=='Cari disini'){this.value='';}" onblur="if(this.value==''){this.value='Cari disini';}" value="Cari disini">
    </form>
    </div>
    </td>
  </tr>
</table>
</div>
<div class="judul_content">
<?php
       $j1 = $_GET['page'];
	   $j2 = explode("/", $j1);
	   $j3 = explode("_", $j2[2]);
	   $judul = '';
	   for($k = 0; $k < count($j3); $k++){
		   $judul .= " ".$j3[$k]; 
	   }

	   $judul = str_replace("news",'berita',$judul);
	   $judul = str_replace("berita menu",'menu',$judul);
	   $judul = str_replace("menu bidang",'berita bidang',$judul);
	   $judul = str_replace("city",'kabupaten / kota',$judul);
	   $judul = str_replace("berita bidang2",'berita bidang',$judul);
	   $judul = str_replace("berita kabupaten / kota2",'berita kabupaten / kota',$judul);
	   $judul = str_replace("buku biru",'potensi dan peluang investasi jawa timur',$judul);
	   //$judul = str_replace("investment guide",'panduan investasi',$judul);
	   $_GET['ig_type'] = (isset($_GET['ig_type'])) ? $_GET['ig_type'] : '';
	   if($_GET['ig_type'] == 1){ $judul = "Negative Investment List"; }else 
	   if($_GET['ig_type'] == 2){ $judul = "Langkah-Langkah Investasi"; }else 
	   if($_GET['ig_type'] == 3){ $judul = "Hukum dan Regulasi"; }else
	   if($_GET['ig_type'] == 4){ $judul = "Pajak"; }else
	   if($_GET['ig_type'] == 5){ $judul = "Form Aplikasi"; } 
	   
	   echo strtoupper($judul);
	  // echo "Judul Content";
	   ?>
</div>
<div class="content">
   <?php
      function MyInclude($file) {
        if(file_exists($file)) {
           require_once($file);
        } else {
            throw(new Exception('Halaman tidak ditemukan'));
        }
    }
          
		  
						   $page = (isset($_GET['page'])) ? $_GET['page'] : 'admin/view/news';
						  if($page){
							  try{
						  	MyInclude($page.".php");
										  		}
									catch(Exception $e){
										echo "<div class=\"judul\">".$e->getMessage()."</div>";
										
										}
						  } else {
							if($_SESSION['user_type_type'] == 0){
								$link_content = "admin/view/news.php";
							}else if($_SESSION['user_type_type'] == 1){
								$link_content = "admin/view/news_menu_bidang2.php";
							}else if($_SESSION['user_type_type'] == 2){
								$link_content = "admin/view/news_city2.php";
							}else{
								$link_content = "admin/view/news.php";
							}
						  	require_once($link_content);
						  }
						?>
</div>
