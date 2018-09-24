<?php

echo "<h5>Reorder List</h5>";

$p = get("select r.rdate as req_date,  ucase(r.screate) as staff, d.descr as item, ucase(r.approvedby) as approved_by,r.remarks from requisition as r right join requisition_d as d on d.rdid = r.rid where supplied like 'no'");
// table2($p);

$i = (array)$p;
// spill($i);
$fields = array_keys(get_object_vars(current($i)));
// spill($fields);

echo '<div class="btn btn-primary pull-right btn-sm m-4">Create Requisition</div>';
echo '<div class="btn btn-primary pull-right btn-sm m-4">Add Stock</div>';
echo '<div style="margin:5px; margin-top:20px; margin-left:20px">';


hr();

echo '<table id="example" class="display compact striped hover" style="width:100%;"><thead>';
echo '<tr style="background: #607D8B;color: white;font-weight: lighter;border-right: 1px solid black;">';
$noidfield = !in_array("id",$fields);
if($noidfield)echo '<th>Sno</th>';
foreach($fields as $f){ echo "<th style='border-left: 1px solid white;' >".rxx($f)."</th>"; }
echo '<th>ACTION</th>';
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
        echo '<td>
        <div class="dropdown">
        	<button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenuButton$x" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        		Approve Order
        	</button>
        	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton$x">
        		<a class="dropdown-item" id="drm"  onclick="confirm(\'Approve This Order ?\') ">Approve</a>
        		<a class="dropdown-item" id="drm"  onclick="confirm(\'Cancel This Order ?\')">Cancel</a>
        		
        	</div>
        	</div>
        </td>';

    echo "</tr>";
    $x++;
}
echo "</tbody>";
echo "</table>";
echo "</div>";


tablefoot2();