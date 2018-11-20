<?php
    $prof = current($profile);
    // pf($_SERVER);
    // echo '<div class="rowd">';
    titles("Edit Patient", $prof->patient_names);
    // titles("Edit Patient",$prof->patient_names,0);
    echo '<div class="">'.newbtn("patient/new","patient").'</div>'; 
    
    // echo '</div>';


    $d = new tablo("patient_master");
    $d->edit($prof->id);