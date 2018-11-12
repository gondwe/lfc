

<?php 
$g2 = $chatlist;
$first = array_shift($chatlist);

if(empty($first)){ echo topic("No Messages"); $this->load->view("msg_start", ["ul"=>$userlist]);

}else {
$active = $this->session->activechat ?? $first->id;


$factive = $first->id == $active ? 'green' : null;
$showactive = $first->id == $active ? 'show active' : null;

?>

<div class="bg-white p-3">
  <div class="card-body">
    <div class="bd-example bd-example-tabs pt-3">
      <div class="row">
      
        <div class="col-sm-3">
        <div class="d-flex pb-3 text-danger font-weight-bold">USERS</div>
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="d-block px-2 text-secondary active <?=$factive?>" id="v-pills-<?=$first->id?>-tab" data-toggle="pill" data-id="<?=$first->id?>" href="#v-pills-<?=$first->id?>" role="tab" aria-controls="v-pills-<?=$first->id?>" aria-selected="true">
                <?=rxx($first->username,2)?>
            </a>
          <?php foreach ($chatlist as $value): ?>
            <a class="d-block px-2 text-secondary <?=$factive = $value->id == $active ? 'green' : null;?>" data-id='<?=$value->id?>' id="v-pills-<?=$value->id?>-tab" data-toggle="pill" href="#v-pills-<?=$value->id?>" role="tab" aria-controls="v-pills-<?=$value->id?>" aria-selected="false">
                <?=rxx($value->username,2)?>
            </a>
          <?php endforeach;?>
          </div>
        </div>
        <div class="col-sm-9 d-block" style="border-left:1px solid #dcdcdc">
            <div class="text-success">
            <span class="" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus-circle text-danger"></i></span>
            </div>
            <div id="chatthread"></div>
            <hr>
            <input data-to="<?=$active?>" type="text" id="chat" required placeholder="New Message" class="pill form-control">
        </div>
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">New Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <?php $this->load->view("msg_start", ["ul"=>$userlist])?>


      </div>
    </div>
  </div>
</div>






<link rel="stylesheet" href="<?=base_url('assets/js/recent_messages.css')?>">
<!-- <script src="<?=base_url('assets/js/recent_messages.js')?>"></script> -->

<script>
    // activate selected member in list 
    $("#v-pills-tab  > a.d-block").click(function(){
      id = $(this).data("id");
      $(this).siblings().removeClass("green")
      $(this).addClass('green');
      $.get('activechat/set/'+ id).done( fetchTalk(id))
    })

    // load the latest buddy from session 
    $(document).ready(function(){
      active = "<?=$active?>"; fetchTalk(active);
    } );

    // retrieve talks with budddy 
    function fetchTalk(id) { $.get( 'activechat/get/'+  id, function(res){ $("#chatthread").html(res) }) }

    // bleep with websocket
    function writeName(id,msg) { 
      var block = new Object()
            block.from = "<?=$this->session->user_id?>";
            block.to = id;
            block.msg = msg;
      send(JSON.stringify(block));
    }

    // send chat msg to selected buddy
    $("#chat").keyup(function(e){
      const msg = $(this).val()
        if(e.keyCode == 13){
            const id = $(this).data("to")
            const url = "activechat/send/" + id ;
            $.post(url, {"p":msg})
              .done( function(){ fetchTalk(id) } )
              .done( function(){ writeName(id, msg); })
              .done( $(this).val("") )
        }
    });

</script>


<?php 

}

?>