<?php
echo topic("Add charges");
// pf($profile);
$patient = $prof = current($profile);
// pf($items);
// pf($charges);
$id = $prof->id;
?>





<?php 
// $this->load->view("patient/stripe",["patient_details"=>$patient]);

$sno = 1;
$j = $charges;

?>

<style>
    td {padding: 2px 1px 0px 15px;}
</style>

<div class="col-md-6 pull-left">
<!-- <label for="">Item/Service</label> -->
<div class="input-group">
<input type="text" required placeholder="Search" class="ssx form-control col-md-10 col-sm-8 col-xs-8" data-link="items-search" data-funct="showvals();" autofocus>
<input type="hidden" name="realval[]" id="realval">
<ul type="text" id="list"></ul>
<input type="number" placeholder="Qty" class="form-control col-md-2 col-sm-4 col-xs-4" required id="rate">
<div class="rowd m-2">
<h1 >x <span id='itemrate'>00</span>.0</h1>
<h3 id='itemname'>Search Item</h3>
</div>
</div>

</div>
<div class="col-md-6 pull-right">
<button onclick="clearcharge()" class="btn btn-danger btn-sm pull-right" style="margin-right:5px">CLEAR</button>
<h5>Charge Sheet</h5>
<hr>


<ol id="charges" class="alert rowd"></ol>
<p class='text-dark alert alert-secondary'>TOTAL KES : <span id='total'>0</span></p>

<button onclick="savecharge()" class="btn btn-info btn-sm pull-right">CHARGE & SAVE</button>
</div>
<!-- </div> -->










<script>
tots = [];
queries = [];
const rate = $("#rate");


rate.keyup(
    function (){
        if(event.keyCode == "13"){
            addcharge();
            $(".ssx").val("");
            $(".ssx").focus();
        }
    }
);
    
function addcharge(){
    qty = rate.val();
    pt=0;
    id = data_params.id;
    qty = qty == "" ? 0 : qty
    unitcost = data_params.rate;
    tot = unitcost * qty;
    if(qty > 0){
        tots.push(tot);
        queries.push([id,pt,qty,unitcost]);
        var sum = tots.reduce(add, 0);
        $("#charges")
        .append("<li ><span class='pull-left'>"+
        item+"</span> <span class='pull-right'>"+
        qty+" X "+ 
        unitcost + " = "+
        tot +" </span></li>");
        $("#total").html(sum);
    }
}


function savecharge(){
$.post("<?=base_url("patient/savecharge")?>", {queries}, (res)=>{
}).done(function(){    
    swal("Charged !", "Charge sheet saved & queued", "success");
    $("#charges").fadeOut();
}

)
}
function clearcharge(){
    $("#charges").fadeOut();
    $("#total").text("0");
    queries = [];
    tots = [];
}
function add(a, b) {
return a + b;
}




function donefunct(item){
    // pf(data_params)
    $("#itemname").text(item);
    $("#itemrate").text(data_params.rate);
    rate.val("");
    rate.focus();
    // rate.select();
    // pf(rate);
}




</script>
<?php
// spill($charges);
// $this->load->view("billing/recent", ["j"=>$charges, "m"=>1, "sno"=>1 ]);
?>


<style>
    #list {
        position: absolute;
        z-index: 1030;
        overflow:hidden;
        margin-top:40px
        /* background:#fff; */
    }
    #list li {
        list-style:none;
        border-bottom:1px solid #ddd
    }

    #list li:hover {
        background:yellow !important;
    }

    #charges li {
        display:inline-list
    }
</style>