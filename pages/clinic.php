<!-- <h2>Clinic </h2> -->

<?php

echo "<h5 >Patient Listing</h5>";
echo '<a href="#mobilework" class="btn btn-sm btn-info m-3 pull-right">SETUP EYE CAMP</a>';
echo '<a href="#mobilework" class="btn btn-sm btn-info m-3 pull-right">PRESCRIPTIONS LIST</a>';
echo '<a href="#mobilework" class="btn btn-sm btn-primary m-3 pull-left">REGISTER PATIENT</a>';
$d = get("select patient_names, dob,sex,tel1 as contact, postaladdress as address from patient_master limit 100");

$i = (array)$d;
// spill($i);
$fields = array_keys(get_object_vars(current($i)));
// spill($fields);
echo '<div style="margin:5px; margin-top:20px; margin-left:20px">';


hr();

echo '<table id="example" class="display compact striped hover" style="width:100%;"><thead>';
echo '<tr style="background: #607D8B;color: white;font-weight: lighter;border-right: 1px solid black;">';
$noidfield = !in_array("id",$fields);
if($noidfield)echo '<th>Sno</th>';
foreach($fields as $f){ echo "<th style='border-left: 1px solid white;' >".rxx($f)."</th>"; }
echo '<th colspan="2">ACTION</th>';
echo "</thead>";
echo "<body>";
echo "</body>";
$x = 1;
foreach($i as $j=>$k){
    echo "<tr>";
    if($noidfield)echo "<td>$x</td>";
        foreach($k as $l){
            echo "<td>$l</td>";
        }
        echo '<td><a class="btn btn-warning btn-sm" id="drm"  onclick="confirm(\'Add Charges  ?\') ">ADD CHARGE</a>';
        echo '<a class="btn btn-success btn ml-2" ="drm"  onclick="confirm(\'View Patient Profile ?\')">PROFILE</a></td>';

    echo "</tr>";
    $x++;
}
echo "</tbody>";
echo "</table>";
echo "</div>";


tablefoot2();



