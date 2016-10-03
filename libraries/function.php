<?php
class Mysql{
	private $result;
//------------------------------------------------------CONNECT-------------------------------------------------------
	function connect($host,$user,$pass,$db){
		if($que = mysql_connect($host,$user,$pass)){
			if(mysql_select_db($db,$que)){	
		return true;
				} else echo ucfirst("db error");
		} else echo ucfirst("server error");
	}	
//------------------------------------------------------SELECT-------------------------------------------------------	
	function run($query){
		return mysql_query($query);
	}
	function select($table,$field,$criteria=null,$limit=null){
		if(is_null($criteria)){
			$que = "select $field from $table $limit";     
		}else{
			$que = "select $field from $table where $criteria $limit";
		}
		return mysql_query($que);
	}
	
	function fetch_array($que){
		return mysql_fetch_array($que);
	}
	function fetch_object($que){
		return mysql_fetch_object($que);
	}
	function select_fetch_object($table,$field,$criteria=null,$limit=null){
		if(is_null($criteria)){
			$que = "select $field from $table $limit";     
		}else{
			$que = "select $field from $table where $criteria $limit";
		}
		
		$result = mysql_query($que);
		
		return mysql_fetch_object($result);
	}
//-----------------------------------------------------SELECT MAX--------------------------------------------------------
	function select_max($table,$field,$criteria=null,$limit=null){
		if(is_null($criteria)){
			$que = "select max($field) as $field from $table $limit";     
		}else{
			$que = "select max($field) as $field from $table where $criteria $limit";
		}
		return mysql_query($que);	
	}
//-----------------------------------------------------INCLUDE-----------------------------------------------------------
	function MyInclude($file){
		if(file_exists($file)){
			require_once($file);
		}else{
			throw(new Exception('Page Not Found'));
		}
	}
//-----------------------------------------------------INSERT------------------------------------------------------------
	function save($table,$value){
		$que = "insert into $table values $value";
		return mysql_query($que);
	}
//------------------------------------------------------EDIT--------------------------------------------------------------
	function edit($table,$value,$criteria){
		$que = "update $table set $value where $criteria";
		return mysql_query($que);
	}
//-----------------------------------------------------DELETE------------------------------------------------------------
	function delete($table,$criteria){
		$que = "delete from $table where $criteria";
		return mysql_query($que);
	}
//-----------------------------------------------------LOGIN------------------------------------------------------------
	function login($table,$username,$password,$session){
		$que = mysql_query("select * from $table where $username and $password");
		if($que > 0){
			$t = count($session);
			for($i=0; $i<=$t; $i++){
				$r = $session[$i];
				$y = explode("=",$r);
				$_SESSION[$y[0]] = $y[1];
			}
		}
		return mysql_query($que);
	}
//-----------------------------------------------------LOGOUT-----------------------------------------------------------
	function logout($session){
		$t = count($session);
		for($i=0; $i<=$t; $i++){
			$r = $session[$i];
			unset($_SESSION[$r]);
		}
	}
	
//-----------------------------------------------------COUNT DATA-----------------------------------------------------------

	
	

}
?>