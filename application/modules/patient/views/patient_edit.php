<?php
    $prof = current($profile);
    // pf($_SERVER);
    echo '<div class="rowd">';
    titles("Edit Patient", $prof->patient_names);
    // titles("Edit Patient",$prof->patient_names,0);
    // echo '<div class="pull-right">';
    echo '<a href="'.base_url('patient/new').'" class="btn btn-sm btn-primary m-4" style="position:fixed; right:10px">NEW PATIENT</a>';
    // echo '</div>';
    echo '</div>';


    $d = new tablo("patient_master");
    $d->edit($prof->id);