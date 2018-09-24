
<!-- <h3 >Dashboard</h3> -->
<div>
<?php 

// $s = getlist("select * from settings");
$d = new tablo("patient_master");
$d->sqlstring = "select * from patient_master limit 50";
$d->hide("tel2,postaladdress,email");


?>
<div class="row">

  
<!--   
  <div class="col-md-6 col-sm-6 col-lg-3 col-xs-12">
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="./img/billing.jpg" alt="eye care">
        <div class="card-body">
          <h5 class="card-title">Billing</h5>
          
        <a href="#payments" class="btn btn-primary">Payment Receipts</a>
      </div>
    </div>
  </div> 

  <div class="col-md-6 col-sm-6 col-lg-3 col-xs-12">
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="./img/eyecare.jpg" alt="eye care">
        <div class="card-body">
          <h5 class="card-title">Eye Care</h5>
         <a href="#products" class="btn btn-primary">Products & Services</a>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-sm-6 col-lg-3 col-xs-12">
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="./img/drugs.jpg" alt="eye care">
        <div class="card-body">
          <h5 class="card-title">Pharmacy / Stores</h5>
         <a href="#pharmacy" class="btn btn-primary">Transactions</a>
      </div>
    </div>
  </div>
  -->
</div>
  

<?php

// hr();
// echo "<hr>";

echo "<h5 >Recent Patients</h5>";
$d->table(0);  
//datatable(get("select * from patient_master limit 100"),"add_new/patient_master");
?>