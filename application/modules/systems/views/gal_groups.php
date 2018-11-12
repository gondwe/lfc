<?php 

pf("Group ".$id);
$grpid = "grpsel".$id;

$stored = array_column($this->db->select('c')->where(["a"=>'groupstore',"b"=>$id])->get('dataconf')->result(), 'c');

foreach($groups as $g){
    $class = in_array($g->id, $stored) ? "btn-primary" : "alert-success btn-sm";
    echo '<button data-id="'.$g->id.'" data-xd="'.$id.'"  onclick="swell(this)" class="'.$grpid.' btn '.$class.' m-2" id="'.$g->id.'">'.rxx($g->name).'</button>';
}

?>


<script>

function swell(e) {
    $(e).toggleClass('btn-sm alert-success btn-primary');
    url = 'systems/activegal/pop/'+ $(e).data("xd") + "/" + $(e).data("id");
    $.post(url);
}

</script>



