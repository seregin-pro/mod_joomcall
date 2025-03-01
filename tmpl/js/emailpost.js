// JoomCall 1.2.0 - 25.01.2015
jQuery(document).ready(function(){	

jQuery('.email-joomcall').click(function(){
	form_active = true;
	jQuery('.wrapper-joomcall').fadeIn();
	jQuery('#form-action-joomcall').fadeIn();
});
function showErrorField(name_field, id_field, pattern){
	jQuery('#' + name_field).focus(function(){
		jQuery(this).keyup(function(){
			if(jQuery(this).val().search(pattern) == -1){
				jQuery('#ok' + id_field + '-joomcall').hide();
				jQuery('#error' + id_field + '-joomcall').show();
			}
			else{
				jQuery('#error' + id_field + '-joomcall').hide();
				jQuery('#ok' + id_field + '-joomcall').show();
			}
		});
	});
}
showErrorField("name-joomcall", "", /./);
showErrorField("phone-joomcall", "1", /^((\d{1,3}|\+\d{1,3})[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/);

if(jQuery('#c-joomcall').length) { 
jQuery('#c-joomcall').focus(function(){
	jQuery(this).keyup(function(){
						var a = jQuery('#a-joomcall').val()- 0; 
						var b = jQuery('#b-joomcall').val()- 0; 
						var c = jQuery('#c-joomcall').val() - 0;
		if(c != (a+b)){
			jQuery('#ok4-joomcall').hide();
			jQuery('#error4-joomcall').show();
				}
		else{
			jQuery('#error4-joomcall').hide();
			jQuery('#ok4-joomcall').show();
				}
		});
});
}
function closeForm(){
	jQuery('.wrapper-joomcall').fadeOut();
	jQuery('#form-action-joomcall').fadeOut();
	jQuery('#msg-joomcall').val('');
	jQuery('.code-joomcall').val('');
	jQuery('.ok-name-joomcall').hide();
	jQuery('.error-name-joomcall').hide();
}
jQuery('.close-joomcall, .wrapper-joomcall').click(function(){
	closeForm();
});
jQuery(window).keydown(function(event){
	if (event.keyCode == '27') {
		closeForm();
    }
});
});
function sendJoomCall(){
	var time = '';
if(jQuery('#time-joomcall').length) { 
	time = jQuery('#time-joomcall').val();
}
if(jQuery('#c-joomcall').length) { 			
			var a = jQuery('#a-joomcall').val()- 0; 
			var b = jQuery('#b-joomcall').val()- 0; 
			var c = jQuery('#c-joomcall').val() - 0;
}
else{
			var a = 1; 
			var b = 1; 
			var c = 2;
}
if(jQuery('#name-joomcall').val() != '' && jQuery('#num_phone-joomcall').val() != '' && c == (a + b) && c > 0){
       jQuery.ajax({
                type: "POST",
                data: {'name' : jQuery('#name-joomcall').val(), 'phone' : jQuery('#phone-joomcall').val(), 
					'time' : time, 'msg' : jQuery('#msg-joomcall').val()}
        });
	jQuery('.wrapper-joomcall').fadeOut();
	jQuery('#form-action-joomcall').fadeOut();
	jQuery('#msg-joomcall').val('');
	jQuery('.code-joomcall').val('');
	jQuery('.ok-name-joomcall').hide();
	jQuery('.error-name-joomcall').hide();
		}
		}