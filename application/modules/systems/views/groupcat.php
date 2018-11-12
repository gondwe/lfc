<?php 


echo topic('group_categories', 1);


?>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">GROUP ACCESS LISTS</a>
  </li>

</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <?php $this->load->view('gal') ?>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  
  </div>
</div>



<style>
     a#home-tab.nav-link:hover,a#profile-tab.nav-link:hover { 
         color:red !important;
    }
</style>

