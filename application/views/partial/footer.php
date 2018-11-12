</body>
</html>




<div id='swaly' class="alert text-light alert-dismissible fade pull-right col-md-4" 
	style='background:purple; margin:5px;bottom:5px; position:fixed;right:5px; border-radius:55px; display:none' role="alert">
  <strong>Info ! </strong><span id='memos'></span>
</div>

<script>


	function ndkpush(){

	}

	function pf(i){ console.log(i); }
	function spill(i){pf(i);}
		
	function play_sound(f='info'){
		$base_url = "<?=base_url("")?>"
		audioElement = document.createElement('audio');
		audioElement.setAttribute('src', $base_url + 'assets/'+f+'.mp3');
		audioElement.setAttribute('autoplay', 'autoplay');
		audioElement.load();
		audioElement.play();
	}

           

</script>




</div>
</div>
</div>
</div>
<div class='' style="text-align:center; z-index:1000; position:fixed; bottom:0px" >
     <span style='color:#ccc; width:100%;' class='font-weight-light'>
	 All Rights Reserved &copy 2018 LFC...
	 </span>
    </body>
</div>

<script src='<?=base_url('assets/js/popper.min.js')?>'></script>
<script src='<?=base_url('assets/js/bootstrap.min.js')?>'></script>
<script src='<?=base_url('assets/js/jquery.dataTables.min.js')?>'></script>
<script src='<?=base_url('assets/js/sweetalert.min.js')?>'></script>
<script src='<?=base_url('assets/js/custom.js')?>'></script>
<script src='<?=base_url('assets/js/searchbox.js')?>'></script>



<?php 
if(isset($this->session->infoh)){
	?><script>play_sound();swal('Success', '<?=$this->session->infoh ?>', 'success');</script><?php
	unset($_SESSION["infoh"]);
}
if(isset($this->session->errorh)){
	?><script>play_sound('nop');swal('Error', '<?=$this->session->errorh ?>', 'warning');</script><?php
	unset($_SESSION["errorh"]);
}
if(isset($this->session->notice)){
	notify($this->session->notice);
	?><script>play_sound('nop');</script><?php
	unset($_SESSION["notice"]);
}
if(isset($this->session->wnotice)){
	notify($this->session->wnotice,1);
	?><script>play_sound('nop');</script><?php
	unset($_SESSION["wnotice"]);
}

?>


<div id="flashMsgModal" class="modal fade" role="dialog" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" id="flashMsgHeader">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <center><i id="flashMsgIcon"></i> <font id="flashMsg"></font></center>
                    </div>
                </div>
            </div>
        </div>
        <!--Modal end-->

        <!--modal to display transaction receipt when a transaction's ref is clicked on the transaction list table --->
        <div class="modal fade" role='dialog' data-backdrop='static' id="transReceiptModal">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header hidden-print d-print-none">
                        <span class="text-center">Transaction Receipt</span>
                        <button class="close pull-right" data-dismiss='modal'>&times;</button>
                    </div>
                    <div class="modal-body" id='transReceipt'></div>
                </div>
            </div>
        </div>
        <!--- End of modal--->


        <!---Login Modal--->
        <div class="modal fade" role='dialog' data-backdrop='static' id='logInModal'>
            <div class="modal-dialog">
                <!---- Log in div below----->
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close closeLogInModal">&times;</button>
                        <h4 class="text-center">Log In</h4>
                        <div id="logInModalFMsg" class="text-center errMsg"></div>
                    </div>
                    <div class="modal-body">
                        <form name="logInModalForm">
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label for='logInModalEmail' class="control-label">E-mail</label>
                                    <input type="email" id='logInModalEmail' class="form-control checkField" placeholder="E-mail" autofocus>
                                    <span class="help-block errMsg" id="logInModalEmailErr"></span>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label for='logInPassword' class="control-label">Password</label>
                                    <input type="password" id='logInModalPassword'class="form-control checkField" placeholder="Password">
                                    <span class="help-block errMsg" id="logInModalPasswordErr"></span>
                                </div>
                            </div>

                            <div class="row">
                                <!--<div class="col-sm-6 pull-left">
                                    <input type="checkbox" class="control-label" id='remMe'> Remember me
                                </div>-->
                                <div class="col-sm-4"></div>
                                <div class="col-sm-2 pull-right">
                                    <button id='loginModalSubmit' class="btn btn-primary">Log in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!---- End of log in div----->
            </div>
        </div>
        <!---end of Login Modal-->
