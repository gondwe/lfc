<div class="p-2 pt-5">

<?php 

$id = $this->session->activepatient;
// $id = end($this->uri->segments);
$items = get("Select * from items");
$prescrions = get("select p.*, i.name as drug 
from prescriptions as p 
                left join items as i 
                on i.id = p.drug 
                where p.pid = ".$id." order by p.date desc");

// pf(skylark_group("pharmacy"));
?>


<form action="<?=base_url('patient/saveprescription/'.$id)?>" method="post" class='mt-4'>
    <table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th style='min-width:200px'>Drug</th>
            <th>OD/OS</th>
            <th>Freq</th>
            <th>Duration</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
        <tr>
            <td>
                <select name="drug" class="form-control">
                    <?php foreach ($items as $key => $value):?>
                        <option value="<?=$value->id?>"><?=$value->name?></option>
                    <?php endforeach;?>
                </select>
            </td>
            <td>
                <div class="row ml-2">
                <div class="form-check form-check-inline">
                <input class="form-check-input" checked="TRUE" type="checkbox" name="od" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">OD</label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" checked="TRUE" type="checkbox" name="os" value="" id="defaultCheck2">
                    <label class="form-check-label" for="defaultCheck2">OS</label>
                </div>
                    <!-- <input type="checkbox" name="os[]" class="form-control">OS -->
                </div>
            </td>
            <td>
                <div class="row px-3 text-center">

                    <!-- <input type="text" name='freq[]' placeholder="1x3" class="form-control"> -->
                    <select name="a" class="col form-control">
                        <?php for ($x =1;$x<10; $x++):?>
                            <option class='' value="<?=$x?>"><?=$x?></option>
                        <?php endfor;?>
                    </select>
                     <span class="col px-2">X</span> 
                     <select name="b" id="" class="col form-control">
                        <?php for ($x =1;$x<10; $x++):?>
                            <option class='' value="<?=$x?>"><?=$x?></option>
                        <?php endfor;?>
                    </select>
                </div>
            </td>
            <td>
                <div class="row">

                    <div class="input-group mx-3">
                        <select name="period" class="custom-select" id="inputGroupSelect02">
                        <?php for ($x =1;$x<31; $x++):?>
                            <option class='' value="<?=$x?>"><?=$x?></option>
                        <?php endfor;?>
                        </select>
                        <div class="input-group-append">
                            <label class="input-group-text" for="inputGroupSelect02">Options</label>
                        </div>
                    </div>
                    <!-- <button type="submit" class="btn m-1 mr-2 badge badge-primary">SAVE</button> -->
                </div>
            </td>
        </tr>
    </table>
    <button type="submit" class="btn btn-success btn-sm pull-right "><i class="fa fa-plus"></i> Save Prescription</button>
</form>

<div class="clearfix"></div>
<div class="mt-3"></div>

<?php foreach ($prescrions as $key => $value): ?>

<div class="d-block mt-md-1" id="row<?=$value->id?>">
    <div class="d-block p-md-2 alert-danger rounded"  >
        
        <span class="col-md-5 lead"><?=rxx($value->drug)?></span>
        <span class="col-md-3">ratio(<?=$value->ratio?>)</span>
        <span class="col-md-3"><?=$value->period?> day(s)</span>
        <span class="pull-right"><i onclick="clearPr('<?=$value->id?>')" class="fa fa-close"></i></span>
        <small class="col-md-3 pull-right"><?=datef($value->date)?></small>
    </div>
</div>

<?php endforeach;?>
</div>

<?php 

// pf($prescrions);

?>

<script>
    function clearPr(id){
        pf(id);
        url = "<?=base_url('patient/deletePresc/')?>" + id
        $.post(, {}, function(rs){
            // pf(rs);
        }).done(
            function(){
                // window.location.reload();
            }
        )
    }
</script>