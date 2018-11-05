<?php 
$g2 = $group_cats;
$first = array_shift($group_cats);
// pf($group_cats);
?>

<div class="bg-white p-3">
  <div class="card-body">
    
    

<div class="bd-example bd-example-tabs pt-3">
  <div class="row">
  
    <div class="col-3">
    <div class="d-flex pb-3 text-danger font-weight-bold">SKYLARK GROUPS</div>
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
       

       
        <a class="d-block p-2 alert-primary active" id="v-pills-<?=$first->id?>-tab" data-toggle="pill" href="#v-pills-<?=$first->id?>" role="tab" aria-controls="v-pills-<?=$first->id?>" aria-selected="true">
            <?=rxx($first->b,2)?>
        </a>
       
       <?php foreach ($group_cats as $value): ?>
        <a class="d-block p-2 alert-primary" id="v-pills-<?=$value->id?>-tab" data-toggle="pill" href="#v-pills-<?=$value->b?>" role="tab" aria-controls="v-pills-<?=$value->b?>" aria-selected="false">
            <?=rxx($value->b,2)?>
        </a>
       <?php endforeach;?>
       
       
      </div>
      <div class="pt-3 text-success font-weight-bold">NEW SKYLARK GROUP</div>
    </div>
    <div class="col-9 row d-block">
        <div class="d-flex text-success font-weight-bold">
            MODELS
        </div>
      <div class="tab-content  p-3" id="v-pills-tabContent">
       
        <div class="tab-pane fade show active" id="v-pills-<?$first->id?>" role="tabpanel" aria-labelledby="v-pills-<?=$first->id?>-tab">
          <p>Cillums ad ut irure tempor velit nostrud occaecat ullamco aliqua anim Lorem sint. Veniam sint duis incididunt do esse magna mollit excepteur laborum qui. Id id reprehenderit sit est eu aliqua occaecat quis et velit excepteur laborum mollit dolore eiusmod. Ipsum dolor in occaecat commodo et voluptate minim reprehenderit mollit pariatur. Deserunt non laborum enim et cillum eu deserunt excepteur ea incididunt minim occaecat.</p>
        </div>
       
       
        <?php foreach ($group_cats as $value): ?>
          <div class="tab-pane fade show" id="v-pills-<?$value->id?>" role="tabpanel" aria-labelledby="v-pills-<?=$value->id?>-tab">
            <p>Cillum ad ut irure tempor velit nostrud occaecat ullamco aliqua anim Lorem sint. Veniam sint duis incididunt do esse magna mollit excepteur laborum qui. Id id reprehenderit sit est eu aliqua occaecat quis et velit excepteur laborum mollit dolore eiusmod. Ipsum dolor in occaecat commodo et voluptate minim reprehenderit mollit pariatur. Deserunt non laborum enim et cillum eu deserunt excepteur ea incididunt minim occaecat.</p>
          </div>
       <?php endforeach;?>
       
       
      </div>
    </div>
  </div>
</div>



  </div>
</div>


<style>
#v-pills-tab  > a.d-block:hover {
    background:orange !important;
    text-decoration:none !important
}

#v-pills-tab  > a.d-block{
  
}
</style>