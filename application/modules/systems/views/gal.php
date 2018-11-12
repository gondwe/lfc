<?php 
$g2 = $group_cats;
$first = array_shift($group_cats);
$active = $this->session->activegal ?? $first->id;
// pf($group_cats);

$factive = $first->id == $active ? 'green' : null;
$showactive = $first->id == $active ? 'show active' : null;

?>

<div class="bg-white p-3">
  <div class="card-body">
    
    

<div class="bd-example bd-example-tabs pt-3">
  <div class="row">
  
    <div class="col-3">
    <div class="d-flex pb-3 text-danger font-weight-bold">SKYLARK GROUPS</div>
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="d-block p-2 dim active<?=$factive?>" id="v-pills-<?=$first->id?>-tab" data-toggle="pill" data-id="<?=$first->id?>" href="#v-pills-<?=$first->id?>" role="tab" aria-controls="v-pills-<?=$first->id?>" aria-selected="true">
            <?=rxx($first->b,2)?>
        </a>
       <?php foreach ($group_cats as $value): ?>
        <a class="d-block p-2 dim <?=$factive = $value->id == $active ? 'green' : null;?>" data-id='<?=$value->id?>' id="v-pills-<?=$value->id?>-tab" data-toggle="pill" href="#v-pills-<?=$value->id?>" role="tab" aria-controls="v-pills-<?=$value->id?>" aria-selected="false">
            <?=rxx($value->b,2)?>
        </a>
       <?php endforeach;?>
       
       
      </div>
      <!-- <div class="pt-3 text-success font-weight-bold">NEW SKYLARK GROUP</div> -->
    </div>
    <div class="col-9 row d-block">
        <div class="text-success rowd text-right font-weight-bold ">
        <span class="" data-toggle="modal" data-target="#exampleModalCenter">
          <i class="fa fa-plus-circle text-danger"></i>
        </span>
        </div>
      <div class="tab-content  p-3" id="v-pills-tabContent">
       
        <div class="tab-pane fade <?=$showactive?>" id="v-pills-<?=$first->id?>" role="tabpanel" aria-labelledby="v-pills-<?=$first->id?>-tab">
        <p><?php $this->load->view('gal_groups',['id'=>$first->id, 'groups'=>$groups])?></p>
        </div>
       
       
        <?php foreach ($group_cats as $value): $showactive = $value->id == $active ? 'show active' : null; ?>
          <div class="tab-pane fade <?=$showactive?>" id="v-pills-<?=$value->id?>" role="tabpanel" aria-labelledby="v-pills-<?=$value->id?>-tab">
            <p><?php $this->load->view('gal_groups',['id'=>$value->id, 'groups'=>$groups])?></p>
          </div>
       <?php endforeach;?>
       
       
      </div>
    </div>
  </div>
</div>



  </div>
</div>





<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">New group category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('systems/addgroupcats')?>" method="post">
          <div class="form-group">
            <input type="hidden" name="a" value='group_cat'>
            <input type="text" name='b' required placeholder="Category Name" class="form-control">
          </div>
            <div class="modal-footer">
          <div class="form-group">
            <button type="submit" class="float-right form-control btn-success">SAVE</button>
          </div>
        </form>
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
    background:yellow;
    /* background:#72FF0033; */
    color:black;
  }


  .danger {
    background:red;
    color:white;
  }



</style>


<script>
$("#v-pills-tab  > a.d-block").click(function(){

  $(this).siblings().removeClass("green")
  $(this).addClass('green');

  $.post('systems/activegal/set/'+ $(this).data("id"));

})

$("#v-pills-tab  > a.d-block").dblclick(function(){
  $(this).removeClass("green")
  $(this).addClass("danger")
  $.post('systems/activegal/del/'+ $(this).data("id"));
})

</script>

