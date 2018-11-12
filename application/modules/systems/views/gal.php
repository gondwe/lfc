<?php 
$g2 = $group_cats;
$first = array_shift($group_cats);
$active = $this->session->activegal ?? $first->id;
// pf($group_cats);

$factive = $first->id == $active ? 'green' : null;

?>

<div class="bg-white p-3">
  <div class="card-body">
    
    

<div class="bd-example bd-example-tabs pt-3">
  <div class="row">
  
    <div class="col-3">
    <div class="d-flex pb-3 text-danger font-weight-bold">SKYLARK GROUPS</div>
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="d-block p-2 alert-primary active <?=$factive?>" id="v-pills-<?=$first->id?>-tab" data-toggle="pill" href="#v-pills-<?=$first->id?>" role="tab" aria-controls="v-pills-<?=$first->id?>" aria-selected="true">
            <?=rxx($first->b,2)?>
        </a>
       <?php foreach ($group_cats as $value): ?>
        <a class="d-block p-2 alert-primary <?=$factive = $value->id == $active ? 'green' : null;?>" id="v-pills-<?=$value->id?>-tab" data-toggle="pill" href="#v-pills-<?=$value->id?>" role="tab" aria-controls="v-pills-<?=$value->id?>" aria-selected="false">
            <?=rxx($value->b,2)?>
        </a>
       <?php endforeach;?>
       
       
      </div>
      <div class="pt-3 text-success font-weight-bold">NEW SKYLARK GROUP</div>
    </div>
    <div class="col-9 row d-block">
        <div class="text-success rowd text-right font-weight-bold ">
            +
        </div>
      <div class="tab-content  p-3" id="v-pills-tabContent">
       
        <div class="tab-pane fade show active" id="v-pills-<?=$first->id?>" role="tabpanel" aria-labelledby="v-pills-<?=$first->id?>-tab">
        <p><?php $this->load->view('gal_groups',['id'=>$first->id, 'groups'=>$groups])?></p>
        </div>
       
       
        <?php foreach ($group_cats as $value): ?>
          <div class="tab-pane fade" id="v-pills-<?=$value->id?>" role="tabpanel" aria-labelledby="v-pills-<?=$value->id?>-tab">
            <p><?php $this->load->view('gal_groups',['id'=>$value->id, 'groups'=>$groups])?></p>
          </div>
       <?php endforeach;?>
       
       
      </div>
    </div>
  </div>
</div>



  </div>
</div>


<style>
#v-pills-tab  > a.d-block:active {
    background:green !important;
}
#v-pills-tab  > a.d-block:hover {
    text-decoration:none !important;
    background:green !important;
    color:white !important;
}

#v-pills-tab  > a.d-block{
  border-bottom:1px solid #aaa !important
}

.green {
  background:green;
  color:white;
}
</style>


<script>
$("#v-pills-tab  > a.d-block").click(function(){

  $(this).siblings().removeClass("green")
  $(this).addClass('green');

  $.post('systems/activegal/'+ this.id);

})
</script>