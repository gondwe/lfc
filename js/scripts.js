

// function login(){
// 	var pin = document.getElementById('PINbox').value;
// 	// alert(pin)
//     var phon = localStorage.getItem("okoaid");
//     $.post("getPhone.php?q="+phon+"&r="+pin, (res)=>{
// 		window.location.reload();
// 		$("#ermsg").val(res.text)
//     })
// }


function spill(a){console.log(a);}
$(document).on("submit", "form", function(event){
	event.preventDefault();
	event.stopImmediatePropagation();
	
    actionpage = $(this).attr("action");
 
	
    
	if(actionpage.indexOf(".php") < 0){
        actionpage = actionpage  + ".php";
    }
    ppx = actionpage.indexOf(".php");
    pps = actionpage.substring(0,ppx);
    bigpage = [
        "save",
        "insert",
    ]
    
    // $("#play").load("anime/index.html");
    
    $.ajax({
        url: "pages/"+actionpage,
        type: $(this).attr("method"),
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (data, status){
            if(bigpage.includes(pps))
            {
                myrefresh();
            }
			document.getElementById("memos").innerHTML = $.trim(data);
        },
        error: function (xhr, desc, err){/* console.log(err); */}
	});  
	
	setTimeout(() => {
		$('#memos').html("");
	}, 3000);
    
});