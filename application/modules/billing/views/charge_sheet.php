<?php  ?>


<style>
    td {padding: 2px 1px 0px 15px;}
</style>

<div class="col-md-6 pull-left" style="border-right:1px solid #dcdcdc">
<div class="input-group">
<input type="text" required placeholder="Search" class="ssx form-control col-md-10 col-sm-8 col-xs-8" data-link="items-search" data-funct="showvals();" autofocus>
<input type="hidden" name="realval[]" id="realval">
<ul type="text" id="list"></ul>
<input type="number" placeholder="Qty" class="form-control col-md-2 col-sm-4 col-xs-4" required id="rate">
<div class="rowd m-2">
<h1 style='color:#ddd !important'>x <span id='itemrate' >00</span>.0</h1>
<h3 style='color:#ddd !important' id='itemname'>Search Item</h3>
</div>
</div>

</div>
<div class="col-md-6 pull-right">
<button onclick="clearcharge()" class="btn btn-danger btn-sm pull-right" style="margin-right:5px">CLEAR</button>
<h5>Charge Sheet</h5>
<hr>


<ol id="charges" class="alert rowd"></ol>
<p class='text-dark alert alert-secondary'>TOTAL KES : <span id='total'>0</span></p>

<button onclick="savecharge()" class="btn btn-primary pull-right">CHARGE & SAVE</button>
</div>

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
    pt = "<?=$prof->id?>";
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
    pf(queries.length)
    if(queries.length){
        
        $.post("<?=base_url("patient/savecharge")?>", {queries}, (res)=>{
            
        }).done(function(){    
            loadRecent();
            success("Charged !", "Charge sheet saved & queued");
            clearcharge()
        })
    }else{
        danger("Warning !", "Charge sheet empty !");
    }
}


function clearcharge(){
    $("#charges").html("");
    $("#total").html("0");
    queries = [];
    tots = [];
}


function add(a, b) { return a + b; }

function donefunct(item){
    $("#itemname").text(item);
    $("#itemrate").text(data_params.rate);
    rate.val("");
    rate.focus();
}

</script>
<div class="rowd"></div>
