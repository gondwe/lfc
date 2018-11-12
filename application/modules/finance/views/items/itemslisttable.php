<?php defined('BASEPATH') OR exit('') ?>

<?= isset($range) && !empty($range) ? $range : ""; ?>
<div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">Items</div>
    <?php if($allItems): ?>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped" style="background-color: #f5f5f5">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>ITEM NAME</th>
                    <th>ITEM CODE</th>
                    <th>DESCRIPTION</th>
                    <th>QTY IN STOCK</th>
                    <th>UNIT PRICE</th>
                    <th>TOTAL SOLD</th>
                    <th>TOTAL EARNED ON ITEM</th>
                    <th>UPDATE QTY</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($allItems as $get): ?>
                <tr>
                    <input type="hidden" value="<?=$get->id?>" class="curItemId">
                    <th class="itemSN"><?=$sn?>.</th>
                    <td><span id="itemName-<?=$get->id?>"><?=$get->name?></span></td>
                    <td><span id="itemCode-<?=$get->id?>"><?=$get->code?></td>
                    <td>
                        <span id="itemDesc-<?=$get->id?>" data-toggle="tooltip" title="<?=$get->description?>" data-placement="auto">
                            <?=word_limiter($get->description, 15)?>
                        </span>
                    </td>
                    <td class="<?=$get->quantity <= $get->critical_level ? 'bg-danger' : ($get->quantity <= $get->reorder_level ? 'bg-warning' : '')?>">
                        <span id="itemQuantity-<?=$get->id?>"><?=$get->quantity?></span>
                    </td>
                    <td><span id="itemPrice-<?=$get->id?>"><?=number_format($get->unitPrice, 2)?></span></td>
                    <td><?=$this->genmod->gettablecol('transactions', 'SUM(quantity)', 'itemCode', $get->code)?></td>
                    <td>
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