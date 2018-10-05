<?php
    $prof = current($profile);
    // pf($prof);

?>

<h1 class='col-xs-12 col-sm-10 col-md-12 col-lg-6'>
    <span class=''><?=rxx($prof->patient_names)?> 
        <span class="text-danger"> | pNo.<?=str_pad($prof->id,4,"0", STR_PAD_LEFT)?> </span></span></h3>

                <a href='<?=base_url('patient/edit/'.$prof->id)?>' class="btn btn-sm btn-primary ml-3 ">
                <i class="fa fa-edit"></i> EDIT BASIC INFO</a>

<hr>
            <div class="btnlist" ></div>


<div class="contents">


<div class="ml-5">
<span id="basic"  onclick="showhide(this)" class="alert alert-light rowd" style='border-bottom:1px solid #ddd'>
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
<?php $this->load->view("prescription", ["prof"=>$prof]); ?>
</div>
<hr>

<div class="ml-5">
<span id="refraction"  onclick="showhide(this)" class="alert alert-info rowd">
<span id=""class='h5 title text-success'>Refraction</span>
<i class='fa fa-chevron-down pull-right text-primary'></i>
</span>
<?php $this->load->view("refraction", ["prof"=>$prof]); ?>
</div>
<hr>

<div class="ml-5">
<span id="paed"  onclick="showhide(this)" class="alert alert-info rowd">
<span id=""class='h5 title text-success'>Paediatric</span>
<i class='fa fa-chevron-down pull-right text-primary'></i>
</span>
<?php $this->load->view("paed", ["prof"=>$prof]); ?>
</div>
<hr>


<div class="ml-5">
<span id="lab"  onclick="showhide(this)" class="alert alert-info rowd">
<span id=""class='h5 title text-success'>Lab/ Surgery</span>
<i class='fa fa-chevron-down pull-right text-primary'></i>
</span>
<?php $this->load->view("lab", ["prof"=>$prof]); ?>
</div>
<hr>



</div>


<script>
    const watch =  ["diagnosis","prescription","refraction","paed","lab"];
    const watchall =  ["basic","diagnosis","prescription","refraction","paed","lab"];
    


    function justhide(h){
        // h = $(h);

        kid = $(h).next()[0];
        $(h).next().hide();
        // kid.hide();
        $(kid).removeClass("fa-chevron-down");
        // pf(kid);
        // $("#"+h[0]+"id").next().hide();
    }  

    function showhide(h){
        $.each(watchall, function(i,val){
            asic = document.querySelector("#"+val);
            justhide(asic);
        })
        
        h = $(h);
        kid = h[0].lastElementChild;
        // pf(h)
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
        $.each(watchall, function(i,val){
            asic = document.querySelector("#"+val);
            justhide(asic);
        })
    }

    function short(v){
        $.each(watchall, function(i,val){
            asic = document.querySelector("#"+val);
            justhide(asic);
        })
        h = $(v);
        kid = h[0].lastElementChild;
        // pf(h)
        $(kid).toggleClass("fa-chevron-left fa-chevron-down  text-danger");
        $("#"+h[0].id).next().slideToggle();
    }
    $(document).ready(()=>{
        //hidewatch();
        $.each(watch, function(i,val){
            asic = document.querySelector("#"+val);
            justhide(asic);
            btn = '<button onclick="short('+val+')" class="mr-2 btn-light btn">'+val.toUpperCase()+'</button>';
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


<script>
    // // pos = -1;
    // // $(".ssx").keyup(function(e){
    // //     dis = $(this).next().next();
    // //     n = dis[0].childElementCount;
    // //     nodes = dis[0].childNodes;
    // //     // pf(nodes);
    // //     key = e.keyCode;
    // //         if(key == 40 ){
    // //             pos++
    // //             pf(n)
    // //             pf(pos)
    // //             $.each(nodes,function(k,v){
    // //                 $(v).css("background","white");
    // //             })
    // //             if(pos == n) pos = 0
    // //             $(nodes[pos]).css("background","yellow");
                
    // //         }else if(key == 13){
    // //             sl = $(nodes[pos]);
    // //             lod(sl[0]);
    // //         }else if(key == 38){
    // //             $.each(nodes,function(k,v){
    // //                 $(v).css("background","white");
    // //             })
    // //             if(pos <= 0){ pos = n-1 } else { pos--; }
    // //             $(nodes[pos]).css("background","yellow");

    // //         }else{
    // //         val = $(this).val().trim();
    // //         if(val !== ""){
    // //             w = $(this).css("width");
    // //             vali = '<li style="" class="form-control" onclick=lod(this)>'+val+'something</div>';
                
    // //             $(dis).css("width",w);
    // //             dis.append(vali);
    // //         }
    // //     }
    // // })

    // // lod = (e)=>{
    // //     item = e.innerHTML;
    // //     $(e).parent().prev().prev().val(item);
    // //     $(e).parent().html("");
    // //     pos = 0;
    // // }
</script>