<?php 


function propername($n=null){
    $me = null;
    $ci = &get_instance();
    $l = $ci->uri->segments;
    $n = is_null($n)? end($l) : $n;
    switch($n){
        case "patient_master" : $me = "patient" ; break;
        
    }

    return $me;
}

