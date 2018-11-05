<div class="m-5">
<?php 

echo topic("Book Patient");
echo "<h2 >".pflink($id)."</h2>";




?>
<hr>
<form action="<?=base_url('doctor/book')?>" method="post" class="row m-2">

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