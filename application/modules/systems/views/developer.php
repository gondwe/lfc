

<h4 class="m-3 text-dim">skylark/testsite/</h4>
<?php 


/*
//setting and unsetting stack 
@param $section
@param $action
@param $data

$j = $this->patient_model->qstack("testing","set", '11');
$j = $this->patient_model->qstack("testing","get");


pf($j);

*/
// $a = $this->db->select("id")->where("username", "steve")->get("users")->row('id');
// pf($a);
pf($_SESSION);

// $a = [1,2,3];

// $b = array_splice($a,0,1);

// pf($a);
// pf($b);


// if(2>1){
//     pnote('reception', 'screening', 'patient #345 in queue');
// }

// function pnote($from, $to, $msg){
//     echo "
    
//     <script>
//         $.post('systems/notifications/".$from."/".$to."/".$msg."' )
//     </script>
    
//     ";
// }

$a = ["skylark_doctor","skylark_optical","skylark_cashier","skylark_pharmacy","skylark_theatre","skylark_finance",];

// echo $j = insertJoin($a, 'group_cat');

// process("insert into dataconf(a,b) values $j");

for($x=0;$x<10;$x++){
    ws(1,$x,"Two");
}
















?>
