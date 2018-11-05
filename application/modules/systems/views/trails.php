<a href="<?=base_url('systems/purge/logs')?>" class="btn btn-warning btn-sm pull-right">PURGE LOGS</a>
<?=topic("audit trail"); ?>


<?php 
// pf($dates);
foreach($dates as $date){
    $thisdate = date_format(new DateTime($date->dates), "Y-m-d");
    $d = explode(" ", str_replace(' 0:00:00 AM' , '', datef($date->dates)));
?>

<div class="pb-4 ml-3 pl-3 timeline">
    <div class="pull-right mr-3 pt-3 text-secondary font-weight-bold">COMP/DEVICE</div>
    <h2 class='font-weight-light'>
        <span class="day pb-1 pl-2 mr-2 bg-warning text-dark font-weight-bold">
            <?=preg_replace('/[a-zA-Z]/','',$d[1])?>
        </span> 
        <?=$d[2]?> <?=$d[3]?> 
        <span class="small "><?=$d[0]?> </span>
    </h2>
    <span class="fa fa-calendar text-success pull-left"></span>
    <div class="list-unstyled ml-3">
    <?php 
        foreach($logs as $log): 
            $d2 = explode(" ",$log->date);
            if($thisdate == current($d2)){
            $time = date_format( new DateTime($log->date), "G:i:s a");
    ?>
        <li class="rowd">
            <span class="pull-left"><?=$time.' - '?></span> 
            <span class="pull-left"> <?=$log->user?> - </span> 
            <span class="pull-left"> <?=$log->operation?></span> 
            <span class="pull-right mr-3 text-secondary"><?=$log->host ? ':: '.$log->host : null?></span>
            </li>
    <?php } endforeach; ?>
    </div>
</div>
<hr>

<?php 

}

?>

<style>
    .timeline {
        border-left:1px solid #dcdcdc;
    }
    .fa-calendar {
        margin-left:-25px
    }
    .day {
        border-radius:5px;
    }
</style>