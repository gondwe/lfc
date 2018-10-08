<?php 
$x=0;
$data["p_options"] = $p_options;
$data["bill_status"] = $bill_status;
$data["bill_no"] = $billno;

// pf($_SESSION["infoh"]);
// pf($_SESSION["errorh"]);

?>
<div class="">
    <div class="" style=''>
        <?=topic('Billing')?>
        <div class="col-lg-6 col-md-6 col-sm-12 pull-left text-secondary" id="pdf">
                <hr>
            <?php foreach(current($charges) as $a=>$b): $x++; ?>
                <div class='pull-left' >
                    <span class=''><?=$x?>. <?=$b->item?></span>
                    <span style="" class=''><?=$b->rate." " ?></span>
                </div>
                <div class='text-right pr-4' >KES.<?=$b->total?></div>
            <?php endforeach; ?>
            <hr>
            <div class="text-right pr-4">
                    <div class="">TOTAL KES.<?=number_format($total,2)?></div>
                    <div class="">PAID KES.<?=number_format($lastpay,2)?></div>
                    <div class="">BALANCE KES.<?=number_format($paidup,2)?></div>
                    <div class="text-secondary"><small> Served by <?=$b->user?></small></div>
            </div>
            <hr>
            <div class="text-right m-3">
                <button onclick="sendpdf()" class=" btn btn-<?=$bill_status ==1? 'primary' : 'info' ?>" >PRINT RECEIPT</button>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 pull-right  pbox pt-3">
            <?php if($bill_status <> 1) $this->load->view('paymentform', $data) ?>
        </div>
    </div>
</div>


<script>
    function sendpdf(){
        content = $("#pdf").html().trim();
            $.post("<?=base_url('printer/create')?>",{"cont":content},(res)=>{
        }).done(function(){
            window.location = '<?=base_url('printer/receipt')?>';
        }

            
        )
    }
</script>