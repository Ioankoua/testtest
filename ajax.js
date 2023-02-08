$( document ).ready(function() {
    $("#btn").click(
		function(){
			sendAjaxForm('result_form', 'ajax_form', 'action_ajax_form.php');
			return false; 
		}
	);
});
 
function sendAjaxForm(result_form, ajax_form, url) {
    $.ajax({
        url:       url, 
        type:     "POST", 
        dataType: "html", 
        data: $("#"+ajax_form).serialize(),  
        success: function(response) { 
        	json = $.parseJSON(response);
            if (json.status == 'error') {
                alert(json.status + ' - ' + json.message);
                if(json.type == 'name'){
                    $('#name_form').html('Error: '+json.message);
                }
                if(json.type == 'surname'){
                    $('#surname_form').html('Error: '+json.message);
                }
                if(json.type == 'email'){
                    $('#email_form').html('Error: '+json.message);
                }
                if(json.type == 'pass'){
                    $('#password_form').html('Error: '+json.message);
                }
            }
            if (json.status == 'success') { 
                alert(json.status + ' - ' + json.message);
                var obj = document.getElementById('ajax_form'); 
                obj.style.display = "none";
            }
        	
    	},
    	error: function(response) { 

            $('#result_form').html('Error');
    	}
 	});
}