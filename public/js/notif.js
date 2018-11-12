 	var conn = null;

	newSocket();

	function send(msgraw) {
		
		conn.send(msgraw);
		// setDisplay(from,to,msg)
	}

	function newSocket(from,to,msg){
		var uri = 'ws://192.168.1.101:8998/';
		
		
		conn = new WebSocket(uri);
		
		conn.onmessage = function(e) { 
			
			
			data = JSON.parse(e['data']);
			to = data.to
			msg = data.msg
			const check_base = 'http://violet/ci3/systems/notifications/' + to

			/* check if the message is meant for me */
			$.getJSON(check_base, {})
			.done((checks)=>{
				// pf(checks.mine)
				if(checks.mine){
					setDisplay(from=null,to=null,msg=null) 
					play_sound();
				}
				
			});


		}

		conn.onopen = function(e) { console.log("ws-active"); isConnected = true; };

		conn.onclose = function(e) { console.log("ws-disconnected"); };
	}

	/* the messageComponent to be appended to the DOM */
	function setDisplay(from,to,msg){
		let msgbody = `<div class="alert alert-info mb-1 alert-dismissible fade show" role="alert">
			<strong>Holy guacamole!</strong>
			You should check in on some of those fields below.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>`

		$("#pushnotif").prepend( msgbody );
	}