<?php 

// pf($recent);

?>

<h5>Generated Patient NO.<span class='h3  p-2'><?=pno("5678809")?></span></h5>
<hr>
<form action="<?=base_url('screening/query')?>" method="post">
<input type="text" placeholder="Autogen Search Query." name='sval' class="form-control col-md-11 pull-left">
<button type="submit" value="" class="btn btn-primary col-md-1 pull-right"><i class="fa fa-check"></i></button>
</form>

<div class="col-md-6 pull-left mt-3">



<form action="<?=base_url('screening/update')?>" method="post" class="bg-light" >
    <div class="rowd" >
        <input type="hidden" name="pid" required>
        <div class=" pull-left mt-2 ml-2">
        <label for="">RF</label> 
        <input type="text" name="rf" required autofocus class="p-1 " placeholder="RF">
        </div>
        <div class=" pull-right mt-2  mr-4">
        <label for="">LF</label>
        <input type="text" name="lf" required class="p-1 " placeholder="LF">
        </div>
    </div>


    <div class="alert alert-light" style='border:1px solid #ddd'>
        <strong>Chief complaint</strong>
        <div class="text-dark">
        <textarea name="cc" id="" cols="30" rows="5" class='form-control'>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione iure assumenda consectetur rem praesentium magni magnam asperiores veritatis dolore mollitia quisquam voluptatibus sint nulla, dignissimos excepturi! Incidunt voluptates provident nesciunt.
        </textarea>
        </div>
        <button type="submit"  class="btn btn-success pull-right col-md-3 mt-4">SAVE</button>
    </div>
</form>


</div>
<div class="pull-right alert  col-md-6 mt-2">
<div class="text-dark m-2">Details</div>
<h2 class='text-secondary alert-dark p-2'>Names : Benard Gondwe</h2>
<div class="bg-light p-2">Section : General</div> 
</div>
    