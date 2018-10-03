<?php


// pf($patient);
$p = current($patient);

?>
<div class="m-4">
<h5 >Patient Booking : <span class='badge badge-default'>
<h4 class='text-primary'><?=rxx($p->patient_names)?> | pNo.<?=pno($p->id)?></h4>

</span> </h4>
<hr>

<form action="<?=base_url('doctor/book')?>" method="post" class="row">

<div class="section col-lg-4 col-md-6 col-sm-12">


    <div class="input-group mb-3">
    <select class="custom-select" id="inputGroupSelect01">
        <option selected>SELECT...</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
    <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">SURGEON</label>
    </div>
    </div>
    
    
    <div class="form-group">
        <!-- <label for="">DATE</label>
        <input type="date" name="date" id="" class="form-control">
    </div> -->

        <!-- <div class="col-md-4 mb-3"> -->
      <!-- <label for="validationCustomUsername">Username</label> -->
      <div class="input-group">
        <input type="date" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">DATE</span>
        </div>
      </div>
    </div>

    <div class="input-group mb-3">
    <select class="custom-select" id="inputGroupSelect01">
        <option selected>SELECT...</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
    <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">PROCEDURE</label>
    </div>
    </div>


<div class="form-group ">
                <!-- <label for="">EYE</label> -->
                <ul class="list-inline alert bg-light">
                    <li class="list-inline-item">
                        <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
                        <label class="custom-control-label" for="customControlValidation1">RIGHT EYE</label>
                        </div>
                    </li>
                <li class="list-inline-item pull-right">
                    <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customControlValidation2" required>
                    <label class="custom-control-label" for="customControlValidation2">LEFT EYE</label>
                    </div>
                </li>
                </ul>
            </div>

    
</div>
        <div class="pull-right section col-lg-4 col-md-6 col-sm-12">
        

        <div class="form-group">
            <textarea name="notes" id="" cols="30" rows="6" placeholder="notes" class="form-control"></textarea>
        </div>
        
    <button class="btn btn-primary btn-block text-left pull-right">BOOK PATIENT</button>

    </div>
    </div>
    <div class="m-4">
<h5>Upcoming Appointments</h5>
<hr>
<div class="row row-striped">
    <div class="col-md-2 col-xs-12 col-sm-6 col-lg-1">
        <h1 class="display-4"><span class="badge badge-warning"> 23</span></h1>
        <h4 class='ml-2'>OCT</h4>
        
    </div>
    <div class="col-10">
        <h3 class="text-uppercase"><strong></strong></h3>
        <a href="" class="btn btn-secondary btn-sm">Patients <span class="badge badge-pill badge-light">30</span></i></a>
        
        
        <ul class="list-inline">
            <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> Monday</li>
            <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> 8:30 AM - 5:00 PM</li>
            <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> In Base</li>
        </ul>
        <p><strong class='text-secondary'> Doctors on schedule</strong>
            <span class="badge text-info bg-light badge-pill"> Dr. Matende</span>
            <span class="badge text-info bg-light badge-pill"> Dr. Korir</span>
            
        <br>
        <strong class='text-secondary'>Procedures </strong>
            <span class="badge badge-info">Incision and Drainage</span>
            <span class="badge badge-info">FB Removal</span>
            <span class="badge badge-info">Suture Removal</span>
        </p>
        <a href="<?=base_url('doctor/queue/'.$p->id)?>" class="btn btn-outline-primary btn-sm">ENQUEUE</a>
        <a href="<?=base_url('doctor/theatrelist/'.$p->id)?>" class="btn btn-success btn-sm">VIEW THEATRE LIST</a>
    </div>
</div>

<hr>
<div class="row row-striped">
    <div class="col-md-2 col-xs-12 col-sm-6 col-lg-1">
        <h1 class="display-4"><span class="badge badge-warning"> 23</span></h1>
        <h4 class='ml-2'>OCT</h4>
        
    </div>
    <div class="col-10">
        <h3 class="text-uppercase"><strong></strong></h3>
        <a href="" class="btn btn-secondary btn-sm">Patients <span class="badge badge-pill badge-light">30</span><i class="ml-2 text-light fa fa-calendar"></i></a>
        
        <a href="" class="btn btn-info btn-sm pull-right">THEATRE LIST</a>
        <ul class="list-inline">
            <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> Monday</li>
            <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> 8:30 AM - 5:00 PM</li>
            <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> In Base</li>
        </ul>
        <p><strong class='text-secondary'> Doctors on schedule</strong>
            <span class="badge text-info bg-light badge-pill"> Dr. Matende</span>
            <span class="badge text-info bg-light badge-pill"> Dr. Korir</span>
            
        <br>
        <strong class='text-secondary'>Procedures </strong>
            <span class="badge badge-info">Incision and Drainage</span>
            <span class="badge badge-info">FB Removal</span>
            <span class="badge badge-info">Suture Removal</span>
        </p>
        <a href="<?=base_url('doctor/queue/'.$p->id)?>" class="btn btn-outline-primary btn-sm">ENQUEUE</a>
    </div>
</div>
<hr>
