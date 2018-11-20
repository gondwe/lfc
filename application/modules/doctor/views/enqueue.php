<?php 
    // echo topic("Patient Booking");
    echo "<div class='px-md-3 px-sm-2'>".pflink($id)."</div>";

    $values ?? [];
    $drlist = isset($drlist)? $drlist :  skylark_group("doctor"); 
    $procs = $this->db->select("id, prodesc")->get("procedures")->result();

    // pf($this->_ci_cached_vars);
    // pf($values);
    $drsel = isset($values["doctor"]) ? " selected=TRUE " : null;
    $procsel = isset($values["prodesc"]) ? " selected=TRUE " : null;
    // pf($drlist);
?>
<hr>
<form action="<?=base_url('doctor/book/'.$id)?>" method="post" class="px-md-3 px-sm-1 p-1">

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">DATE</label>
                </div>
                <input type="date" class="form-control" name="bkdate" required>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">SURGEON</label>
                </div>
                <select class="custom-select" name="doctor" id="inputGroupSelect01">
                    <option selected>SELECT...</option>
                    <?php foreach($drlist as $dr):?>
                    <option <?=$drsel?> value="<?=$dr->id?>"><?=rxx($dr->names, 2)?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">PROCEDURE</label>
                </div>
                <select class="custom-select" name="prodesc" id="inputGroupSelect01">
                    <option selected>SELECT...</option>
                    <?php foreach($procs as $dr):?>
                    <option <?=$procsel?> value="<?=$dr->id?>"><?=$dr->prodesc?></option>
                    <?php endforeach;?>
                </select>
            </div>


<div class="form-group ">
                <!-- <label for="">EYE</label> -->
                <ul class="list-inline alert bg-light">
                    <li class="list-inline-item">
                        <div class="custom-control custom-checkbox">
                        <input type="checkbox" <?=$values["rf"] ?? null ?> class="custom-control-input" name="rf" id="customControlValidation1" >
                        <label class="custom-control-label" for="customControlValidation1">RIGHT EYE</label>
                        </div>
                    </li>
                    <li class="list-inline-item pull-right">
                        <div class="custom-control custom-checkbox">
                        <input type="checkbox" <?=$values["lf"] ?? null ?> class="custom-control-input" name="lf" id="customControlValidation2" >
                        <label class="custom-control-label" for="customControlValidation2">LEFT EYE</label>
                        </div>
                    </li>
                </ul>
                <div class="form-group">
                    <textarea name="notes" id="" cols="30" rows="6" placeholder="notes" class="form-control"></textarea>
                </div>
                <button class="btn btn-primary btn-block">BOOK PATIENT</button>
            </div>

    </form>