 	var conn = null;

	 newSocket();
	// function wsGo(){ pf("yes ws") }
	function wsGo(msg){ wsReady(conn, function(){ conn.send(msg); }); }
	function send(msg){ wsReady(conn, function(){ conn.send(msg); }); }
	
	// Our idling function ...
	function wsReady(socket, callback){
		setTimeout( function () { if (socket.readyState === 1) { callback(); return; } else { wsReady(socket, callback); }  }, 5);
	}


	function newSocket(from=null,to=null,msg=null){
		baseUrl = location.hostname
		var uri = 'ws://'+ baseUrl +':8998/';
		conn = new WebSocket(uri);

		conn.onmessage = function(e) { 
			data = JSON.parse(e['data']);
			const check_base = 'http://violet/ci3/systems/notifications/' + data.to + '/' + data.from

			/* check if the message is meant for me */
			$.getJSON(check_base) .done((checks)=>{ if(checks.mine){ setDisplay(checks.from,checks.to,data.msg); play_sound(); } });

		}

		conn.onopen = function(e) { console.log("ws-active"); isConnected = true; };
		conn.onclose = function(e) { console.log("ws-disconnected"); };
	}

	/* the messageComponent to be appended to the DOM */
	function setDisplay(from,to,msg){
		let msgbody = `<div class="alert alert-info mb-1 alert-dismissible fade show" role="alert">
			<strong>`+ from +`</strong>
			`+ msg +`
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>`

		$("#pushnotif").prepend( msgbody );
	}