<?php
    $prof = current($profile);
    // pf($prof);
    // exit();
?>

<!-- <hr> -->
<h1 class='col-xs-12 col-sm-10 col-md-12 col-lg-6'>
    <span class=''><?=rxx($prof->patient_names)?> 
        <span class="text-danger">| pNo.<?=str_pad($prof->id,4,"0", STR_PAD_LEFT)?> </span></span></h3>
            <h5 class="col-md-3  col-xs-12 col-sm-10 col-md-6 col-lg-6">vision at screening
                <span class='mr-3'><strong> Rf : </strong><span class="text-info">6</span></span>
                <span class=''><strong>Lf : </strong><span class="text-info">6</span></span>
            </h5>
                <a href='<?=base_url('patient/edit/'.$prof->id)?>' class="btn btn-sm btn-primary ml-3 ">
                <i class="fa fa-edit"></i> EDIT BASIC INFO</a>

            <div class="btnlist" ></div>
<hr>



<div class="contents">


<div class="ml-5">
<span id="basic"  onclick="showhide(this)" class="alert alert-light rowd">
<a id=""class='h5 title text-success'>Basic Information</a>
<i class='fa fa-chevron-down pull-right text-primary'></i>
</span>
<?php $this->load->view("profiletabs", ["prof"=>$prof]); ?>
</div>
<hr>

<div class="ml-5">
<span id="diagnosis"  onclick="showhide(this)" class="alert alert-info rowd">
<span id=""class='h5 title text-success'>Diagnosis</span>
<i class='fa fa-chevron-down pull-right text-primary'></i>
</span>
<?php $this->load->view("Diagnosis", ["prof"=>$prof]); ?>
</div>
<hr>

<div class="ml-5">
<span id="prescription"  onclick="showhide(this)" class="alert alert-info rowd">
<span id=""class='h5 title text-success'>Prescription</span>
<i class='fa fa-chevron-down pull-right text-primary'></i>
</span>
<?php $this->load->view("Diagnosis", ["prof"=>$prof]); ?>
</div>
<hr>

<div class="ml-5">
<span id="refraction"  onclick="showhide(this)" class="alert alert-info rowd">
<span id=""class='h5 title text-success'>Refraction</span>
<i class='fa fa-chevron-down pull-right text-primary'></i>
</span>
<?php $this->load->view("Diagnosis", ["prof"=>$prof]); ?>
</div>
<hr>

<div class="ml-5">
<span id="paed"  onclick="showhide(this)" class="alert alert-info rowd">
<span id=""class='h5 title text-success'>Paediatric</span>
<i class='fa fa-chevron-down pull-right text-primary'></i>
</span>
<?php $this->load->view("Diagnosis", ["prof"=>$prof]); ?>
</div>
<hr>


<div class="ml-5">
<span id="lab"  onclick="showhide(this)" class="alert alert-info rowd">
<span id=""class='h5 title text-success'>Lab/ Surgery</span>
<i class='fa fa-chevron-down pull-right text-primary'></i>
</span>
<?php $this->load->view("Diagnosis", ["prof"=>$prof]); ?>
</div>
<hr>



</div>


<script>
    const watch =  ["diagnosis","prescription","refraction","paed","lab"];
    const watchall =  ["basic","diagnosis","prescription","refraction","paed","lab"];
    


    function justhide(h){
        // h = $(h);
        kid = $("#"+h[0]+"id").next()[0];
        // pf(h);
        $(kid).removeClass("fa-chevron-down");
        $("#"+h[0]+"id").next().hide();
    }  

    function showhide(h){
        h = $(h);
        kid = $("#"+h.id).next()[0];
        $(kid).toggleClass("fa-chevron-left fa-chevron-down  text-danger");
        $("#"+h[0].id).next().slideToggle();
    }  

    const hide2 = (h)=>{;
        kid = h;
        h = $(h).parent()[0].firstElementChild;
        $(kid).toggleClass("fa-chevron-left fa-chevron-down  text-danger");
        $("#"+h.id).next().next().slideToggle();
    }
        
    const hidewatch = ()=>{
        $.each(watch, function(i,val){
            asic = document.querySelector("#"+val);
            showhide(asic);
        })
    }

    function short(v){
        $.each(watchall, function(i,val){
            asic = document.querySelector("#"+val);
            justhide(asic);
        })
        showhide(v);
    }
    $(document).ready(()=>{
        //hidewatch();
        $.each(watch, function(i,val){
            asic = document.querySelector("#"+val);
            showhide(asic);
            btn = '<button onclick="short('+val+')" class="mr-2 badge badge-secondary badge-pill p-2">'+val.toUpperCase()+'</button>';
            $(".btnlist").append(btn)
        })
    });

</script>


<style>
    .hidden {
        visibility:collapse;
        display:none;
    }
    .uline {
        border-bottom: 7px solid #ddd;
        padding-bottom: 10px;
        width:100%;
    }
    .contents {
        margin-left:-30px;
    }
    .mr-5 {
        margin-right:5px;
    }

    .ml-5 {
        /* border-bottom:1px solid #edd; */
    }

    .title {
        text-decoration:none !important;
    }

    .btnlist {
        display:contents;
    }

    .btn-outline-success {
        /* background: #673AB7;
        color: aliceblue; */
    }
</style>