<h5 class="mx-md-5">Pharmacy</h5>
<div class="mx-3">
<div class="row">
<div class="card-body pull-left mb-3 ">
        <div class="">
            <div class="p-1 bg-info text-center font-weight-bold text-light">
                PRODUCT ANALYTICS
            </div>
            <div class="card-body bg-light mx-3 text-center border border-top-0 border-info row text-secondary bg-white">
                <div class="col border-right text-left">
                    <span class="text-success lead">HIGH DEMAND<span class="pull-right">Qty Sold</span></span>
                    <ol>
                    <?php 
                        foreach ($topDemanded as $key => $value):
                            echo '<span class="">
                            <li class="col text-left">'.$value->name.'<span class="pull-right text-success">'.$value->totSold.'</span>
                            </li>
                            </span>';
                        endforeach;
                    ?>
                    </ol>
                </div>
                <div class="col border-right text-left">
                    <span class="text-danger lead">LOW DEMAND<span class="pull-right">Qty Sold</span></span>
                    <ol>
                    <?php 
                        foreach ($leastDemanded as $key => $value):
                            echo '<span class="">
                            <li class="col text-left">'.$value->name.'<span class="pull-right text-danger">'.$value->totSold.'</span>
                            </li>
                            </span>';
                        endforeach;
                        
                    ?>
                    </ol>
                </div>
                <!-- <div class="col">sfsdf</div> -->
            </div>
        </div> 
    </div>

</div>
</div>
<?php
// pf($topDemanded);
$this->load->view("finance/items/items");
?>


<script>
    // $("document").ready(function(){
    //     $(".table").removeClass("table-striped table-bordered");
    // });
</script>