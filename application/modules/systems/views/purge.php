<a href="<?=base_url('systems/audit_trail')?>" class="btn btn-primary btn-sm pull-right">SYSTEM LOGS</a>
<?=topic("PURGE LOGS"); ?>
<div class="ml-5">



<?php 

// pf($backups);
$months = [
    '1'=>'JAN',
    '2'=>'FEB',
    '3'=>'MAR',
    '4'=>'APR',
    '5'=>'MAY',
    '6'=>'JUN',
    '7'=>'JUL',
    '8'=>'AUG',
    '9'=>'SEP',
    '10'=>'OCT',
    '11'=>'NOV',
    '12'=>'DEC',
];

?>

<form action="<?=base_url('systems/purge')?>" method="post">
<center class="mt-5 row">

<div class="input-group mb-3 col-lg-3 col-md-5 col-sm-8">
    <div class="input-group-prepend">
        <div class="input-group-text">SELECT YEAR</div>
    </div>
    <select  class='form-control' name="year" id="">
        <?php foreach($years as $k=>$y) :?>
        <option value="<?=$y->year?>"><?=$y->year?></option>
        <?php endforeach; ?>
        
    </select>
</div>


    
<div class="input-group mb-3 col-lg-3 col-md-5 col-sm-8">
    <div class="input-group-prepend">
        <div class="input-group-text">SELECT MONTH</div>
    </div>
    <select  class='form-control' name="month" id="">
    <?php foreach($months as $k=>$y) :?>
        <option value="<?=$k?>"><?=$y?></option>
        <?php endforeach; ?>
    </select>
</div>
<div class="col-lg-2 col-md-2 col-sm-2">
<button type='submit' class="btn btn-success btn-block">SUBMIT</button>
</div>

</center>
</form>


<div class="lead">Downloads List</div>
<hr>
<ul class="list-inline">
<?php 
    foreach($backups as $backup):
    echo ("<li class='ml-2 mb-2 list-inline-item btn-dim btn badge-pill btn-sm'><a href='".base_url('assets/logs/'.$backup)."'>".$backup."</a></li>");
    endforeach;
?>
</ul>
