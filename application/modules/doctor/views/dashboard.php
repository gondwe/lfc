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

    <div class="col-md-6 col-sm-6 col-lg-4 col-xs-12 pull-left text-center mb-3">
        <div class="">
            
            <div class="card-body mt-2">
            <div class="row">
              <a href="<?=base_url('patient/svc/prescription')?>" class="btn btn-success btn-sm btn-block text-center">
                PRESCRIPTION
              </a>
              <a href="<?=base_url('patient/svc/diagnosis')?>" class="btn btn-primary btn-sm btn-block text-center">
                DIAGNOSIS
              </a>
              <a href="<?=base_url('patient/svc/diagnosis')?>" class="btn alert-danger btn-sm btn-block text-center">
                QUEUE STATUS
              </a>
            
            
            </div>  
            </div>
        </div> 
    </div>




<div class="row"></div>
<hr>

<?php   $this->load->view("theatrelist");  ?>


<style>
  a.text-light:hover { color: #9f1212 !important;  }
  a {  text-decoration:none !important; }
</style>