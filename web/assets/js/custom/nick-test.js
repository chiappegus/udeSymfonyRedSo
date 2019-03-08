$(document).ready(function() {

	/*  $("#backendbundle_user_nick").click(function(){
    $("#backendbundle_user_nick").hide();
  });

*/
	$("#backendbundle_user_nick").blur(function(){
		var	nick = this.value;
		console.log(nick); 

		$.ajax({
             
			url: URL+'/nick-test',	
			data: {nick: nick},
			type:'POST',
			success: function(response){
				console.log(response);
				if(	response=="used"){
                 $("#backendbundle_user_nick").css("border","1px solid red");
				}else{
                   $("#backendbundle_user_nick").css("border","1px solid green");
				}

			}

		});
	});
});