<div class="">

						<div class="col-md-12 col-sm-12 col-xs-12">

							<div class="panel panel-default card-view">

								<div class="panel-heading">

									<div class="pull-left">

										<h4 class="panel-title txt-dark">Recent Charges</h4>

									</div>

									<div class="clearfix"></div>

								</div>

                                <table id="" class="table table-compact display  pb-30">

                    <thead>

                        <tr>

                            <th>Sno</th>

                            <th>Item</th>

                            <!-- <th>Qty</th> -->

                            <th>Rate</th>

                            <th>Total</th>

                            <th>Served By</th>

                            <!-- <th>Status</th> -->

                            <th>Date</th>

                        </tr>

                    </thead>

</table>

								<div class="panel-wrapper collapse in">

									<div class="panel-body">										

                                        <div class="panel-group accordion-struct accordion-style-1" id="accordion_2" role="tablist" aria-multiselectable="true">

											

                                            <?php foreach($j as $k=>$l): 

                                                $status = $l[0]["status"]; 

                                                $txdate = date_format(new DateTime($l[0]["date"]),"d D M, Y") ;

                                                $total = array_sum(array_column($l,"total"));

                                            ?>

                                            <div class="panel panel-default">

												<div class="panel-heading <?=$m==1? 'activestate': null ?>" role="tab" id="heading_<?=$k?>">

                                                    <button class=' btn-xs btn btn-info' onclick='makepay("<?=$k?>")' ><?=$l[0]["a_status"] == 1? 'VIEW' : 'PAY'?> BILL 

                                                    </button> <span class='h5 pull-right mr-20'><strong>AMOUNT :</strong> KES. <?=$total?> </span>

													<a role="button" data-toggle="<?=$m==1? 'collapse': "collapsed" ?>" 

                                                    data-parent="#accordion_2" href="#collapse_<?=$k?>" 

                                                    aria-expanded="<?=$m==1? 'true': "false" ?>" >

                                                    <div class="icon-ac-wrap pr-20">

                                                    <span class="plus-ac"><i class="ti-plus"></i></span>

                                                    <span class="minus-ac"><i class="ti-plus"></i></span>

                                                    </div><strong>TXN #<?=$k."</strong> __ Date : ".$txdate ?>

                                                    <span class='pull-right '><?=$status?></span>

                                                    

                                                    </a> 

                                                    

												</div>

												<div id="collapse_<?=$k?>" class="panel-collapse collapse" role="tabpanel">

													<div class="panel-body pa-15 ml-50"> 

                                                    <table width='100%' class="ml-50 table-striped display">

                                                    <thead>

                                                        <tr>

                                                            <th></th>

                                                            <th></th>

                                                            <th></th>

                                                            <th></th>

                                                            <th></th>

                                                            <!-- <th></th> -->

                                                            <!-- <th></th> -->

                                                        </tr>

                                                    </thead>

                                                    <tbody>

                                                    <?php foreach($l as $o):  unset($o["status"]);unset($o["id"]);unset($o["txn"]); ?>

                                                        <tr>

                                                            <?php foreach($o as $p=>$r):?>

                                                                <td><?=$r?></td>

                                                            <?php endforeach;?>

                                                        </tr>

                                                    <?php endforeach; ?>

                                                    </tbody>

                                                    </table>



                                                    </div>

												</div>

											</div>

                                            <?php  endforeach;  ?>

										</div>

									</div>

								</div>

							</div>

					</div>

					</div>





                    <script>

                        function makepay(txn){

                            window.location.href = "<?=base_url("billing/paybill/")?>"+txn;

                        }

                    </script>