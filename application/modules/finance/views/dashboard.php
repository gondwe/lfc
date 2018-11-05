<?php
defined('BASEPATH') OR exit('');
?>

<style>
.bg-orange{
    background:gold
}
.bg-rebecca{
    background:darkorange;
}
.bg-brown{
    background:dodgerblue;
}
</style>
<?=topic("finance dashboard")?>
<div class="m-3 row latestStuffs">
    <div class="col-lg-4 col-mg-4 col-sm-6 text-center mb-3">
        <div class="">
            <div class="card-title p-1 bg-dark text-light">
                TOTAL SALES TODAY
            </div>
            <div class="card-body bg-orange">
                <h1 class="font-weight-bold text-light"><?=$totalSalesToday?></h1>
                <div class="card-text font-weight-light">Number of Items Sold Today</div>
                <!-- <a href="#" class="btn btn-primary btn-sm  ml-3">View Txns</a> -->
            </div>
        </div> 
    </div>

    <div class="col-lg-4 col-mg-4 col-sm-6 text-center mb-3">
        <div class="">
            <div class="card-title p-1 bg-dark text-light">
                TOTAL TRANSACTIONS
            </div>
            <div class="card-body text-light bg-rebecca">
                <h1 class="font-weight-bold text-light"><?=$totalTransactions?></h1>
                <div class="card-text font-weight-light">All-time Total Transactions</div>
                <!-- <a href="#" class="btn btn-primary btn-sm  ml-3">View Txns</a> -->
            </div>
        </div> 
    </div>

    <div class="col-lg-4 col-mg-4 col-sm-6 text-center mb-3">
        <div class="">
            <div class="card-title p-1 bg-dark text-light">
                ITEMS IN STOCK
            </div>

            <div class="card-body bg-brown">
                <h1 class="font-weight-bold text-light"><?=$totalItems?></h1>
                <div class="card-text font-weight-light">Total Items in Stock</div>
                <!-- <a href="#" class="btn btn-primary btn-sm  ml-3">View Txns</a> -->
            </div>
        </div> 
    </div>
</div>
<hr>    
<!-- ROW OF GRAPH/CHART OF EARNINGS PER MONTH/YEAR-->
<div class="row m-3">
    <div class="col-sm-12 col-md-12 col-lg-9">
        <div class="box">
            <div class="box-header" style="background-color:/*#33c9dd*/#fff;">
              <h5 class="box-title" id="earningsTitle"></h5>
            </div>

            <div class="box-body" style="background:darkcyan" >
              <canvas style="padding-right:25px" id="earningsGraph" width="200" height="80"/></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-12 col-lg-3">
        <section class="mb-3">
            <label class="control-label h5">Select Account Year:</label>
            <select class="form-control" id="earningAndExpenseYear">
                <?php $years = range("2016", date('Y')); ?>
                <?php foreach($years as $y):?>
                <option value="<?=$y?>" <?=$y == date('Y') ? 'selected' : ''?>><?=$y?></option>
                <?php endforeach; ?>
            </select>
            <span id="yearAccountLoading"></span>
        </section>
        
        <section class="mb-3">
          <center>
              <canvas id="paymentMethodChart" width="200" height="200"/></canvas><br>Payment Methods(%)<span id="paymentMethodYear"></span>
          </center>
        </section>
    </div>
</div>
<!-- END OF ROW OF GRAPH/CHART OF EARNINGS PER MONTH/YEAR-->
<hr>
<!-- ROW OF SUMMARY -->
<div class="row m-3 mt-5">
    <div class="col-sm-12 col-md-4 col-lg-3">
        <div class="card-hash">
            <div class="card-heading bg-dark text-light p-1 text-center"><i class="fa fa-cart-plus"></i> HIGH IN DEMAND</div>
            <?php if($topDemanded): ?>
            <table class="table table-striped col-md-12" >
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Qty Sold</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($topDemanded as $get):?>
                    <tr>
                        <td><?=$get->name?></td>
                        <td><?=$get->totSold?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            No Transactions
            <?php endif; ?>
        </div>
    </div>
    
    <div class="col-sm-12 col-md-4 col-lg-3">
        <div class="card-hash">
            <div class="card-heading bg-dark text-light p-1 text-center"><i class="fa fa-cart-arrow-down"></i> LOW IN DEMAND</div>
            <?php if($leastDemanded): ?>
            <table class="table table-striped col-md-12">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Qty Sold</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($leastDemanded as $get):?>
                    <tr>
                        <td><?=$get->name?></td>
                        <td><?=$get->totSold?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            No Transactions
            <?php endif; ?>
        </div>
    </div>
    
    <div class="col-sm-12 col-md-4 col-lg-3">
        <div class="card-hash">
            <div class="card-heading bg-dark text-light p-1 text-center"><i class="fa fa-money"></i> HIGHEST EARNING</div>
            <?php if($highestEarners): ?>
            <table class="table table-striped col-md-12">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Total Earned</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($highestEarners as $get):?>
                    <tr>
                        <td><?=$get->name?></td>
                        <td>KES <?=number_format($get->totEarned, 2)?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            No Transactions
            <?php endif; ?> 
        </div>
    </div>
    
    <div class="col-sm-12 col-md-4 col-lg-3">
        <div class="card-hash">
            <div class="card-heading bg-dark text-light p-1 text-center"><i class="fa fa-money"></i> LOWEST EARNING</div>
            <?php if($lowestEarners): ?>
            <table class="table table-striped col-md-12">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Total Earned</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($lowestEarners as $get):?>
                    <tr>
                        <td><?=$get->name?></td>
                        <td>KES <?=number_format($get->totEarned, 2)?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            No Transactions
            <?php endif; ?> 
        </div>
    </div>
</div>
<!-- END OF ROW OF SUMMARY -->

<div class="row m-3">
    <div class="col-sm-12 col-md-6 col-lg-6">
        <div class="card-hash">
            <div class="card-heading bg-dark text-light p-1 text-center">Daily Transactions</div>
            
                <?php if(isset($dailyTransactions) && $dailyTransactions): ?>
                <table class="table table-striped col-md-12">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Qty Sold</th>
                            <th>Tot. Trans</th>
                            <th>Tot. Earned</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($dailyTransactions as $get): ?>
                        <tr>
                            <td><?=
                                    date('jS M, Y', strtotime($get->transDate)) === date('jS M, Y', time())
                                    ? 
                                    "Today" 
                                    : 
                                    date('jS M, Y', strtotime($get->transDate));
                                ?>
                            </td>
                            <td><?=$get->qty_sold?></td>
                            <td><?=$get->tot_trans?></td>
                            <td>KES <?=number_format($get->tot_earned, 2)?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php else: ?>
                <li>No Transactions</li>
                <?php endif; ?>
            
        </div>
    </div>
    
    
    <div class="col-sm-12 col-md-6 col-lg-6">
        <div class="card-hash">
            <div class="card-heading bg-dark text-light p-1 text-center">Transactions by Days</div>
                <?php if(isset($transByDays) && $transByDays): ?>
                <table class="table table-striped col-md-12">
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th>Qty Sold</th>
                            <th>Tot. Trans</th>
                            <th>Tot. Earned</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($transByDays as $get): ?>
                        <tr>
                            <td><?=$get->day?>s</td>
                            <td><?=$get->qty_sold?></td>
                            <td><?=$get->tot_trans?></td>
                            <td>KES <?=number_format($get->tot_earned, 2)?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php else: ?>
                <li>No Transactions</li>
                <?php endif; ?>
        </div>
    </div>
</div>



<div class="row m-3">
    <div class="col-sm-6">
        <div class="card-hash">
            <div class="card-heading bg-dark text-light p-1 text-center">Transactions by Months</div>
                <?php if(isset($transByMonths) && $transByMonths): ?>
                <table class="table table-striped col-md-12">
                    <thead>
                        <tr>
                            <th>Month</th>
                            <th>Qty Sold</th>
                            <th>Tot. Trans</th>
                            <th>Tot. Earned</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($transByMonths as $get): ?>
                        <tr>
                            <td><?=$get->month?></td>
                            <td><?=$get->qty_sold?></td>
                            <td><?=$get->tot_trans?></td>
                            <td>KES <?=number_format($get->tot_earned, 2)?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php else: ?>
                <li>No Transactions</li>
                <?php endif; ?>
        </div>
    </div>
    
    
    <div class="col-sm-6">
        <div class="card-hash">
            <div class="card-heading bg-dark text-light p-1 text-center">Transactions by Years</div>
                <?php if(isset($transByYears) && $transByYears): ?>
                <table class="table table-striped col-md-12">
                    <thead>
                        <tr>
                            <th>Year</th>
                            <th>Qty Sold</th>
                            <th>Tot. Trans</th>
                            <th>Tot. Earned</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($transByYears as $get): ?>
                        <tr>
                            <td><?=$get->year?></td>
                            <td><?=$get->qty_sold?></td>
                            <td><?=$get->tot_trans?></td>
                            <td>KES <?=number_format($get->tot_earned, 2)?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php else: ?>
                <li>No Transactions</li>
                <?php endif; ?>
        </div>
    </div>
</div>

<script src="<?=base_url('public/js/chart.js'); ?>"></script>
<script src="<?=base_url('public/js/dashboard.js')?>"></script>


<style>
    .card-heading bg-dark text-light p-1 {
        padding: 2px;
        padding-left: 10px;
    }

    .card-hash {
        margin-bottom:15px;
    }

    table {
        border-left:1px solid #ddd;
    }

    thead th {
        background:orange;
        padding:5px !important;
    }
</style>