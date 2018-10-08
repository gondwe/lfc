
<?php

?>

<form action="<?=base_url("billing/payment/".$billno)?>" method="post">
            <input type="hidden" name="txn" value='<?=$billno?>'>
            <span class="change pull-left"></span>
            <?php foreach($p_options as $p=>$o): $chk=preg_match('/cash/i',$o)? 'checked' : null ?>
                <div class='mr-2 text-right text-info'>
                <input type='radio' <?=$chk?>  class='' value="<?=$p?>" required name='pmethod' >
                <label for=""><?=$o?></label>
                </div>
            <?php endforeach; ?>

            
            <input id="amt" type="number" <?=$bill_status <> 1? 'null' : 'disabled' ?> required required placeholder="AMOUNT" autofocus name="amount" class="form-control">
        <div class="buttons text-center p-3">
        <?php if($bill_status <> 1){ ?>
            <input type="submit" class="btn alert-success btn-success" value="SUBMIT PAYMENT" />
        <?php }else{ ?>
           
        <?php }?>
        </div>

</form>

<style>
    .pbox {
        border:1px solid #ddd;
        /* border-radius:10px; */
    }
    .change{
        color:#dadc;
        font-size:40px;
    }
    
</style>


<script>
    $("#amt").keyup(function(e){
        $ex = "<?=$paidup?>";
        $b = this.value - $ex ;
        $(".change").text($b)
    })
    
    function pdfme(){ 
        div = $("#pdf").html(); 
        $.post("<?=base_url('billing/preparedocument')?>", 
        {"div":div}, 
        function(i){ 
            window.location.href="<?=base_url('billing/printdocument')?>"; 
        }); }
</script>