<?php 

// pf($prof);

$diag = [
    "lids","conjunctiva","cornea","iris","pupil","lens","retina",
]

?>
<div class="m-3">

<div class="input-group">
<input type="text" id="ss"  class="form-control">
<div class="input-group-append">
<span class="input-group-text fa fa-chevron-down"></span>
</div>
</div>
<div class="listed dropdown-menu">
<li class='dropdown-item'>One</li>
<li class='dropdown-item'>Two</li>
<li class='dropdown-item'>Three</li>
</div>


<table class="table-bordered table-compact" style='width:100%'>
  <thead class="bg-light p-5">
    <tr>
      <th  style='width:20%;'></th>
      <th class="text-center">(OD)RF</th>
      <th class="text-center">(OS)LF</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($diag as $d): ?>
    <tr >
      <td class='text-right text-danger pr-2'><?=rx($d,2)?></td>
      <td>
      <select class="custom-select">
            <option selected>NORMAL</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
      </td>
      <td>
      <select class="custom-select">
            <option selected>NORMAL</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
      </td>
      <!-- <td></td> -->
    </tr>

<?php endforeach; ?>
    
    <!-- </tr> -->
  </tbody>
</table>
    <tr>
        <textarea name="" id="" cols="30" rows="5" placeholder="OTHER NOTES" class="form-control"></textarea>
    </tr>
    <div class="mt-3">
<button class="btn btn-success btn-sm">SAVE</button>
<button class="btn btn-info btn-sm mr-1 pull-right">QUEUE TO OPTICAL</button>
<button class="btn btn-info btn-sm mr-1 pull-right">QUEUE TO PHARMACY</button>
</div>
    </div>


<style>
    select { border:1px solid #fff !important; }
    .table td { border-top:1px solid #fff !important; }
    .table th { border-right:1px solid #aaa !important;border-bottom:1px solid #aaa !important; }
    .listed li { list-style:none;}
</style>


<script>
    $("#ss").keyup(function(e){
        $li = "<li class='dropdown-item'>Three</li>";
        $(".listed").append($li);
    })
</script>