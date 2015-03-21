$(document).ready(function() {  
        $('#urlForm').submit(function() { 
		 
		  // Stop form from submitting normally
		  event.preventDefault();
		 
		  // Get some values from elements on the page:
		  var $form = $( this ),
		    term = $form.find( "input[name='url']" ).val(),
		    url = $form.attr( "action" );

		  // Send the data using post
		  var posting = $.post( url, { data: term } );
		 
		  // Put the results in a div
		  posting.done(function( data ) {
		    console.log(data);
		    document.location=data;
		  });

        }); 
    }); 