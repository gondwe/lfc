<?php 

    function titles($i="Records/Add"){
        $page = ($_SERVER["QUERY_STRING"]);
		$j = array_reverse(explode("/",$page));$l = current($j);
		foreach($j as $k){ if(!is_numeric($k)){ $l = $k; break;} }
		$j = $l; 
        
        // custom names not to confuse db tables 
        switch(strtolower($j)){
            case "patient_master" : $k="patient"; break;
            default : $k = $j; break;
        }
        
        return strlen($k)>1 ? rxx($k) : $i;
    }

    function tablefoot(){
		echo "
		<script>
		$(document).ready(function() {
			$('#example').DataTable();
		} );
		</script>
		";
	}
	
	function tablefoot2(){
		echo "
		<script>
		$(document).ready(function() {
			$('#example').DataTable({
				'paging':   false,
				'ordering': false,
				'info':     false,
				'searching' : false
			});
		} );
		
		</script>
		
		";
	}
	function tablefoot3(){
		echo "
		<script>
		$(document).ready(function() {
			$('#example').DataTable({
				'ordering': false,
				'info':     false,
				'pageLength': 15
			});
		} );
		
		</script>
		
		";
	}
function hr(){
	echo "<p style='width:110%; border-top:1px solid #aaa; opacity:0.4; height:1px; background:#ccc; margin-left:-100px; margin-bottom:10px'></p>";
}

	
function datatable($i,$addnew=null, $editor=true){
    $i = (array)$i;
    // spill($i);
    $fields = array_keys(get_object_vars(current($i)));
	// spill($fields);
	echo '<div style="margin:5px; margin-top:20px; margin-left:20px">';

	if($addnew){
		echo '<a href="#'.$addnew.'" class="btn btn-sm btn-success mb-3">ADD NEW</a>';
	}
	hr();

	
	
	echo '<table id="example" class="display compact striped hover" style="width:100%;"><thead>';
	echo '<tr style="background: #607D8B;color: white;font-weight: lighter;border-right: 1px solid black;">';
	$noidfield = !in_array("id",$fields);
	if($noidfield)echo '<th>Sno</th>';
    foreach($fields as $f){ echo "<th style='border-left: 1px solid white;' >".rxx($f)."</th>"; }
	if($editor) echo '<th>ACTION</th>';
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
			if($editor) echo '<td>
			<div class="dropdown">
				<button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenuButton$x" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Edit
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton$x">
					<button class="dropdown-item" id="drm"  onclick="confirm(\'Edit This Record ?\'); ">Edit</button>
					<button class="dropdown-item" id="drm"  onclick="confirm(\'View This Record ?\')">View</button>
					<button class="dropdown-item" id="drm"  onclick="confirm(\'You are about to delete 1 Record ! \n ARE YOU SURE ?\')">Delete</button>
				</div>
				</div>
			</td>';

        echo "</tr>";
        $x++;
    }
    echo "</tbody>";
    echo "</table>";
	echo "</div>";
	

    tablefoot();
}
	
function table($i,$addnew=null, $editor=true){
    $i = (array)$i;
    // spill($i);
    $fields = array_keys(get_object_vars(current($i)));
	// spill($fields);
	echo '<div style="margin:5px; margin-top:20px; margin-left:20px">';

	if($addnew){
		echo '<a href="#'.$addnew.'" class="btn btn-sm btn-success mb-3">ADD NEW</a>';
	}
	hr();

	echo '<table id="example" class="display compact striped hover" style="width:100%;"><thead>';
	echo '<tr style="background: #607D8B;color: white;font-weight: lighter;border-right: 1px solid black;">';
	$noidfield = !in_array("id",$fields);
	if($noidfield)echo '<th>Sno</th>';
    foreach($fields as $f){ echo "<th style='border-left: 1px solid white;' >".rxx($f)."</th>"; }
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
        echo "</tr>";
        $x++;
    }
    echo "</tbody>";
    echo "</table>";
	echo "</div>";
	

    tablefoot2();
}
	
function table2($i,$addnew=null, $editor=true){
    $i = (array)$i;
    // spill($i);
    $fields = array_keys(get_object_vars(current($i)));
	// spill($fields);
	echo '<div style="margin:5px; margin-top:20px; margin-left:20px">';

	if($addnew){
		echo '<a href="#'.$addnew.'" class="btn btn-sm btn-success mb-3">ADD NEW</a>';
	}
	hr();

	echo '<table id="example" class="display compact striped hover" style="width:100%;"><thead>';
	echo '<tr style="background: #607D8B;color: white;font-weight: lighter;border-right: 1px solid black;">';
	$noidfield = !in_array("id",$fields);
	if($noidfield)echo '<th>Sno</th>';
    foreach($fields as $f){ echo "<th style='border-left: 1px solid white;' >".rxx($f)."</th>"; }
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
        echo "</tr>";
        $x++;
    }
    echo "</tbody>";
    echo "</table>";
	echo "</div>";
	

    tablefoot3();
}
