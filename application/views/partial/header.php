<?php protect_page(); ?>
<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Skylark 2.0</title>
	
	<?php //link_tag("assets/css/bootstrap.min.css") ?>
	<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css')?>" >
	<link rel="stylesheet" href="<?=base_url('assets/css/font-awesome.min.css')?>" >
	<link rel="stylesheet" href="<?=base_url('assets/css/jquery-ui.css')?>" >
	<link rel="stylesheet" href="<?=base_url('assets/css/dataTables.jqueryui.min.css')?>" >
	<link rel="stylesheet" href="<?=base_url('assets/css/sweetalert.css')?>" >
	<link rel="stylesheet" href="<?=base_url('assets/css/custom.css')?>" >
  
  <link rel="stylesheet" href="<?=base_url()?>public/ext/select2/select2.min.css">
  <script src='<?=base_url('assets/js/jquery-3.3.1.min.js')?>'></script>
  <script src='<?=base_url('public/js/main.js')?>'></script>
  <script src="<?=base_url()?>public/ext/select2/select2.min.js"></script>
  <script src='<?=base_url('public/js/notif.js')?>'></script>
  

	
</head>
<?php 

$menus = [
    "system"=>[
      "users"=>["auth/index"],
      "training_checklist"=>["doctor/training"],
      "logout",
    ],

    "services"=>[
      "clinic"=>["screening/dashboard"],
      "pharmacy"=>["pharmacy"],
      "optical"=>["optical"],
      "cashier"=>["finance"],
    ],

    "inventory"=>[
      "items"=>["finance/items"],
      "requisition"=>["items/requisition"],
    ],

    // "data reports"=>["patient","inventory","finance","employee",],
  ];




?>
<!-- background:#563d7c -->
<div id="navbars d-print-none" >
<nav class="navbar navbar-expand-lg navbar-dark  navbar-default" style="">
  <a class="navbar-brand " href="<?=site_url("/")?>">
  <h2 class='text-light'>
  <img src="<?=base_url('assets/images/bird.png')?>" alt="" style='width:50px; float: inline-start;'>
    <div class="font-weight-light pull-right pt-2">LFC</div>
   </h2></a>
  <button class="navbar-toggler" type="link" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <li class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <?php foreach($menus as $group=>$list): ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" style='color:#aaa' href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?=rxx($group,2)?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <?php foreach($list as $k=>$items): ?>
      <?php if(is_array($items)): $url=current($items); ?>
          <a class="dropdown-item" href="<?=base_url($url)?>"><?=ucwords(strtolower($k))?></a>
      <?php else: ?>
          <a class="dropdown-item" href="<?=base_url($items)?>"><?=ucwords(strtolower($items))?></a>
      <?php endif ?>
      <?php endforeach; ?>
        </div>
      </li>
  <?php endforeach; ?>
    </ul>


  <form class="form-inline my-2 my-lg-0">
    <div class="dropdown nav-item">
    <a id="dropdownBasic2" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle" aria-expanded="false">
      <i class="fa fa-bell text-light"></i>
      <span class="notification badge badge-pill badge-warning">4</span>
    </a>
                          
      <div class="notification-dropdown dropdown-menu dropdown-menu2 dropdown-menu-right" style="min-width: 350px;">
          <div class="" data-ps-id="">
            <a class="dropdown-item noti-container py-3 border-bottom border-bottom-blue-grey border-bottom-lighten-4">
              <i class="fa fa-bell float-left text-dim d-block mt-1 mr-2"></i>
              <span class="d-block font-weight-bold text-secondary">
                New User Registered
                </span>
              <span class="noti-text">
                Lorem ipsum dolor sit ametitaque in
              </span></span>
            <a href='<?=base_url("user/inbox")?>' class="text-center d-block">Read All Notifications</a>
        </div>
      </div>
      </div>




      <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
      <a href="<?=base_url('auth/logout')?>" class="text-light mr-2" id="logout"><i class='fa fa-sign-out'></i> Logout</a>
    </form>
  </div>

<style>
#logout:hover {
  color:orange !important;
  font-weight:bolder;
}
</style>
<?php 


  $mx = [];

  switch(strtolower($this->uri->segment(1))){
    case "finance" : 
      $mx = [
        'finance/index'=>'DASHBOARD',
        'finance/transactions'=>'TRANSACTIONS',
        'finance/items'=>'ITEMS',
      ];
      break;
    case "patient" : 
      $mx = [
        'patient/profile'=>'PROFILE',
        'patient/svc/prescription'=>'PRESCRIPTION',
        'patient/svc/diagnosis'=>'DIAGNOSIS',
        'patient/svc/billing'=>'BILLING',
      ];
      break;
    case "auth" : 
      $mx = [
        'systems/admin'=>'DASHBOARD',
        'auth'=>'USERS',
        'auth/create_group'=>'GROUPS',
        'auth/create_group'=>'GROUPS',
        'systems/access_control'=>'ACCESS CONTROL',
      ];
      break;
    case "systems" : 
      $mx = [
        'auth'=>'USERS & GROUPS',
        'systems/audit_trail'=>'LOGS',
      ];
      break;

    default : 
      $mx = [
        '/'=>"DASHBOARD",
        'finance/index'=>"SALES LIST",
        // 'cbcmstat'=>"CBM STATISTICS",
      ]; 
      break;
  }

  $middleroutes = $mx;


?>


</nav>
    <div class="omenu d-print-none" id="omenu" >
      <ul id="omul" style="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-1">
        <?php foreach($middleroutes as $link=>$text) :?>
        <li id='oml'><a href="<?=base_url($link)?>"><?=$text?></a></li>
        <?php endforeach;?>
        <li id='' class='pull-right pr-2 '><a class="text-warning" href="<?=base_url("auth/edit_user/".$this->session->user_id)?>">: : <?=ucase($this->session->username)?></a></li>
        <span class="pull-right pr-3 text-light" id='memo'></span>
      </ul>
    </div>
  </div>

</div>
<div class="mb-5 clearfix">

<div id="pushnotif" class="">

</div>


<body id='skylark'>
<div class="m-3 ">


<style>

.dropdown-menu-right {
    left: auto !important;
    right: 0;
}

.navbar-default {
  /* #gradient > .horizontal-three-colors(red;white;50%;blue); */
background:#8a0685
}


</style>