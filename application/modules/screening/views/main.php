<?php 
// pf($recent);
// pf($screening);
echo topic("screening");

$patient_names = $recent->patient_names ?? "Pxxxxxx Xxxxxx";
$section = $recent->ptype ?? "Xxxxxx";
$pno = $recent->id ?? "XXXXXXX9";
$rf = $screening->od ?? "";
$lf = $screening->os ?? "";
$cc = $screening->cc ?? null;

?>
<h3  class="pull-left col-sm-8 col-md-7"><span id="names"> <?=pflink($id)?></span>
<small  class="text-secondary col-md-3 h6">Section: <span id="section"><?=$section?></span></small></h3>
<!-- <h5 class='pull-right col-sm-4 col-md-2' >pNo.<span class='h3  p-2 ' id='pno'><?=$pno?></span></h5> -->
<hr>
<!-- <small class="pull-right">NOTE:</small> -->
<form action="<?=base_url('screening/query')?>" method="post" id="search" class="col-md-6 pull-left mb-3">
<input type="text" placeholder="Autogen Search Query." name='sval' id='sval' class="form-control col-md-11 col-sm-11 col-xs-11 pull-left">
<button type="submit" value="" class="btn alert-primary col-xs-1 col-sm-1 col-md-1"><i class="fa fa-check-square"></i></button>
</form>
<form action="<?=base_url('screening/update/null/patient.profile')?>" method="post" class="formed"  >
        <button type="submit"  class="btn btn-success pull-right col-md-1">SAVE</button>
<hr>

<div class="col-md-6 pull-left mt-3">


    <div class="rowd" >
        <input type="hidden" name="pid" id="pid" value="<?=$pno?>" required>
        <div class=" pull-left mt-2 col-sm-6 ">
        <label for="">RF</label> 
        <input type="text" name="rf" id="rf" required autofocus class="p-1" value="<?=$rf?>" placeholder="RF">
        </div>
        <div class=" pull-right mt-2 col-sm-6">
        <label for="">LF</label>
        <input type="text" name="lf" id="lf" required class="p-1 " value="<?=$lf?>" placeholder="LF">
        </div>
    </div>


    <div class="p-4" style=''>
        <strong>Chief complaint</strong>
        <div class="text-dark">
        <textarea name="cc" id="cc" cols="30" rows="5" class='form-control'>
        <?=$cc?>
        </textarea>
        </div>
    </div>


</form>

<?php

$age = $recent->age ?? "XX";
$sex = $recent->sex ?? "XXXX";
$contact = $recent->tel1 ?? "07XXXXXXX";

?>

</div>
<div class="pull-right alert text-right col-md-6 mt-2">
<div class="h4">More Details</div><hr>
<div class="text-secondary">
    <div ><strong>Age : </strong><span class="age"><?=$age?></span></div> 
    <div class="sex"><strong>Sex : </strong><span class=" sex"><?=$sex?></span></div> 
    <div class="cont"><strong>Contact </strong><span class=" cont"><?=$contact?></span></div> 
</div>
</div>
    

    <script>
        $("#search").submit(function(e){
            e.preventDefault();
            url = $(this).attr("action") + "/"+this.sval.value;
            if(val != ''){ processSearch(val, url); }else {resetSearch}
        })

        
        $("#sval").keyup(function(e){ 
            val =e.target.value;
            if(isNaN(val)) { resetSearch }else{
                url = e.target.form.action+"/"+e.target.value;
                if(val != ''){ processSearch(e,url) }else{ resetSearch }
            }
        });


        function processSearch(e,url){
                    $.getJSON(url,function(res){
                        prof = res.prof[0];
                        scrn = res.scrn[0];
                        if(prof){
                            $('#names').html(prof.patient_names);
                            $('#pno').text(prof.id);
                            $('#pid').val(prof.id);
                            $('#section').text(prof.ptype);
                            $('.age').html("Age : " + prof.age);
                            $('.sex').html("Sex : " + prof.sex);
                            $('.cont').html("Contact : " + prof.tel1);

                            if(scrn){
                                $("#rf").val(scrn.od);
                                $("#lf").val(scrn.os);
                                $("#cc").val(scrn.cc);
                            }else{
                                $("#rf").val("0");
                                $("#lf").val("0");
                                $("#cc").val(null);
                            }


                        }else{
                            resetSearch()
                        }
                    })

            if(e.keyCode == 13){ 
                e.preventDefault()
                window.location.reload();
            }
            // alert(e.keyCode)
        }

        function resetSearch(){
            $('#names').html("Xxxxxxx Xxxxxxx");
            $('#pno').text("XXXXXX9");
            $('#pid').val(null);
            $('#section').val("Xxxxxx");
            $('.age').html("Age : XX");
            $('.sex').html("Sex : XXXX");
            $('.cont').html("Contact : 07XXXXXXXXX");
        }
            
    </script>