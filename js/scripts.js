$(document).ready(function() 
{
 	$('input[type=password]').keyup(function() 
 	{

 		var pswd = $(this).val();
 		var count = 0;

 		//validate the length
		if ( pswd.length < 8 ) 
		{
		    $('#length').removeClass('valid').addClass('invalid');
		} 
		else 
		{
		    $('#length').removeClass('invalid').addClass('valid');
		    count = count + 1;
		}

		//validate lowercase letter
		if ( pswd.match(/[a-z]/) ) 
		{
		    $('#letter').removeClass('invalid').addClass('valid');
		    count = count + 1;
		} else {
		    $('#letter').removeClass('valid').addClass('invalid');
		}

		//validate uppercase letter
		if ( pswd.match(/[A-Z]/) ) 
		{
		    $('#capital').removeClass('invalid').addClass('valid');
		    count = count + 1;
		} else {
		    $('#capital').removeClass('valid').addClass('invalid');
		}

		//validate number
		if ( pswd.match(/\d/) ) 
		{
		    $('#number').removeClass('invalid').addClass('valid');
		    count = count + 1;
		} else {
		    $('#number').removeClass('valid').addClass('invalid');
		}
		//validate special character
		if ( pswd.match(/(?=.*[!@#$%^&*()_+])/) ) 
		{
		    $('#sChar').removeClass('invalid').addClass('valid');
		    count = count + 1;
		} else {
		    $('#sChar').removeClass('valid').addClass('invalid');
		}

		//change strong password
		if(count ==5)
		{
			$('#pCheck').removeClass('invalid').addClass('valid');
			$('#pCheck').text('Strong Password')
		}
		else
		{
			$('#pCheck').removeClass('valid').addClass('invalid');
			$('#pCheck').text('Password not strong enough!!')
		}


	}).focus(function() {$('#pswd_info').show();}).blur(function(){$('#pswd_info').hide();});
});