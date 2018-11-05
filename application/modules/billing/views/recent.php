<h5 class="m-5">
    <?=topic('previous transactions')?>
</h5>
<hr>
<div class="accordion" id="accordionExample">
<?php
// pf($charges);
$x = 1; 
?>
<?php foreach($charges as $txn=>$chrglist) { ?>
  <div class="card">
    <div class="card-header" id="heading<?=$x?>">
      <h5 class="mb-0">
        <div class="links pt-2 pl-3 pb-2 <?=$x? null : 'collapsed'?>" type="" data-toggle="collapse" data-target="#collapse<?=$x?>" aria-expanded="true" aria-controls="collapse<?=$x?>">
          <small class="text-dark ">
                <span class="fa fa-check-circle text-<?=current($chrglist)->a_status? 'success' : 'danger' ?> ">
                
                </span>
                <strong class='text-secondary'>TXN No.<?=current($chrglist)->txn?> </strong>/ <?=date_format(new DateTime(current($chrglist)->date),'jS F, Y G:i:s')?>
                <a href="<?=base_url('billing/paybill/'.$txn)?>" class="pull-right mb-1 mr-2 btn btn-<?=current($chrglist)->a_status? 'success' : 'warning' ?> btn-sm">
                    <?=current($chrglist)->a_status == 0 ? 'PAY' : (current($chrglist)->a_status == 1 ? "VIEW" : "BAL" ) ?>
                </a>
               
                </span>
            </small>
        </div>
      </h5>
    </div>

    <div id="collapse<?=$x?>" class="collapse" aria-labelledby="heading<?=$x?>" data-parent="#accordionExample">
      <div class="card-body">
       <table class='table-striped' width='100%'>
        <thead >
            <tr>
                <th>Sno</th>
                <th>Item</th>
                <th>Rate</th>
                <th>Received By</th>
                <th class='text-right pr-3'>Amount(KES)</th>
            </tr>
        </thead>
        <tbody>
        <?php $itemstotal=[]; foreach($chrglist as $k=>$items) : $itemstotal[] = $items->total; $k++?>
            <tr>
                <td><?=$k?></td>
                <td><?=$items->item?></td>
                <td><?=$items->rate?></td>
                <td><?=$items->user?></td>
                <td class='text-right pr-3' ><?=$items->total?>.0</td>
            </tr>
        <?php endforeach ?>
        </tbody>
       </table>

      <div class="alert bg-light text-right pb-1 pt-1 pr-3" id="totalrow">TOTAL: <?=array_sum($itemstotal)?>.00</div>

      </div>
    </div>
  </div>

<?php $x++; } ?>

</div>

<?php 


?>



<style>
    .card-header {
        padding:unset !important
    }
    .links {
        cursor:pointer;
    }
    #totalrow {
        border-top:1px solid #aaa; font-weight:bold
    }
    .card {
        border: none;
        border-bottom: 1px solid #fff;
    }
    thead {
        border-bottom: 1px solid #fff;
        background: #dcdcdc;
        color:#607D8B;
    }
    th {
        padding-left:5px;
    }
</style>