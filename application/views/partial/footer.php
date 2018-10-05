</body>
</html>


<div id="pushnotif" style="top:15px; position:fixed;right:15px;width:100%">

</div>

<div id='swal' class="alert text-light alert-dismissible fade pull-right col-md-4" 
	style='background:purple; margin:5px;bottom:5px; position:fixed;right:5px; border-radius:55px;' role="alert">
  <strong>Info ! </strong><span id='memos'></span>
  <!-- <button type="button" class="" style='border-left:1px solid #333;background:#000;border-radius: 0px 50px 50px 0px;' data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button> -->
</div>

<script>

// $(window).on('hashchange', ()=>{
//     // myrefresh();
// });


function myrefresh(){
    var h = window.location.hash.split('#')[1];
    h = h == "" || h == "#" || h == undefined ? "home" : h;
    $( "#play" ).hide().load( "loader.php?page="+h ).fadeIn(3000);
    // $( "#play" ).load( "loader.php?page="+h );

}

// $(document).ready(()=>{
// 	// myrefresh();
// 	 $( "#play" ).hide().load( "loader.php?page=" ).fadeIn(3000);
// });




// chat server

            // var conn = null;
			// var isConnected = false;
			// toggleConnect();

			// $(function() {
			// 	setOffline();
			// });

			// function setOnline() {
			// 	$("#status").removeClass("label-warning");
			// 	$("#status").addClass("label-success");
			// 	$("#status").html("Connected");
			// 	$("button.connect").html("Disconnect");
			// 	$("#offlineActions").hide();
			// 	$("#onlineActions").show();
			// 	isConnected = true;
			// }

			// function setOffline() {
			// 	$("#status").addClass("label-warning");
			// 	$("#status").removeClass("label-success");
			// 	$("#status").html("Disconnected");
			// 	$("button.connect").html("Connect");
			// 	$("#offlineActions").show();
			// 	$("#onlineActions").hide();
			// 	isConnected = false;
			// }

			// function send(msg=null,user=null) {
			// 	// msg = $("#message").val();
			// 	// user = $("#username").val();
			// 	user = 'admin';
			// 	msg = '<div id="swal2" class="alert text-light alert-dismissible show fade pull-right col-md-4" style="background:red; margin:5px; border-radius:55px;" role="alert"> <strong>Alert ! </strong><span id="chatTarget"></span><button type="button" class="close" style="border-left:1px solid #333;background:#000;border-radius: 0px 50px 50px 0px;" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
			// 	spill(user);

			// 	if (msg == "" || user =="") {
			// 		alert("Can't send an empty message / username");
			// 		return;
			// 	}
			// 	conn.send(msg+"|||"+user);
			// 	$("#pushnotif").prepend(user+":" + msg + "<br/>");
			// }

			// function toggleConnect() {
			// 	var uri = 'ws://127.0.0.1:8080/';
			// 	// var uri = $("#conn_str").val();
			// 	if (isConnected) {
			// 		setOffline();
			// 		return;
			// 	}
			// 	conn = new WebSocket(uri);

			// 	conn.onmessage = function(e) {
			// 		data = e.data.split("|||");
			// 		message = data[0];
			// 		user = data[1];
					
			// 		// console.log(e.data);


			// 		$("#pushnotif").prepend( user+" : "+message + "<br/>");
			// 	}

			// 	conn.onopen = function(e) {
			// 		console.log(e);
			// 		setOnline();
			// 		console.log("Connected");
			// 		isConnected = true;
			// 	};

			// 	conn.onclose = function(e) {
			// 		console.log("Disconnected");
			// 		setOffline();
			// 	};

			// }

		function ndkpush(){

		}

		function pf(i){ console.log(i); }
		function spill(i){pf(i);}

</script>


<!-- <div class="m-5"> -->
<!-- <h3>This is a websocket demo using basic websockets</h3>

		<div id="offlineActions">
			<div>Server IP: <input type="text" id="conn_str" value="ws://127.0.0.1:8080/"/></div>

		</div>
		<div id="statusBox">
			<span id="status" class="label label-warning">Disconnected</span>
			<button onclick='toggleConnect();' class="connect">Connect</button>
		</div>
		<div id="onlineActions" class="display: none">
			<input type="text" id="username" required placeholder="Enter Username" />
			<input type="text" id="message" placeholder="Message" />
			<button onclick='send();' class="send" >Send Message</button>
		</div>
		<div id="chatTarget" style="overflow-x: scroll; height:400px; max-height: 400px;">
		</div>
</div> -->



<?php 

// $ex = exec("php -q X:\sites\house\socket\bin\chat-server.php");
// pf($ex);


function push($mess='test',$username='admin'){
	global $user;
	$user = $user->username;
	$msg = '<div id="swal2" class="alert text-light alert-dismissible show fade pull-right col-md-4" style="background:red; margin:5px;bottom:5px; position:fixed;right:5px; border-radius:55px;" role="alert"> <strong>Alert ! </strong><span id="chatTarget"></span><button type="button" class="close" style="border-left:1px solid #333;background:#000;border-radius: 0px 50px 50px 0px;" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

    echo "
    <script>
		send('".$msg."','".$user."');
		// play_sound();
    </script>
    ";
}



?>



<script>
    // $(document).ready(()=>{
    //     $("#scrntop").hide().load("as").fadeIn(2000);
    //     $("#scrnplay").hide().load("as").fadeIn(3000);
    // })
</script>

<div class='fixed-bottom pb-1'style="text-align:center; background:#fff" >
     <small style='color:#bbb; width:100%; background:#fff; ' >All Rights Reserved &copy 2018 Lighthouse For Christ Eye Center</small>
    </body>
</div>

<script src='<?=base_url('assets/js/popper.min.js')?>'></script>
<script src='<?=base_url('assets/js/bootstrap.min.js')?>'></script>
<script src='<?=base_url('assets/js/jquery.dataTables.min.js')?>'></script>
<script src='<?=base_url('assets/js/sweetalert.min.js')?>'></script>
<script src='<?=base_url('assets/js/custom.js')?>'></script>
<script src='<?=base_url('assets/js/searchbox.js')?>'></script>
