<?php 

// pf($clinic_types);
// pf($section);
// pf($category_count);
echo topic($clinic_types[$section]." Clinic");

$d = new tablo("patient_master");
$d->hide("dob");
$d->sqlstring = "select pm.*, age(pm.dob) as age from patient_master as pm where category = '$section'";
$d->table(0);