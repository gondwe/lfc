
<?php 

$menus = [
    "SYSTEM"=>
      [
      "ACCOUNT",
      "USERS",
      "TRAINING CHECKLIST",
      "LOGOUT",
    ],
    "SERVICES"=>
      [
      "CLINIC",
      "PHARMACY",
    ],
    "INVENTORY"=>
      [
      "ITEMS",
      "REQUISITION",
    ],
    "DATA REPORTS"=>
      [
      "PATIENT",
      "INVENTORY",
      "FINANCE",
      "EMPLOYEE",
    ],
  
]

?>
<!-- background:#563d7c -->
<div id="navbars">
<nav class="navbar navbar-expand-lg navbar-dark  navbar-default " style="background:#8a0685">
  <a class="navbar-brand " href="<?=site_url("/")?>"><h2 class='text-light'>LFC
    <!-- <img alt="LFC"  style="width:150px" src='<?=image(getlist("select * from settings")->logo, "settings")?>' > -->
  </h2></a>
  <button class="navbar-toggler" type="link" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <?php foreach($menus as $group=>$list): ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" style='color:#aaa' href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?=rxx($group)?>
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
      <a href="#logout" class="btn btn-squared text-light mr-2"><i class='fa fa-sign-out'></i> Logout</a>
    </form>
  </div>

</nav>
    <div class="omenu " id="omenu" >
      <ul id="omul" style="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-1">
        <li id='oml'><a href="#optical">OPTICA</a>L</li>
        <li id='oml'><a href="#payments">SALES LIST</a></li>
        <li id='oml'><a href="#cbmstat">CBM STATISTICS</a></li>
        <span class="pull-right pr-3 text-light" id='memos'></span>
      </ul>
    </div>
  </div>

</div>
<!-- <div class="toprow"></div> -->
    <!-- </body> -->
    


    <script>
            // When the user scrolls the page, execute myFunction 
        window.onscroll = function() {myFunction()};

        // Get the navbar
        var navbar = document.getElementById("navbars");

        // Get the offset position of the navbar
        var sticky = navbar.offsetTop;

        // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
        function myFunction() {
          if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
          } else {
            navbar.classList.remove("sticky");
          }
        }
    </script>