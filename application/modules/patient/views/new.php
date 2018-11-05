<span class="alert pull-right h2 text-dim">AutoGen <?=autogen()?></span>
<div class="pt-2">
<?=topic("Register New Patient");?>
</div>
<hr>
<?php 



?>
<form action='<?=base_url('crud/insert/patient_master/screening.osod')?>' enctype='multipart/form-data' method='post'>

        <div class='input-group mb-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 pull-left'>
            <div class="input-group-prepend">
                <span class='input-group-text'>NAMES</span>
            </div>
            <input class="form-control" required type='text' placeholder='ABCDEFGH IJKLMNOP QRSTUVWXYZ' name='patient_names' value='' />
        </div>
        <div class='input-group mb-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 pull-left'>
            <!-- <div>ID NO</div> -->
            <div class="input-group-prepend">
                <label class='input-group-text'>ID NO</label>
            </div>
            <input class="form-control" required type='text' placeholder='27248899' name='nationalid' value=''/>
        </div>
        <div class='input-group mb-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 pull-left'>
            <div class="input-group-prepend">
                <label class='input-group-text'>DOB</label>
            </div>
            <input class="form-control" required type='date' name='dob' value='' >
        </div>
        <?php 
        $sections = gl("select id, ucase(b) as b from dataconf where a = 'patient_type'");
        $sex = gl("select id, ucase(b) as b from dataconf where a = 'gender'");
        ?>
        <div class='input-group mb-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 pull-left'>
            <div class="input-group-prepend">
                <label class="input-group-text" for="">SEX</label>
            </div>
            <select name='sex' class="form-control" id=''>
            <?php foreach($sex as $a=>$b): ?>
                <option value='<?=$a?>'><?=$b?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class='input-group mb-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 pull-left'>
            <div class="input-group-prepend">
                <span class='input-group-text'>TEL1</span>
                <span class='input-group-text'>+254</span>
            </div>
            <input class="form-control" required type='text' placeholder='726939482' name='tel1' value=''/>
        </div>
        <div class='input-group mb-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 pull-left'>
            <div class="input-group-prepend">
                <span class='input-group-text'>TEL2</span>
                <span class='input-group-text'>+254</span>
            </div>
            <input class="form-control" required type='text' placeholder='726939482' name='tel2' value=''/>
        </div>
        <div class='input-group mb-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 pull-left'>
            <!-- <div>ADDRESS</div> -->
            <div class="input-group-prepend">
                <span class='input-group-text'>ADDRESS</span>
            </div>
            <input class="form-control" required type='text' placeholder='1471 Tudor, MSA' name='postaladdress' value=''/>
        </div>
        <div class='input-group mb-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 pull-left'>
            <!-- <div>EMAIL</div> -->
            <div class="input-group-prepend">
                <span class='input-group-text'>EMAIL</span>
            </div>
            <input class="form-control" required type='text' placeholder='skylark@lighthouse.org' name='email' value=''/>
        </div>
        <div class='input-group mb-3 col-lg-4 col-md-6 col-sm-12 col-xs-12 pull-left'>
            <!-- <div></div> -->
            <div class="input-group-prepend">
                <span class='input-group-text'>SECTION</span>
            </div>
            <select name='category' class="form-control">
                <option value='1'>GENERAL</option>
                <option value='2'>PRIVATE</option>
            </select>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 pull-right mt-4 rowd form-group">
                <button type='submit'  class='form-control text-light btn bg-primary'>SAVE PATIENT INFO</button>
        </div>
        <input type='hidden' name='tbl_name' class='' value='patient_master'>
    </form>