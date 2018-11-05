<?php 
// pf($clinics);

$today = fetch("select count(id) from patient_master where date = date(current_timestamp)");
$cltype = $clinics["clinic_types"];
$cat = $clinics["category_count"];
?>
<div class="rowd">

    <div class="col-md-6 col-sm-6 col-lg-4 col-xs-12 pull-left text-center mb-3">
        <div class="">
            <div class="card-title p-1 bg-dark text-light">
                PATIENTS THIS MONTH
            </div>
            <div class="card-body bg-warning">
                <h1 class="font-weight-bold text-light">
                <a class='text-light' href="<?=base_url('patient/section/1')?>">
                <small class="font-weight-light h5">General</small > <?=$cat[current($cltype)]?>
                </a>
                |
                <a class='text-light' href="<?=base_url('patient/section/2')?>">
                <?=$cat[end($cltype)]?> <small class="font-weight-light h5">Private</small>
                </a>
                </h1>
                <div class="card-text font-weight-light">Registered Patients Today <span class="font-weight-bold"><?=$today?></span></div>
                <!-- <a href="#" class="btn btn-primary btn-sm  ml-3">View Txns</a> -->
            </div>
        </div> 
    </div>



    <div class="col-md-6 col-sm-6 col-lg-4 col-xs-12 pull-left  mb-3">
        <div class="">
            <div class="card-title p-1 bg-dark text-light text-center">
                PNO GENERATOR
            </div>
            <div class="card-body bg-dark">
                <!-- <div class="font-weight-bold text-light">NEW PATIENT</div> -->
                <h1 class="pt-3 text-center text-danger font-weight-bold"><?=autogen()?>/18</h1>
            <!-- <a href="<?=base_url('patient/discharge')?>" class="pull-right mr-3 text-left">DISCHARGED <span class="mt-1 badge badge-primary pull-right">15</span></a> -->
               
            </div>
        </div> 
    </div>




    <div class="col-md-6 col-sm-6 col-lg-4 col-xs-12 pull-left  mb-3">
        <div class="">
            <div class="card-title p-1 bg-dark text-light text-center">
                ACTIONS TAB
            </div>
            <div class="card-body bg-light">
                <!-- <div class="font-weight-bold text-light">NEW PATIENT</div> -->
                <div class="bg-brown p-1 pl-2">
            <a href="<?=base_url('patient/new')?>" class="text-light xy"> NEW PATIENT <i class="fa fa-plus text-warning"></i></a>
                </div>
                <div class="bg-blue p-1 pl-2">
            <a href="<?=base_url('screening/osod')?>" class="text-light">SCREENING</a>
                </div>
                <div class="bg-brown p-1 pl-2">
            <a href="<?=base_url('chaplain')?>" class="text-light">CHAPLAIN</a>
                </div>
               
            </div>
        </div> 
    </div>





  </div> 

<div class="row"></div>



<style>
  .card-heading bg-dark text-light p-1 {
      padding: 2px;
      padding-left: 10px;
  }

  .card-body {
    padding:0px !important;
  }

  .card-hash {
      margin-bottom:15px;
  }
  .bg-orange{ background:gold }
  .bg-blue{ background:#1a7ee8 }
  .bg-blue:hover{ background:teal;color:#fff !important; }
  .bg-brown:hover{ background:teal;color:#fff !important; }
  .bg-rebecca{ background:darkorange; }
  .bg-brown{ background:dodgerblue; }

  a {
      text-decoration:none !important;
  }

  a.text-light:hover {
    color: #9f1212 !important;
}

</style>