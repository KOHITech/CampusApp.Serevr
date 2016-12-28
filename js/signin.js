$(document).ready(function() {
    $frm = $('.form-signin');
    $email = $("#inputEmail");
    $password = $("#inputPassword");
    $err = $(".error-message")
    console.log($frm);

    $frm.submit(function (e) {
    	console.log("query=select&tablename=userr&columns=*&where=email,passwordd;" + $email.val() + "," + $password.val());
    	$err.addClass("hide");
    	e.preventDefault();
    	$.ajax({
	        url: 'query.php',
	        data: "query=select&tablename=userr&columns=*&where=email,passwordd;" + $email.val() + "," + $password.val(), // on envoie $_GET['go']
	        method: "GET",
	        dataType: 'json', // on veut un retour JSON
	        success: function(json) {
	        	if (json == "") {
	        		$err.removeClass("hide");
	        	} else {
		            $.each(json, function(index,value) { // pour chaque noeud JSON
		                // on ajoute l option dans la liste
		                if(value.role == "admin") {
		                	$('<form />')
		                	      .hide()
		                	      .attr({ method : "post" })
		                	      .attr({ action : "?method=login"})
		                	      .append($('<input />')
		                	        .attr("type","hidden")
		                	        .attr({ "name" : "email" })
		                	        .val($email.val())
		                	      )
		                	      .append($('<input />')
		                	        .attr("type","hidden")
		                	        .attr({ "name" : "password" })
		                	        .val($password.val())
		                	      )
		                	      .append('<input type="submit" name="login" />')
		                	      .appendTo($("body"))
		                	      .submit();
		                }
		        	});
		        }

	        }
	    });
	});
});
