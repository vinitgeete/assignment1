$( document ).ready( function () {
	
	$.validator.addMethod("mobileValidate", function (value, element) {
		if ($.trim(value)) {
			
			var mobilePattern = /^[0-9]{9,15}$/;
			if (value.length == 0) 
			{
				return false;
			}    
			else if (!mobilePattern.test(value))
			{
				return false;
			}
			else
			{
				return true;
			}
		}
	}, 'Enter valid mobile number');
	
	$.validator.addMethod("nameValidate", function (value, element) {
		if ($.trim(value)) {
			
			var pattern = /^[a-zA-Z\. ']{2,30}$/;
			if (value.length == 0) 
			{
				return false;
			}    
			else if (!pattern.test(value))
			{
				return false;
			}
			else
			{
				return true;
			}
		}
	}, 'Enter valid name');
	
	$.validator.addMethod("countryValidate", function (value, element) {
		if ($.trim(value)) {
			
			var pattern = /^[a-zA-Z\. ']{2,20}$/;
			if (value.length == 0) 
			{
				return false;
			}    
			else if (!pattern.test(value))
			{
				return false;
			}
			else
			{
				return true;
			}
		}
	}, 'Enter valid country');
	
   $.validator.addMethod("dateValidate", function (value, element) {
		if ($.trim(value)) {
			
			var pattern = /^(\d{4})-(\d\d)-(\d\d)$/;
			if (value.length == 0) 
			{
				return false;
			}    
			else if (!pattern.test(value))
			{
				return false;
			}
			else
			{
				return true;
			}
		}
	}, 'Enter valid date');
	
	
	$( "#userForm" ).validate( {
		rules: {
			name :
			{
				required : true,
				nameValidate : true,
				
			},
			country: {
            required : true,
				countryValidate:true
			},
			email: {
				required : true,
				email    : true
			},
			mobile: {
            required : true,
				mobileValidate: true,
			},
			about: {
				required : true,
				maxlength : 1000
			},
			birthday: {
				required : true,
				dateValidate : true				
			},
			
		},
		highlight: function (element) {
        $(element).parent().addClass('error')
      },
      unhighlight: function (element) {
        $(element).parent().removeClass('error')
      },
		ignore: [],
		submitHandler: function (form) {
			form.submit();
		}
	} );
	
});	