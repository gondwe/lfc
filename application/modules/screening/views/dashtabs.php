<?php 
// pf($clinics);
$cltype = $clinics["clinic_types"];
$cat = $clinics["category_count"];
?>
<div class="rowd">
<div class="col-md-6 col-sm-6 col-lg-4 col-xs-12 pull-left">
    <!-- <div class="card" style="width: 18em;"> -->
        <div class="card-body">
          <h5 class="card-title"></h5>
          <ul class="">
            <p class="alert bg-light">
            <?php foreach($cltype as $k=>$c) : ?>
            <a href="<?=base_url("patient/section/".$k)?>" class="btn <?=$k=="1"? "btn-primary" : "alert-dark" ?> btn-block btn-sm text-left">
            <?=$c?> <span class="badge badge-secondary pull-right mt-1"><?=$cat[$c]?></span>
            </a>
            <?php endforeach; ?>
            
            <button class="btn btn-default btn-block btn-sm text-left">
            <strong>Total</strong> <span class="mt-1 badge badge-primary pull-right"><?=array_sum($cat)?></span><br>
            </button>
            </p>
          </ul>
          <!-- <h6 >Private<span class="pull-right badge text-success">30</span></h6> -->
          <!-- <h6 class="card-title">Total</h6> -->

        <!-- <a href="#payments" class="btn btn-primary form-control">NEW PATIENT</a> -->
      <!-- </div> -->
    </div>
  </div> 
<div class="col-md-6 col-sm-6 col-lg-4 col-xs-12 pull-left">
    <!-- <div class="card" style="width: 18em;"> -->
        <div class="card-body">
          <h5 class="card-title text-danger"></h5>
          <ul class="">
            <p class="alert bg-light">
            <button class="btn btn-dark btn-block btn-sm text-left">
            MOBILE WORKSPACE
              &nbsp
            </button>
            <button class="btn btn-secondary btn-block btn-sm text-left">
              <!-- NEW PATIENT -->
            &nbsp
            </button>
            <button class="btn btn-default btn-block btn-sm text-left">
            &nbsp
            <!-- <strong>Total</strong> <span class="mt-1 badge badge-primary pull-right">15</span><br> -->
            </button>
            </p>
          </ul>
      
    </div>
  </div> 
<div class="col-md-6 col-sm-6 col-lg-4 col-xs-12 pull-left">
    <!-- <div class="card" style="width: 18em;"> -->
        <div class="card-body">
          <h5 class="card-title text-danger"></h5>
          <ul class="">
            <p class="alert bg-light">
            <a href="<?=base_url('patient/new')?>" class="btn btn-primary btn-block btn-sm text-left">
              NEW PATIENT
            </a>
            <a href="<?=base_url('screening/osod')?>" class="btn alert-primary btn-block btn-sm text-left">
            Screening
            </a>
            <a href="<?=base_url('patient/discharge')?>" class="btn alert-danger btn-block btn-sm text-left">
              Discharge
            <span class="mt-1 badge badge-primary pull-right">15</span><br>
            </a>
            </p>
          </ul>
          <!-- <h6 >Private<span class="pull-right badge text-success">30</span></h6> -->
          <!-- <h6 class="card-title">Total</h6> -->

        <!-- <a href="#payments" class="btn btn-primary form-control">NEW PATIENT</a> -->
      <!-- </div> -->
    </div>
  </div> 
  </div> 

<div class="row"></div>