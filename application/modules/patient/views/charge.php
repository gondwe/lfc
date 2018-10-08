<?php
echo topic("Add charges");
// pf($profile);
$patient = $prof = current($profile);
// pf($items);
// pf($charges);
$id = $prof->id;
$data["prof"]=$prof;
$data["charges"]=$charges
?>





<?php 
// $this->load->view("patient/stripe",["patient_details"=>$patient]);

$sno = 1;
$j = $charges;

    $this->load->view('billing/charge_sheet',$data);
?>

<hr>
<?=topic("previous charges")?>
<div class="recent">
<?php
    // $url =  $this->load->view("billing/recent", [$data], TRUE);
    // echo $url;
?>
</div>


<style>
    #list {
        position: absolute;
        z-index: 1030;
        overflow:hidden;
        margin-top:40px
        /* background:#fff; */
    }
    #list li {
        list-style:none;
        border-bottom:1px solid #ddd
    }

    #list li:hover {
        background:yellow !important;
    }

    #charges li {
        display:inline-list
    }

    .card-body {
        border-bottom: 1px solid rosybrown;
    }
</style>


<script>
$(document).ready(function(){ loadRecent(); })

function loadRecent(){
    $(".recent").load("<?=base_url('billing/recent/'.$patient->id)?>")
}
</script>