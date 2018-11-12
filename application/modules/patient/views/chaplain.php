<?php 


echo topic("chaplain queue");
if($q){

    foreach($q as $re){
        echo "
        <div class='tile mb-1 ml-md-5 p-md-3 p-sm-1 alert-primary'>".$re->patient_names." - ".$re->age."
            <small class='text-secondary'>Tel : ".$re->tel1."/".$re->tel2."</small>
            <span class='pull-right '>
                <small>".rxx($re->ptype)." Clinic </small>
                <span class='d-inline-flex blockquote-footer'>".datef($re->date, 1)." </span>
                <i class='fa fa-calendar'></i> 
            </span>
        </div>";
    }
    // pf($q);
    


}else{
    echo "<h6 class='ml-md-5 p-3 alert-info text-success'>Voila! Queue Empty<i class='fa fa-check-circle  pull-right'></i></h6>";
}


echo topic("previously counseled");


foreach($recent as $re){
    echo "
    <a id='plink' href='".base_url('patient/svc/chaplain/'.$re->id)."'>
    <div class='tile mb-1 ml-md-5 p-md-3 p-sm-1 alert-success'>".$re->patient_names." - ".age($re->dob)."
        <small class='text-secondary'>Tel : ".$re->tel1."/".$re->tel2."</small>
        <span class='pull-right '>
            <small class='badge badge-pill alert-danger'>".rxx($re->faith)." </small>
            <small>Clr. ".rxx($re->chaplain)." </small>
            <span class='d-inline-flex blockquote-footer'>".datef($re->date, 1)." </span>
            <i class='fa fa-calendar'></i> 
        </span>
    </div>
    </a>
    ";
}

// pf($recent);
?>

<style>
    .tile:hover { background:#66ea84;}
    #plink { text-decoration:none;}
</style>