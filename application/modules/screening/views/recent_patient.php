<div class="pull-left">
<?php echo topic("recent patient list")?>
</div>
<!-- <h5 class='text-success pull-left m-3'>Recent Patient List</h5> -->
<input type="text" placeholder="Search" id="search" autofocus class="rounded form-control pull-right col-md-4">
<div id="play">
<?php $this->load->view("namesearch", ["search"=>$recent])?>
</div>

<script>
let c = 0;
    $("#search").keyup(function(a){
        key = a.keyCode;
        // if(key == 13) { 
            let b = a.target.value; 
                if(b == "") { 
                    if(3-(c/3)==0){
                        window.location.href= "<?=base_url('screening/dashboard')?>"; 
                    }
                }
            c++; 
                $.post("<?=base_url('screening/tablesearch')?>", {"x":b}, (res)=>{
                    $("#play").hide().html(res).fadeIn(100);
                }
            );
       });
</script>

<style>
    #search {margin-top:1rem;}
    td { padding:5px }
</style>