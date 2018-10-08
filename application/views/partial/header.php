<?php protect_page(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>LFC MIS</title>
	
	<?php //link_tag("assets/css/bootstrap.min.css") ?>
	<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css')?>" >
	<link rel="stylesheet" href="<?=base_url('assets/css/font-awesome.min.css')?>" >
	<link rel="stylesheet" href="<?=base_url('assets/css/jquery-ui.css')?>" >
	<link rel="stylesheet" href="<?=base_url('assets/css/dataTables.jqueryui.min.css')?>" >
	<link rel="stylesheet" href="<?=base_url('assets/css/sweetalert.css')?>" >
	<link rel="stylesheet" href="<?=base_url('assets/css/custom.css')?>" >
  <script src='<?=base_url('assets/js/jquery-3.3.1.min.js')?>'></script>

	
</head>
<?php 

$menus = [
    "SYSTEM"=>["ACCOUNT","USERS","TRAINING CHECKLIST","LOGOUT",],
    "SERVICES"=>["CLINIC","PHARMACY",],
    "INVENTORY"=>["ITEMS","REQUISITION",],
    "DATA REPORTS"=>["PATIENT","INVENTORY","FINANCE","EMPLOYEE",],
  ];




?>
<!-- background:#563d7c -->
<div id="navbars">
<nav class="navbar navbar-expand-lg navbar-dark  navbar-default " style="background:#8a0685">
  <a class="navbar-brand " href="<?=site_url("/")?>"><h2 class='text-light'>LFC
   </h2></a>
  <button class="navbar-toggler" type="link" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <?php foreach($menus as $group=>$list): ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" style='color:#aaa' href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?=rxx($group,2)?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <?php foreach($list as $items): ?>
          <a class="dropdown-item" href="#<?=strtolower(rx($items))?>"><?=ucwords(strtolower($items))?></a>
      <?php endforeach; ?>
        </div>
      </li>
  <?php endforeach; ?>

          <!-- <div class="dropdown-divider"></div> -->
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
      <a href="<?=base_url('auth/logout')?>" class="btn btn-squared text-light mr-2"><i class='fa fa-sign-out'></i> Logout</a>
    </form>
  </div>

</nav>
    <div class="omenu " id="omenu" >
      <ul id="omul" style="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-1">
        <li id='oml'><a href="#optical">OPTICA</a>L</li>
        <li id='oml'><a href="#payments">SALES LIST</a></li>
        <li id='oml'><a href="#cbmstat">CBM STATISTICS</a></li>
        <span class="pull-right pr-3 text-light" id='memo'></span>
      </ul>
    </div>
  </div>

</div>
<div class="m-3">
<!-- <div class="toprow"></div> -->
    <!-- </body> -->
    
<?php 

// pf([]);


?>