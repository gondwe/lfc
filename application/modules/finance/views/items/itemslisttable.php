<?php defined('BASEPATH') OR exit('') ?>

<?=isset($range) && !empty($range) ? $range : ""; ?>
<div class="panel panel-primary">
    <!-- Default panel contents -->
    <!-- <div class="panel-heading">Items</div> -->
    <?php if($allItems): ?>
    <div class="ml-md-3">
        <table class="table table-bordered bg-white" style="">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>NAME</th>
                    <th>CODE</th>
                    <th>DESCRIPTION</th>
                    <th>QTY</th>
                    <th>UNIT PRICE</th>
                    <th>TOTAL SOLD</th>
                    <th>TOTAL EARNED</th>
                    <th><i class="fa fa-refresh text-primary"></i></th>
                    <th><i class="fa fa-edit text-secondary"></i></th>
                    <th><i class="fa fa-trash text-secondary"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($allItems as $get): ?>
                <tr>
                    <input type="hidden" value="<?=$get->id?>" class="curItemId">
                    <td class="text-center itemSN"><?=$sn?>.</td>
                    <td><span id="itemName-<?=$get->id?>"><?=$get->name?></span></td>
                    <td><span id="itemCode-<?=$get->id?>"><?=$get->code?></td>
                    <td>
                        <span id="itemDesc-<?=$get->id?>" data-toggle="tooltip" title="<?=$get->description?>" data-placement="auto">
                            <?=word_limiter($get->description, 15)?>
                        </span>
                    </td>
                    <td class="text-center <?=$get->quantity <= $get->critical_level ? 'bg-danger' : ($get->quantity <= $get->reorder_level ? 'bg-warning' : '')?>">
                        <span id="itemQuantity-<?=$get->id?>"><?=$get->quantity?></span>
                    </td>
                    <td class="text-right"><span  id="itemPrice-<?=$get->id?>"><?=number_format($get->unitPrice, 2)?></span></td>
                    <td class="text-center"><?=$this->genmod->gettablecol('transactions', 'SUM(quantity)', 'itemCode', $get->code)?></td>
                    <td class="text-right">
                        <?=number_format($this->genmod->gettablecol('transactions', 'SUM(totalPrice)', 'itemCode', $get->code), 2)?>
                    </td>
                    <td class="text-center"><a class="pointer updateStock" id="stock-<?=$get->id?>"><i class="fa fa-chevron-circle-down text-success"></i></a></td>
                    <td class="text-center text-primary">
                        <span id="rc-<?=$get->id?>" data-critical="<?=$get->critical_level?>" data-reorder="<?=$get->reorder_level?>" ></span>
                        <span class="editItem" id="edit-<?=$get->id?>"><i class="fa fa-pencil pointer"></i> </span>
                    </td>
                    <td class="text-center"><i class="fa fa-trash text-danger delItem pointer"></i></td>
                </tr>
                <?php $sn++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<!-- table div end--->
    <?php else: ?>
    <ul><li>No items</li></ul>
    <?php endif; ?>
</div>
<!--- panel end-->
    
<!---Pagination div-->
<div class="col-sm-12 text-center">
    <ul class="pagination">
        <?= isset($links) ? $links : "" ?>
    </ul>
</div>

<style>
.table th {
    background:#b8e785;
}
.table td, .table th {
    padding:5px !important;
}
</style>