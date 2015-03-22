$(document).ready(function() {

        $('#orohandler').hide();  

        $('#urlForm').submit(function(event) { 
		  // Stop form from submitting normally
		  event.preventDefault();
		 
		  // Get some values from elements on the page:
		  var $form = $( this ),
		    term = $form.find( "input[name='url']" ).val(),
		    url = $form.attr( "action" ),
                    ext = $('input[name=extensionType]:checked', '#urlForm').val();
		  // Send the data using post
		  var posting = $.post( url, { 
                      data: term,
                      ext: ext
                  } );
		 
		  // Put the results in a div
		  posting.done(function( data ) {
		  	$('#formcontainer').hide();
		  	$('#ribbon').hide();
		  	$('#orohandler').attr('src', data);
		  	$('#orohandler').show();
		  	console.log('k');
		  });

        }); 
    }); 