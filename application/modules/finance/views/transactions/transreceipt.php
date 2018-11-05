
<?php
defined('BASEPATH') OR exit('');
?>
<?php if($allTransInfo):?>
<?php $sn = 1; ?>
<div id="transReceiptToPrint" class='d-print-block'>
    <div class="row">
        <div class="col-sm-12 text-center text-uppercase">
            <center style='margin-bottom:5px'><img src="<?=base_url()?>public/images/receipt_logo.png" alt="LIGHTHOUSE EYE CENTER" class="img-responsive" width="100px"></center>
            <div class="text-center"><b>Lighthouse Eye Center</b></div>
            <div>+254 724620888, +254 733226179</div>
            <b>ADDR:81465-80100 GPO,MSA</b><br>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-sm-12">
            <b><?=isset($transDate) ? date('jS M, Y h:i:sa', strtotime($transDate)) : ""?></b>
        </div>
    </div>
    <hr>
    <div class="row" style="margin-top:2px">
        <div class="col-sm-12">
            <label>Receipt No:</label>
            <span><?=isset($ref) ? $ref : ""?></span>
		</div>
    </div>
    
	<div class="row font-weight-bold">
		<div class="col-sm-4">Item</div>
		<div class="col-sm-4">QtyxPrice</div>
		<div class="col-sm-4 text-right">Tot(KES)</div>
	</div>
	<hr style='margin-top:2px; margin-bottom:0px'>
    <?php foreach($allTransInfo as $get):?>
        <div class="row">
            <div class="col-sm-4"><?=ellipsize($get['itemName'], 10);?></div>
            <div class="col-sm-4"><?=$get['quantity'] . "x" .number_format($get['unitPrice'], 2)?></div>
            <div class="col-sm-4 text-right"><?=number_format($get['totalPrice'], 2)?></div>
        </div>
    <?php endforeach; ?>
    <hr style='margin-top:2px; margin-bottom:0px'>       
    <div class="row">
        <div class="col-sm-12 text-right">
            <b>Discount(<?=$discountPercentage?>%): KES <?=isset($discountAmount) ? number_format($discountAmount, 2) : 0?></b>
        </div>
    </div>       
    <div class="row">
        <div class="col-sm-12 text-right">
            <?php if($vatPercentage > 0): ?>
            <b>VAT(<?=$vatPercentage?>%): KES <?=isset($vatAmount) ? number_format($vatAmount, 2) : ""?></b>
            <?php else: ?>
            VAT inclusive
            <?php endif; ?>
        </div>
    </div>      
    <div class="row">
        <div class="col-sm-12 text-right">
            <b>TOTAL: KES <?=isset($cumAmount) ? number_format($cumAmount, 2) : ""?></b>
        </div>
    </div>
    <hr style='margin-top:5px; margin-bottom:0px'>
    <div class="row margin-top-5">
        <div class="col-sm-12">
            <b>Mode of Payment: <?=isset($_mop) ? str_replace("_", " ", $_mop) : ""?></b>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <b>Amount Tendered: KES <?=isset($amountTendered) ? number_format($amountTendered, 2) : ""?></b>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <b>Change: KES <?=isset($changeDue) ? number_format($changeDue, 2) : ""?></b>
        </div>
    </div>
    <hr style='margin-top:5px; margin-bottom:0px'>
    <div class="row margin-top-5">
        <div class="col-sm-12">
            <b>Customer Name: <?=$cust_name?></b>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <b>Customer Phone: <?=$cust_phone?></b>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <b>Customer Email: <?=$cust_email?></b>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-12 text-center">Thank You.</div>
    </div>
</div>
<br class="hidden-print">
<div class="row hidden-print d-print-none">
    <div class="col-sm-12">
        <div class="text-center">
            <button type="button" class="btn btn-primary ptr">
                <i class="fa fa-print"></i> Print Receipt
            </button>
            
            <button type="button" data-dismiss='modal' class="btn btn-danger">
                <i class="fa fa-close"></i> Close
            </button>
        </div>
    </div>
</div>
<br class="hidden-print">
<?php endif;?>



<style>
 #transReceiptToPrint {
     font-family:consolas;
     font-size:12px;
    }
    
#transReceipt {
    /* margin:auto !important; */
 }
</style>