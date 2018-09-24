<?php

	function db(){	$db = new mysqli(host,usr,pwd,database);if($db->connect_errno > 0){die(spill($db->connect_error));}else{return $db;}}
	function clean($i){ return mysqli_real_escape_string(db(), $i);}
	function spill($i){echo "<pre>";print_r($i);echo "</pre>";}function pf($i){spill($i);}
 	function run($a){return process($a);}
	function process($sql){ $db = db(); $_SESSION["erc"] = $j = ($db->query($sql))? TRUE :FALSE; if(!$j) spill($db->error); return $j; }  
	function process2($sql){$db = db();if($d = $db->query($sql)){$j = TRUE; }else{ spill($db->error);$j = FALSE;}$_SESSION["erc"] = $j;return $d;}
	function get($i=""){if($i !== ""){$l = []; $j = process2($i); while($k = $j->fetch_object()){ $l[] = $k; } return $l; } } 
	function getlist($i){$raw = get($i);if(empty($raw)){ return []; }else{ if(count((array)$raw[0])==2){ foreach($raw as $j=>$k){$l[current($k)] = end($k);}} else{ if(count((array)$raw[0])>2){ foreach($raw as $j=>$k) { $l[$j] = $k; }}else{ foreach($raw as $j=>$k) { foreach($k as $m=>$n): $l[] = $n; endforeach;} } }} if(count((array)$l) == 1){ $l = current($l); } return $l; }
	function fetch($i){$a = get($i);$b = isset($a[0])?$a[0] : [];$c = current($b);return $c;}

	/* global vars */
	$err = "";
	$user = isset($_SESSION["hms"])? $_SESSION["hms"] : [];
	$sid = loggedin()? $user->scode : null;
	$page = $_SERVER["PHP_SELF"]; $page = explode("/",$page); $mypage = end($page);
	$authpages = ["login.php","storage.php","signup.php","register.php", "forgot.php"];
	if(!isset($_SESSION["hms"]) && !in_array($mypage,$authpages)) header("location:login.php");
	if(isset($_SESSION["hms"])) $uid = $user->id; 

	function site_url($path){ return base_url.$path; }function base_url($path){ return site_url.$path; }

	function rx($i,$j=0){$i = strtolower($i); $i = preg_replace("/[ \/]/","_",$i); return $j ? strtoupper($i):ucwords($i);}
	function rxx($i){return ucwords(str_replace("_"," ", strtolower($i)));}
	
	function am_i_logged_in(){ if(loggedin()) header("location:./#"); }
	function loggedin(){ return isset($_SESSION["hms"])?true : false ; }
	function login($u,$p)
	{
		global $err;
		$found = fetch("select count(id) from users where username = '$u' ");
		if($found){
			$sql = fetch("select password from users where username = '$u' ");
			if(password_verify($p,$sql)){
				$err =  "Welcome";
				$user = getlist("select * from users where username = '$u' ");
				$_SESSION["hms"] = $user;
				header("location:./#");
			}else{
				$err =  "Password Incorect!";
			}
		}else{
			$err =  "User Not Found!";
		}
	}

	function insert($t){
		$f = implode("`,`",array_keys($_POST));
		$v = implode("','",array_values($_POST));
		$sql = "insert into $t (`$f`) values('$v')";
		if(process($sql)){
			$r = fetch("select max(id) from $t");
			savefiles($t, $r);
			return "Save Successful";
		}
		
	}


	function savefiles($t, $r){
		if(!empty($_FILES)){
			// spill($_FILES);
			foreach($_FILES as $i=>$j){
				$p = save_pic($t,$i);
				if($p !== ""){
					$sql = "update $t set `$i` = '$p' where id = $r";
					process($sql); 
				}
			}
		}
	}



	function save_pic($table, $fldname, $type=1){

		$uploads = '../img';
		$trailer = "";
		$files=$_FILES;

		$time = microtime(1)*10000;
		$name =$files[$fldname]['name'];
		if($name !== ''){
		
		$esx = explode(".",$name);
		$esx = end($esx);
		$extension = strtolower($esx);		
		$allowed = $type == 1 ? ['jpg','jpeg','png',] : ['jpg','jpeg','png','txt','doc','docx','ppt','pptx','xls','xlsx','accdb','mdb','pdf'];
		if(in_array($extension,$allowed)){		
		$location =$uploads."/".$table."/";
		if (!@mkdir($location, 0777)) {$dh = opendir($location);closedir($dh);}		
		if(move_uploaded_file($files[$fldname]['tmp_name'],$location.$name))
		{   $trailer = $time.".".$extension;rename($location.$name, $location.$trailer);	}
		else{echo("Upload Fail! : ".$location.$name);}
		}else{ echo("Incorrect file format :.".$extension); }}
		return $trailer;
		
	}


	function image($url,$tbl=null){
		$tbl = is_null($tbl)? null : $tbl."/";
		return site_url("/img/$tbl".$url);
	}

	function get_params(){
		$p = $_SESSION["params"];array_shift($p);return $p;
	}

		
	function datalog($op){
		global $user;
		$h = fopen("lfclogs.txt","a");
		fputs($h, date("d/m/YG:i:s").",OP:".$op.",Acc:".$user->username.";");
		fclose($h);
	}

	function code($i){
		echo "<code>$i</code></br>";
	}

	// spill(time());

	//end of modular function
	
