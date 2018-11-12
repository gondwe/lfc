<div class=""><?=topic('chaplain Dashboard')?></div>


<h5 class="pull-left col-sm-8 col-md-7"><span id="names"><?=pflink($patient)?></span>
    <small  class="text-secondary col-md-3 h6"><span id="section"><?=$section?></span></small>
</h5>

<hr>

<form action="<?=base_url('screening/query')?>" method="post" id="search" class="col-md-6 pull-left mb-3">
<input type="text" placeholder="Pno Search." name='sval' id='sval' class="form-control col-md-11 col-sm-11 col-xs-11 pull-left">
<button type="submit" value="" class="btn alert-primary col-xs-1 col-sm-1 col-md-1"><i class="fa fa-check-square"></i></button>
</form>
<hr>

<?php 

$d = new tablo("chaplain");
$d->formgrid(4,6,12);
$d->combos("religion","select id, b from dataconf where a = 'religion'");
$d->combos("baptised","select id, b from dataconf where a = 'yesno'");
$d->combos("pastor","select id, concat(first_name,' ',last_name) as names from users where id = '".$this->session->user_id."'");
$d->hidden("pid",$patient);



$saved = fetch("select id from chaplain where pid = '$patient'");
$saved ? $d->edit($saved) :  $d->newform();


?>

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