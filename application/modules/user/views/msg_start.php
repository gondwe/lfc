<?php 

foreach($ul as $l){
    echo '<button data-id="'.$l->id.'" class="usr m-1 btn btn-sm alert-primary">'.rx($l->username,2).'</button>';
}

?>
<hr>
<div class="form-group clearfix">
    <input required type="text" placeholder="Type Message" class="m-1 form-control col-lg-10 col-md-10 col-sm-10 pull-left" id="newmsg">
    <button id="send" class="btn btn-success btn-block m-1 col-lg-1 col-md-1 col-sm-2 pull-left"><i class="fa fa-check-circle"></i></button>
</div>
<hr>


<script>
    let items = [];
    $(document).ready(function(){
    });

    $(".usr").click(function(){
    $(this).toggleClass('alert-primary btn-primary btn-sm');
    //   $.post('activesms/toggle/'+ $(this).data("id"));
        item = $(this).data("id");
        if(items.indexOf(item) === -1) {
        items.push(item);
        }else{
        key = arraySearch(items, item);
        items.splice(key,1);
        }
        // pf($.unique(items));
    });



    function arraySearch(arr,val) {
        for (var i=0; i<arr.length; i++)
            if (arr[i] === val) return i; 
            return false;
    }


    $("#newmsg").keyup(function(e){  if(e.keyCode == 13){ sendMsg($("#newmsg")); } });
    $("#send").click(function(e){ sendMsg($("#newmsg")); });

    // send text to any number of recipients
    function sendMsg(ex){
        let text = ex.val();
        url = 'activechat/sendall/'+ text ;
            if(items.length && text !== ""){ $.post(url, {"p":items, "m":text}, function(res){ 
                window.location.reload();
            } )  } else { pf("No Contacts"); }
        ex.val("");
    }

</script>

<style>

.green {
    background:#72FF0033;
    color:white;
}

</style>