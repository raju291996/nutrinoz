$(document).ready(function(){
	
    
  $('.jq-check').bind('click',function() {
    $('.jq-uncheck').prop("checked", false);
  });
        $('.jq-uncheck').bind('click',function() {
    $('.jq-check').prop("checked", false);
  });

	
	$(".next_btn").click(function(){
		var diet_form = $('#msform');
        diet_form.validate({
			errorElement: 'span',
			errorClass: 'help-block',
			highlight: function(element, errorClass, validClass){
				$(element).closest('.fs').addClass('has-error');
			},
			unhighlight: function(element, errorClass, validClass){
				$(element).closest('.fs').removeClass('has-error');
			},
			rules: {
				gender: {
					required: true,
				},
				physical_activity: {
					required: true,
				},
				age: {
					required: true,
					digits: true,
				},
				weight: {
					required: true,
					digits: true,
				},
				height: {
					required: true,
					digits: true,
				},
				target_weight: {
					digits: true,
				},
				meal_number: {
					required: true,
				},
				daily_life: {
					required: true,
				},
				bad_habits: {
					required: true,
				},
				non_veg: {
					required: true,
				},
			},
			messages: {
				age: {
					required: "age is required",
				},
				weight: {
					required: "weight is required",
				},
				height: {
					required: "height is required",
				},
				physical_activity: {
					required: "Select anyone field",
				},
				gender: {
					required: "Choose your gender",
				},
				daily_life: {
					required: "Select anyone field ",
				},
				meal_number: {
					required: "Choose anyone field",
				},
                non_veg:{
                    required: "Choose at least one field",
                },
			},
		});	
		if(diet_form.valid() === true){
			current_fs = $(this).parent();
		    next_fs = $(this).parent().next();
		    next_fs.fadeIn('slow');
		    current_fs.css({'display': 'none'});
		    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
		}
	});
	$('.pre_btn').click(function(){
		current_fs = $(this).parent();
		pre_fs = $(this).parent().prev();
		pre_fs.fadeIn('slow');
		current_fs.css({'display': 'none'});
		$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	});
    
    $("#signup_submit").click(function(){
		var signupFirst = $('#signup_first');
		
		signupFirst.validate({
		errorElement: 'span',
        errorClass: 'error',
		rules:{
			name:{
				required: true,
				maxlength: 101,
				minlength: 3,
				pattern: /^[a-zA-Z\s]+$/
			},
			email:{
				required: true,
				email: true,
			},
			password:{
				required: true,
				minlength: 8,
				maxlength: 32,
				
			},
			contact:{
				required: true,
				digits: true,
				pattern: /^[789][0-9]{9}$/
			},
			terms:{
				required: true,
			},
		},
		messages: {
			name: {
				required: "<br>Name is required",
				maxlength: "<br>101 characters is limit",
				minlength: "<br>At least 3 characters required",
				pattern: "<br>Only alphabets and space",
			},
			email: {
				required: "<br>Email is required",
				email: "<br>Enter valid email",
			},
			password:{
				required: "<br>Password is required",
				minlength: "<br>At least 8 characters required",
				maxlength: "<br>Max 32 characters is limit",
			},
			contact: {
				required: "<br>Contact number is required",
				digits: "<br>Enter valid contact",
				pattern: "<br>Enter valid contact",
			},
			terms:{
				required: "Please select checkbox",
			}
		},
		});
	});
    
	
});