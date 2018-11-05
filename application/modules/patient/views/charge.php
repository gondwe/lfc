<?php
$patient = $prof = current($profile);
$id = $prof->id;
?>


<h5 class='m-4 pull-left'><?=pflink($id);?></h5>
<a href="<?=base_url('billing/recent/'.$id)?>" class="mt-4 pull-right btn alert-info btn-sm">PREVIOUS TXNS</a>
<hr>
<?php

// echo topic("Add charges");
$data["prof"]=$prof;
$data["charges"]=$charges
?>


<style>
    h2 {
        color:#ddd !important;
    }
</style>



<?php 
    $sno = 1;
    $j = $charges;
    $this->load->view('billing/charge_sheet',$data);
?>

<!-- <hr> -->

<div class="recent">

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

