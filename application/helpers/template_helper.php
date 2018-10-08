<?php
defined('BASEPATH') OR exit('No direct script access allowed');



function serve($view, $data=[]){
	$ci = &get_instance();
	$ci->load->view("partial/header");
	$ci->load->view($view,$data);
	$ci->load->view("partial/footer");
}

function render($a,$b=null){ serve($a,$b);}

function dbx(){	$ci = & get_instance(); return $ci->db; } 
	function clean($i){ return mysqli_real_escape_string(dbx(), $i);}
	function spill($i){echo "<pre>";print_r($i);echo "</pre>";}function pf($i){spill($i);}
 	function run($a){return process($a);}
	function process($sql){ $db = dbx(); $_SESSION["erc"] = $j = ($db->query($sql))? TRUE :FALSE; if(!$j) spill($db->error); return $j; }  
	function process2($sql){$db = dbx();if($d = $db->query($sql)){$j = TRUE; }else{ spill($db->error);$j = FALSE;}$_SESSION["erc"] = $j;return $d;}
	function get($i=""){if($i !== ""){$l = []; $j = process2($i); return $j->result_object();  } } 
	function gl($i,$p=null){$raw = get($i);if(empty($raw)){ return []; }else{ 
		if(count((array)$raw[0])==2){
		 foreach($raw as $j=>$k){$l[current($k)] = end($k);}} else{ 
			 if(count((array)$raw[0])>2){ 
				 foreach($raw as $j=>$k) { 
					if($p) { $l[current($k)] = $k; }else{ $l[$j] = $k; }
					}}else{ 
						 foreach($raw as $j=>$k) { 
							 foreach($k as $m=>$n): $l[] = $n; endforeach;} } }} if(count((array)$l) == 1){ $l = current($l); } return $l; }
	function fetch($i){$a = get($i);$b = isset($a[0])?$a[0] : [];$c = current($b);return $c;}

	/* global vars */
	$err = "";
	$user = isset($_SESSION["hms"])? $_SESSION["hms"] : [];
	$sid = loggedin()? $user->scode : null;
	$page = $_SERVER["PHP_SELF"]; $page = explode("/",$page); $mypage = end($page);
	$authpages = ["login.php","storage.php","signup.php","register.php", "forgot.php"];
	if(isset($_SESSION["hms"])) $uid = $user->id; 

	function rx($i,$j=0){$i = strtolower($i); $i = preg_replace("/[ \/]/","_",$i); return $j ? strtoupper($i):ucwords($i);}
	function rxx($i,$j=0){$k = str_replace("_"," ", strtolower($i)); return $j? strtoupper($k):ucwords($k);}
	
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
			success("Save Successful");
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
		code("logging CRUD activity..\n");
		$id =$_SESSION["user_id"];
		$username = fetch("select username from users where id = '$id'");
		$h = fopen("assets/lfclogs.txt","a");
		fputs($h, date("d/m/YG:i:s").",OP:".$op.",Acc:".$username.";");
		fclose($h);
		code("Log successful\n");
		// echo("Press OK to Continue\n");
	}

	function code($i){ echo "<code>$i</code>"; }

	function protect_page(){ if(!isset($_SESSION["user_id"])) redirect("auth/logout"); }

	function age($d,$op=false){
		$p = (date_diff(date_create($d),date_create()));
		$dr = ["d"=>"days","y"=>"years","w"=>"weeks","m"=>"months","h"=>"hours","i"=>"minutes","s"=>"seconds"];
		if($op) return $p[$op];
		foreach($p as $k=>$v){
			if($v > 0) return $v." ".$dr[$k];
		}
	}

	function titles($t,$more = false, $btn=false){
		if(isset($_SERVER["HTTP_REFERER"])){
			$ref = $_SERVER["HTTP_REFERER"]; $here = $_SERVER["REQUEST_URI"];
			if($btn){
				$j = preg_match("*".$here."*",$ref,$c);
				if($j){$label = "BACK";}else{ $label = "CANCEL";$_SESSION['back'] = $ref;}
				$r = $_SESSION["back"];
			}
		
			echo "<h5 class='m-4 pull-left'>";
			echo proper($t)." <span class='text-primary'>".rxx($more)."</span>";
			if($btn) echo "<a href='".$r."' class='ml-3 mb-2 btn btn-sm btn-danger'>".$label."</a>";
			echo "</h5>";
		}else{
			echo "<h5 class='m-4 pull-left'>$t</h5>";
			
		}
	}
	

		
function ucase($i){
    return strtoupper($i);
}

function pno($i){
	return "<span class='text-danger'>".str_pad($i,4,"0", STR_PAD_LEFT)."</span>";
}

function pflink($id){
	$names = fetch("select patient_names from patient_master where id = '$id'");
	return "<a class='text-secondary' href='".base_url('patient/profile/'.$id)."'>".rxx($names)." | pNo.".pno($id)."</a>";
}

function topic($i){
	return "<h5 class='m-3 text-danger'> ".rxx($i)."</h5>";
}

function newbtn($a,$b=null,$c="ADD"){
	return '<a href="'.base_url($a).'" class="btn btn-sm btn-primary m-4" >'.$c.' '.rxx($b,2).' <i class="fa fa-plus"></i></a>';
}

function datef($d){
    return date_format(new DateTime($d),"D jS M, Y G:i:s A");
}

function success($msg){
	$_SESSION["infoh"] = $msg; 
	// die();
}
function warning($msg){
	
	$_SESSION["errorh"] = $msg; 
	// die();
// handle push
?>


<?php

}