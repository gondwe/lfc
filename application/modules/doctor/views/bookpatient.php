<?php

$p = current($patient);

?>

<div class="">
<h5 >Patient Booking : <span class='badge badge-default'>
<h4 class='text-primary'>
<?=pflink($p->id)?></h4>

</span> </h4>
<a href="<?=base_url('doctor/enqueue/'.$p->id)?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> BOOK PATIENT</a>
    <div class="m-4">



<!-- appointments section -->
<!-- ==================================== -->

<h5>Upcoming Appointments</h5>
<hr>
<?php 

$procedures = ["Incision and drainage","Fb Removal","Suture Removal"];
$drlist = $doctors;
$patlist = 30;

$row = [1,2];


// // fetch upcoming dates in diary
// ====================================
foreach($row as $r){
    
    $data = [
        "p"=>$p,
        "procedures"=>$procedures,
        "drlist"=>$drlist,
        "patlist"=>$patlist,
        "date"=>23,
    ];
    
    $this->load->view("doctor/upcoming",$data);
    
}
?>


<style>
    #pcount {
        font-size:50px;
        color:#ddd !important;
    }
</style>

<!-- direct entry modal -->
<!-- ==================================== -->

<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button> -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
      <form id="addbooking" action="<?=base_url('doctor/book')?>" method="post" class="row">
        <div class="section col-lg-12 col-md-12 col-sm-12">
            <h5 class="text-secondary">SELECT DOCTOR</h5>
            <div class="form-group text-success" id='drlist'></div>
            <div class="form-group">
                <div class="input-group mb-3" >
                <select required name="procedure" class="custom-select" id="inputGroupSelect01">
                    <option selected>SELECT...</option>
                    <?php foreach($procedures as $k=>$proc): ?>
                            <option value='<?=$k?>' ><?=$proc?></option>
                    <?php endforeach; ?>
                </select>
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">PROCEDURE</label>
                </div>
                </div>
                <div class="form-group ">
                    <ul class="list-inline alert bg-light">
                        <li class="list-inline-item">
                            <div class="custom-control custom-checkbox">
                            <input value='r' type="checkbox" name="eyes[]" class="custom-control-input" id="customControlValidation1" checked>
                            <label class="custom-control-label" for="customControlValidation1">RIGHT EYE</label>
                            </div>
                        </li>
                    <li class="list-inline-item pull-right">
                        <div class="custom-control custom-checkbox">
                        <input value='l'type="checkbox" name="eyes[]" class="custom-control-input" id="customControlValidation2" >
                        <label class="custom-control-label" for="customControlValidation2">LEFT EYE</label>
                        </div>
                    </li>
                    </ul>
                </div>
            </div>
            <div class="pull-right section col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <textarea name="notes" id="" cols="30" rows="6" placeholder="notes" class="form-control"></textarea>
                </div>
            <button class="btn btn-primary text-left pull-right">BOOK PATIENT</button>
            </div>
        </div>
        <input type="hidden" name="date" id="date" >

        </form>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
</div>

<script>
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  var thisdate =  button.data('date')
  var drlist =  button.data('doc');
  console.log(drlist);
  drlist = drlist.split(",");

    ds = drlist.map(function(v){
        return '<div class="form-check"><input required class="form-check-input" type="radio" name="docky" id="docky1" value="'+v+'"><label class="form-check-label" for="docky1">'+v+'</label></div>'
    });
    ds = (ds.join(''));

  var modal = $(this);
  modal.find('.modal-title').text('Book Patient on ' + thisdate);
  modal.find('#drlist').html(ds);
  modal.find('.modal-body #date').val(thisdate);
});



$("form").submit(function(e){
    e.preventDefault(e);
    $.post($(this).attr("action"),{"data":$(this).serialize()},(response)=>{
        // console.log(response);
        $("#exampleModal").modal("hide");
    })
});



</script>

