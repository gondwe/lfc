<?php 



    $bill_to = current($bill_to);

    $names = $bill_to->patient_names;

    $total = array_sum(array_column(current($charges),"total"));

    // $this->load->view("patient/stripe",["patient_details"=>$bill_to]);



?>

<h4><?=rx($names)?></h4>

<h6>Patient Bill : <?=$bill_status ==1? 'PAID' : 'KES.'.number_format($total,2) ?></h6>

<h6><?=$bill_status==1? "<button class='btn btn-success btn-outline pull-right btn-icon right-icon btn-lg'>

                        <span>PAID</span><i class='fa fa-check'></i></button>" : 

                        

                        "<button class='btn btn-primary mt-30 mb-10  pull-right btn-icon right-icon btn-lg btn btn-rounded'><span>INVOICED</span>

                        <i class='fa fa-chekck'></i></button>" ?></h6>

<?php 





$x=0;





?>

<script>

    function pdfme(){ div = $("#pdf").html(); $.post("<?=base_url('billing/preparedocument')?>", 

                    {"div":div}, function(i){ window.location.href="<?=base_url('billing/printdocument')?>"; }); }

</script>



<div class="content mt-20 ml-10">

    <div class="col-md-8 col-sm-12 col-xs-12 well pull-center pt-20" style=''>

    <h4>Charge Sheet</h4>

        <div class="ml-30 mr-20  mt-20" id="pdf">

            <?php foreach(current($charges) as $a=>$b): $x++; ?>

                <div class='row' ><span class='pull-left'><?=$x?>. <?=$b->item?></span>

                    <span class='pull-right pl-30' >KES.<?=$b->total?>

                </span><span style="" class='pull-right pl-10'><?=$b->rate." " ?></span></div>

            <?php endforeach; ?>

            <div class="row text-right h4">TOTAL KES.<?=number_format($total,2)?></div>

            <div class="row text-right h6">Served by <?=$b->user?></div>

        </div>

                <button onclick="pdfme()" class="<?=$bill_status == 2? 'null' : 'disabled' ?> btn btn-info pull-right" >PRINT INVOICE</button>

            <form action="<?=base_url("billing/payment/".$billno)?>" method="post">

                <input type="hidden" name="txn" value='<?=$billno?>'>

                <input <?=$bill_status <> 1? 'null' : 'disabled' ?> type="submit" class="btn btn-primary pull-right mr-10" value="PAY" />

                

                <div class="col-sm-3 pull-right">

                    <select required name="pmethod" id="" class="form-control ">

                        <option value="">SELECT METHOD</option>

                        <?php foreach($p_options as $p=>$o): ?>

                            <option value="<?=$p?>"><?=$o?></option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <a href="<?=base_url("billing/invoice/".$billno)?>" class="<?=$bill_status == 2? 'disabled' : null ?> btn btn-info pull-left mr-10">INVOICE</a>

            </form>

            </div>

        </div>

       

    <div class="col-md-4 col-sm-6 col-xs-12"></div>



