<?php
defined('BASEPATH') OR exit('');
?>

<div class="pwell hidden-print">   
                    <div class="rowd col-sm-12 ">
                        <button class="btn btn-primary btn-sm" data-toggle='modal' data-target='.newitem' id='createItems'>Add New Item</button>
                    </div>
                    <hr>
    <div class="col-sm-12">
        <!-- <div class="row"> -->
            <!-- sort and co row-->
            <div class="row">
                <!-- <div class="col-sm-12"> -->

                    <div class="col-sm-3 form-inline form-group-sm">
                        <label for="itemsListPerPage">Show</label>
                        <select id="itemsListPerPage" class="form-control">
                            <option value="1">1</option>
                            <option value="5">5</option>
                            <option value="10" selected>10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <label>per page</label>
                    </div>

                    <div class="col-sm-4 form-group-sm form-inline">
                        <label for="itemsListSortBy">Sort by</label>
                        <select id="itemsListSortBy" class="form-control">
                            <option value="name-ASC">Item Name (A-Z)</option>
                            <option value="code-ASC">Item Code (Ascending)</option>
                            <option value="unitPrice-DESC">Unit Price (Highest first)</option>
                            <option value="quantity-DESC">Quantity (Highest first)</option>
                            <option value="name-DESC">Item Name (Z-A)</option>
                            <option value="code-DESC">Item Code (Descending)</option>
                            <option value="unitPrice-ASC">Unit Price (lowest first)</option>
                            <option value="quantity-ASC">Quantity (lowest first)</option>
                        </select>
                    </div>

                    <div class="col-sm-3 form-inline form-group-sm">
                        <label for='itemSearch'><i class="fa fa-search"></i></label>
                        <input type="search" id="itemSearch" class="form-control" placeholder="Search Items">
                    </div>
                </div>
            </div>
            <!-- end of sort and co div-->
        </div>
    </div>
    
    <hr>
    
<div class="modal fade newitem" id="newitem" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
        <!-- <i class="fa fa-plus-circle text-primary"></i> -->
        ADD
        </h5>
        <!-- <div id="flashMsg">Msg here</div> -->
        <div class="pt-1 pl-2 text-danger" id='flashMsg'>Yes</div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fa fa-times-circle text-danger"></i>
          </span>
        </button>
      </div>
        <div class="modal-body">
      <!-- .... -->
       


    <!-- row of adding new item form and items list table--->
    
            <!---Form to add/update an item--->
            <div class="hidden" id='createNewItemDiv'>
                <div class="well">
                    <button class="btn btn-info btn-sm pull-left" id="useBarcodeScanner">Use Scanner</button>
                    <button class="close cancelAddItem">&times;</button><br>
                    <form name="addNewItemForm" id="addNewItemForm" role="form">
                        <div class="text-center errMsg" id='addCustErrMsg'></div>
                        
                        <br>
                        <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group-sm">
                                <!-- <label for="itemCode">Item Code</label> -->
                                <input type="text" id="itemCode" name="itemCode" placeholder="Item Code" maxlength="80"
                                    class="form-control" onchange="checkField(this.value, 'itemCodeErr')" autofocus>
                                <!--<span class="help-block"><input type="checkbox" id="gen4me"> auto-generate</span>-->
                                <span class="help-block errMsg" id="itemCodeErr"></span>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <div class="form-group-sm">
                                <!-- <label for="itemName">Item Name</label> -->
                                <input type="text" id="itemName" name="itemName" placeholder="Item Name" maxlength="80"
                                    class="form-control" onchange="checkField(this.value, 'itemNameErr')">
                                <span class="help-block errMsg" id="itemNameErr"></span>
                            </div>
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group-sm">
                                    <!-- <label for="itemQuantity">Quantity</label> -->
                                    <input type="number" id="itemQuantity" name="itemQuantity" placeholder="Available Quantity"
                                        class="form-control" min="0" onchange="checkField(this.value, 'itemQuantityErr')">
                                    <span class="help-block errMsg" id="itemQuantityErr"></span>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group-sm">
                                    <!-- <label for="unitPrice">(KES)Unit Price</label> -->
                                    <input type="text" id="itemPrice" name="itemPrice" placeholder="(KES)Unit Price" class="form-control"
                                        onchange="checkField(this.value, 'itemPriceErr')">
                                    <span class="help-block errMsg" id="itemPriceErr"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group-sm col-md-12 mb-3">
                                <!-- <label for="itemDescription" class="">Description (Optional)</label> -->
                                <textarea class="form-control" id="itemDescription" name="itemDescription" rows='4'
                                    cols='30' placeholder="Optional Item Description"></textarea>
                            </div>
                        </div>
                        <!-- <br> -->
                        <!-- <div class="row text-center"> -->
                            <!-- <div class="col-sm-6 form-group-sm"> -->
                                <button class="btn btn-primary btn-sm pull-right" id="addNewItem">Add Item</button>
                            <!-- </div> -->

                            <!-- <div class="col-sm-6 form-group-sm"> -->
                                <!-- <button type="reset" id="cancelAddItem" class="btn btn-danger btn-sm cancelAddItem" form='addNewItemForm'>Cancel</button> -->
                            <!-- </div> -->
                        <!-- </div> -->
                    </form><!-- end of form-->
                </div>
            </div>
            </div>
    </div>
  </div>
</div>

<div class="row">
        <div class="col-sm-12">
            
            <!--- Item list div-->
            <div class="col-sm-12" id="itemsListDiv">
                <!-- Item list Table-->
                <div class="row">
                    <div class="col-sm-12" id="itemsListTable"></div>
                </div>
                <!--end of table-->
            </div>
            <!--- End of item list div-->

        </div>
    </div>
    <!-- End of row of adding new item form and items list table--->
</div>




<!---modal to update stock--->
<div id="updateStockModal" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 >Update Stock</h5>
                <div id="stockUpdateFMsg" class="text-center"></div>
                <button class="fa-fa-close text-right" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form name="updateStockForm" id="updateStockForm" role="form">
                    <div class="row">
                        <div class="col-sm-4 form-group-sm">
                            <label>Item Name</label>
                            <input type="text" readonly id="stockUpdateItemName" class="form-control">
                        </div>
                        
                        <div class="col-sm-4 form-group-sm">
                            <label>Item Code</label>
                            <input type="text" readonly id="stockUpdateItemCode" class="form-control">
                        </div>
                        
                        <div class="col-sm-4 form-group-sm">
                            <label>Quantity in Stock</label>
                            <input type="text" readonly id="stockUpdateItemQInStock" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6 form-group-sm">
                            <label for="stockUpdateType">Update Type</label>
                            <select id="stockUpdateType" class="form-control checkField">
                                <option value="">---</option>
                                <option value="newStock">New Stock</option>
                                <option value="deficit">Deficit</option>
                            </select>
                            <span class="help-block errMsg" id="stockUpdateTypeErr"></span>
                        </div>
                        
                        <div class="col-sm-6 form-group-sm">
                            <label for="stockUpdateQuantity">Quantity</label>
                            <input type="number" id="stockUpdateQuantity" placeholder="Update Quantity"
                                class="form-control checkField" min="0">
                            <span class="help-block errMsg" id="stockUpdateQuantityErr"></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12 form-group-sm">
                            <label for="stockUpdateDescription" class="">Description</label>
                            <textarea class="form-control checkField" id="stockUpdateDescription" placeholder="Update Description"></textarea>
                            <span class="help-block errMsg" id="stockUpdateDescriptionErr"></span>
                        </div>
                    </div>
                    
                    <input type="hidden" id="stockUpdateItemId">
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="stockUpdateSubmit">Update</button>
                <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--end of modal--->



<!---modal to edit item-->
<div id="editItemModal" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="">Edit Item</h5>
                <div id="editItemFMsg" class="text-center"></div>
                <span class="fa fa-close" data-dismiss="modal"></span>
            </div>
            <div class="modal-body">
                <form name="addNewItemForm" id="addNewItemForm" role="form">
                    <div class="row">
                        <div class="col-sm-4 form-group-sm">
                            <label for="itemNameEdit">Item Name</label>
                            <input type="text" id="itemNameEdit" placeholder="Item Name" autofocus class="form-control checkField">
                            <span class="help-block errMsg" id="itemNameEditErr"></span>
                        </div>
                        
                        <div class="col-sm-4 form-group-sm">
                            <label for="itemCode">Item Code</label>
                            <input type="text" id="itemCodeEdit" class="form-control">
                            <span class="help-block errMsg" id="itemCodeEditErr"></span>
                        </div>
                        
                        <div class="col-sm-4 form-group-sm">
                            <label for="unitPrice">Unit Price</label>
                            <input type="text" id="itemPriceEdit" name="itemPrice" placeholder="Unit Price" class="form-control checkField">
                            <span class="help-block errMsg" id="itemPriceEditErr"></span>
                        </div>
                        
                        <div class="col-sm-4 form-group-sm">
                            <label for="reorder_level">Re-order Level</label>
                            <input type="text" id="reorder_levelEdit" name="reorder_level" placeholder="Reorder Level" class="form-control checkField">
                            <span class="help-block errMsg" id="reorder_levelEditErr"></span>
                        </div>
                        
                        <div class="col-sm-4 form-group-sm">
                            <label for="critical_level">Critical Level</label>
                            <input type="text" id="critical_levelEdit" name="critical_level" placeholder="Critical Level" class="form-control checkField">
                            <span class="help-block errMsg" id="critical_levelEditErr"></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12 form-group-sm">
                            <label for="itemDescriptionEdit" class="">Description (Optional)</label>
                            <textarea class="form-control" id="itemDescriptionEdit" placeholder="Optional Item Description"></textarea>
                        </div>
                    </div>
                    <input type="hidden" id="itemIdEdit">
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="editItemSubmit">Save</button>
                <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--end of modal--->
<script src="<?=base_url()?>public/js/items.js"></script>