<?php 

// pf($patient);
$p = current($patient);
echo topic("theatre list");

foreach($list as $date => $item){
    $this->load->view("upcoming",["data"=>$item, "date"=>$date]);
}

$this->load->view("theatreModal", ["p"=>$p]);
?>


<style>
    #pcount {
        font-size:50px;
        color:#ddd !important;
    }
</style>



