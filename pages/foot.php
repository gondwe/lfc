</body>
</html>


<div id='swal' class="alert text-light alert-dismissible fade pull-right col-md-4" 
	style='background:purple; margin:5px;bottom:5px; position:fixed;right:5px; border-radius:55px;' role="alert">
  <strong>Success !</strong> Record Saved Successfully.
  <button type="button" class="close" style='border-left:1px solid #333;background:#000;border-radius: 0px 50px 50px 0px;' data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<script>

$(window).on('hashchange', ()=>{
    myrefresh();
});


function myrefresh(){
    var h = window.location.hash.split('#')[1];
    h = h == "" || h == "#" || h == undefined ? "home" : h;
    $( "#play" ).hide().load( "loader.php?page="+h ).fadeIn(3000);
    // $( "#play" ).load( "loader.php?page="+h );

	document.getElementById("swal").classList.add("show");
}

$(document).ready(()=>{
    myrefresh();
});




// chat server

            var conn = null;
			var isConnected = false;

			$(function() {
				setOffline();
			});

			function setOnline() {
				$("#status").removeClass("label-warning");
				$("#status").addClass("label-success");
				$("#status").html("Connected");
				$("button.connect").html("Disconnect");
				$("#offlineActions").hide();
				$("#onlineActions").show();
				isConnected = true;
			}

			function setOffline() {
				$("#status").addClass("label-warning");
				$("#status").removeClass("label-success");
				$("#status").html("Disconnected");
				$("button.connect").html("Connect");
				$("#offlineActions").show();
				$("#onlineActions").hide();
				isConnected = false;
			}

			function send() {
				msg = $("#message").val();
				user = $("#username").val();
				if (msg == "" || user =="") {
					alert("Can't send an empty message / username");
					return;
				}
				conn.send(msg+"|||"+user);
				$("#chatTarget").prepend(user+":" + msg + "<br/>");
				$("#message").val("");
			}

			function toggleConnect() {
				var uri = $("#conn_str").val();
				if (isConnected) {
					setOffline();
					return;
				}
				conn = new WebSocket(uri);

				conn.onmessage = function(e) {
					data = e.data.split("|||");
					message = data[0];
					user = data[1];
					
					// console.log(e.data);
					$("#chatTarget").prepend( user+" : "+message + "<br/>");
				}

				conn.onopen = function(e) {
					console.log(e);
					setOnline();
					console.log("Connected");
					isConnected = true;
				};

				conn.onclose = function(e) {
					console.log("Disconnected");
					setOffline();
				};

			}

	

</script>


<!-- <div class="m-5"> 
<h3>This is a websocket demo using basic websockets</h3>

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
</div>
-->
<?php 


function push($m){
    echo "
    <script>
        
    </script>
    ";

}


?>