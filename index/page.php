<!-- Content
================================================== -->
<div id="content">

<?php
     function MyInclude($file) {
        if(file_exists($file)) {
           require_once($file);
        } else {
            throw(new Exception('Halaman tidak ditemukan'));
        }
    }
          
		  
	$page = (isset($_GET['page'])) ? $_GET['page'] : '';
	if($page){
		try{
			MyInclude('index/'.$page.".php");
		}
		catch(Exception $e){
			echo "<div class=\"judul\">".$e->getMessage()."</div>";			
		}
	} else {
	  	require_once("index/home.php");
	}

	?>

</div>
<!-- Content / End -->