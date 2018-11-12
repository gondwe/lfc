<?php 

// pf($id);
echo "Conversation with ".rx($this->db->where("id", $id)->get("users")->row("username"));

$msgid = $id."newmsg";

?>
<div id="chatthread"></div>
<hr>
<input type="text" id="<?=$msgid?>" required placeholder="New Message" class="pill form-control">
<?php 



?>

<script>

    // $(document).ready(getchat);
    // getchat
    $("#<?=$msgid?>").keyup(function(e){
        if(e.keyCode == 13){
            url = "activechat/send/<?=$id?>" ;
            $.post(url, {"p":$(this).val()}, (res)=>{
                // $("#chatthread").html(res)
            } ).done(getchat);
            $(this).val("");
            // getchat;
        }
    });

    function getchat(){
        url = "activechat/get/<?=$id?>";
        // pf(url)
        $.get(url, function(response){
            // pf(response)
            $("#chatthread").html(response)
        })
    }
</script>