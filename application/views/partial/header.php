<?php protect_page(); ?>
<!DOCTYPE html>
<html lang="en" >
  <?php echo $meta ?>

  <div id="navbars d-print-none" >
    <nav class="navbar navbar-expand-lg navbar-dark  navbar-default" >
      <a class="navbar-brand " href="<?=site_url("/")?>">
        <h2 class='text-light'>
          <img src="<?=base_url('assets/images/bird.png')?>" alt="" style='width:50px; float: inline-start;'>
            <div class="font-weight-light pull-right pt-2">LFC</div>
        </h2>
      </a>
      <button class="navbar-toggler" type="link" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- start menu list -->   
        <?php echo $menulist?>   
      <!-- end menu list -->


      <form class="form-inline my-2 my-lg-0">
          <!-- start notifications -->  
            <?php echo $notifications?>      
          <!-- end notifications -->  
          <a href="<?=base_url('auth/logout')?>" class="text-light mr-2" id="logout"><i class='fa fa-sign-out'></i> Logout</a>
        </form>

      </div>
    </nav>
    <!-- start black menus -->     
      <?php echo $lowermenus?>     
    <!-- end black menu --> 
    </div>

  </div>
  <div class="mb-5 clearfix">

  <!-- start push-notifications  --> 
    <div id="pushnotif" class=""></div>  
  <!-- end push-notifications  -->



  <!-- 
    ========================================================================
                              BEGIN SKYLARK BODY
    ========================================================================
  -->


  <body id='skylark'>
    <div class="m-3 ">