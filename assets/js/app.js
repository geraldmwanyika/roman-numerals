$(document).ready(function () {
	$("#roman_numbers").validate({
	   	rules:{
	   		roman:{
				required: true
			},
			number:{
				required: true
			}
	    },
	    messages:{
	       
	    },
	    submitHandler: function(form) { // <- pass 'form' argument in
	      
	        $(".submit").attr("disabled", true);
	        $(".submit").attr("value","Form submiting.....");

	        $(form).submit(); // <- use 'form' argument here.
	    }
	});
});