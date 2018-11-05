<a href="<?=base_url("optical")?>" class="btn btn-primary btn-sm pull-right"><i class="fa fa-note"></i> VIEW CURRENT ORDERS</a>
<h2 class="text-dim" id="pnames"><?=pflink($patient->id) ?? "Firstname Lastname" ?></h2>
<p class="d-flex pt-3">
<?=topic('Add Charge')?>
</p>

<div class="pt-4">
<?php 
// pf($patient);

$d = new tablo("optical_orders");
$d->combos("lens_type", "select id, rxx(b) as b from  dataconf where a = 'lens_type'");
$d->combos("frame_upcharge", "select id, b from  dataconf where a = 'upcharge'");
$d->combos("addons", "select id, b from  dataconf where a = 'optical_cat'");

$d->aliases["frame_upcharge"] = "frame & upcharge";
$d->aliases["pid"] = "patient No";
$d->newform();

?>

<script>
    $("[name='pid']").keyup(function (e){
        e.preventDefault();
        const nf = $("#pnames");
        if(this.value == ""){
            nf.text("Firstname Lastname")
            nf.removeClass("text-danger");
        }else{

            const url = 'http:/ci3/patient/find/' + this.value
            $.getJSON(url, {})
                .then(data=>{
                    let names = data ? data.patient_names : "ID NOT FOUND !";
                    if(data) nf.addClass("text-danger");
                    if(!data) nf.removeClass("text-danger");
                    pf(names);
                    nf.text(names)
                    if(data) {
                        let activate = 'http:/ci3/patient/svc_activate/optical/' + this.value
                        $.post(activate)
                        pf('done')
                    }
                // }).then(function (data){
                });
                
        }
    })
</script>