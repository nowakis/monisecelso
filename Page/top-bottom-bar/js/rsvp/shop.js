(function ( $ ) {

	'use strict';

	$.fn.validForm = function( options ) {
		
		var defaults = {           
            messageWrapper: "#message",
			scrollAfterSubmit : true,			
        }
		
        var settings = $.extend( {},defaults, options );

		//ON SUBMIT EVENT
		this.submit(function(event){

			//GET ALL INPUT ELEMENT
			var ajax_input_element = $(this).find ( ".ajax-input" );
						
			//DEFINE ARRAY VARIABLE FOR SAVE ALL ERR VALIDATION MESSAGE
			var all_err = [];
											
			//LOOPING TO SAVE ALL INPUT VALUE, DATA-REQUIRED MESSAGE, AND ADD/REMOVE HAS-ERROR CLASS
			$.each(ajax_input_element , function(index, element){
				
				//IF CHECKBOX INPUT
				if ($(this).hasClass("ajax-checkbox")){
					
					//DEFINE CHECKED CHECKBOX
					var checked_checkbox = $("#" + element.id + " input[type='checkbox']:checked");
									
					//VALIDATION, SAVE INPUT VALUE OR ERR VALUE, ADD REMOVE HAS-ERROR CLASS				
					if (checked_checkbox.length > 0 || !($(this).attr("data-required")) ) {		
						$(this).removeClass("has-error");
       		 		} else {
						$(this).addClass("has-error");
						all_err.push(element.getAttribute("data-required"));			
					}
				}
				
				//ELSE IF RADIO INPUT
				else if ($(this).hasClass("ajax-radio")){
										
					//DEFINE RADIO NAME
					var radio_name = $("#" + element.id + " input").first().attr("name");
					
					//DEFINE CHECKED RADIO
					//var checked_radio = $("#" + element.id + " [type='radio']:checked");
					var checked_radio = $("#" + element.id + " [type='radio'][name='" + radio_name + "']:checked");
					
					//GET RADIO VALUE
					var radio_value = $("#" + element.id + " [type='radio'][name='" + radio_name + "']:checked").val();
					
					//SAVE RADIO VALUE & DATA-REQUIRED TO post_data
					if (radio_value == null) {
						radio_value = "";
					}
					
					//VALIDATION, SAVE INPUT VALUE OR ERR VALUE, ADD REMOVE HAS-ERROR CLASS		
					if (checked_radio.length > 0 || !($(this).attr("data-required"))) {
						$(this).removeClass("has-error");
       		 		} else {
						$(this).addClass("has-error");
						all_err.push(element.getAttribute("data-required"));
					
					}
				}
				
				//ELSE OTHER INPUT (TEXT, TEXTAREA, SELECT OPTIONS)
				else
				{
					//GET INPUT VALUE
					var this_input_value = $(this).val();
					
					//VALIDATION, SAVE INPUT VALUE OR ERR VALUE, ADD REMOVE HAS-ERROR CLASS			
					if ( this_input_value == null  || this_input_value.length == 0 ) {
						if ($(this).attr("data-required")) {
            				$(this).closest("div").addClass("has-error");	
							all_err.push(element.getAttribute("data-required"));
						}
       		 		} else {
						$(this).closest("div").removeClass("has-error");
					}
				}
			});

			if (all_err.length > 0) {

				//PREVENT DEFAULT SUBMIT
				event.preventDefault();	
				
				var output = '<div class="bg-danger">' + all_err[0] + '</div>';
				
				//OUTPUT MESSAGE
				$(settings.messageWrapper).hide().html(output).slideDown();
				
				if (settings.scrollAfterSubmit){
					$('html, body').animate({
        				scrollTop: $(settings.messageWrapper).offset().top - 200
    				}, 1000);	
				}
				
				return false;
			}
			
			//DISABLE SUBMIT BUTTON
			var submit_value = $('input[type="submit"]#submitButton').val();
			$('input[type="submit"]#submitButton').prop('disabled', true);
			$('input[type="submit"]#submitButton').val('SENDING ...');

			alert('Você será redirecionado para a plataforma de pagamentos PayU.');
		});
		
	};

}( jQuery ));