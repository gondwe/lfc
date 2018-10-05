<?php 
$diag = [ "lids","conjunctiva","cornea","iris","pupil","lens","retina", ];
?>



<div class="m-3" >

<div class="col-md-8 pull-left">
<table class="table-bordered table-compact" style='width:100%'>
  <thead class=" p-5">
    <tr>
      <th  style='width:20%;'></th>
      <th class="bg-success text-center text-light p-3">(OD)RF</th>
      <th class="bg-info text-center text-light p-3">(OS)LF</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($diag as $d): ?>
    <tr >
      <td class='bg-light text-right text-danger pr-2'><?=rx($d,2)?></td>
      <td>
        <input type="text" placeholder="NORMAL" class="ssx form-control">
        <input type="hidden" name="name" id="realval">
        <ul type="text" id="disx"></ul>

      </td>
      <td>
        <input type="text" placeholder="NORMAL" class="ssx form-control">
        <input type="hidden" name="name" id="realval">
        <ul type="text" id="disx"></ul>
      </td>
      <!-- <td></td> -->
    </tr>

<?php endforeach; ?>
    
    <!-- </tr> -->
  </tbody>
</table>
</div>
<div class="col-md-4 pull-right">
        <textarea name="" id="" cols="30" rows="5" placeholder="OTHER NOTES" class="mt-3 mb-2 form-control"></textarea>
    
        <div class="custom-control custom-checkbox">
        <input value='x' type="checkbox" name="que[]" class="custom-control-input" id="customControlValidation1" checked>
        <label class="custom-control-label" for="customControlValidation1">QUEUE TO OPTICAL</label>
        <p><button class="btn btn-primary btn-lg mt-3">SAVE</button></p>
        </div>
        <!-- <button class="btn btn-info btn-sm m-2 btn-block">QUEUE TO PHARMACY</button> -->
    </div>
</div>


<style>
    select { border:1px solid #fff !important; }
    .table td { border-top:1px solid #fff !important; }
    .table th { border-right:1px solid #aaa !important;border-bottom:1px solid #aaa !important; }
    .listed li { list-style:none;}
    table {
        margin-bottom:30px
    }
    #disx {
        position: absolute;
        z-index: 1030;
        overflow:hidden;
        /* background:#fff; */
    }
    #disx li {
        list-style:none;
        border-bottom:1px solid #ddd
    }

    #disx li:hover {
        background:yellow;
    }
</style>

