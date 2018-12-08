
var classes = [];

$(document).ready( function()
{
	// Adds all classes from the schedule to the array.
	$( ".class-name" ).each( function()
	{
		var className = $( this ).html();

		// Make sure the class isn't already in the array.
		if ( $.inArray( className, classes ) === -1 )
			classes.push( className );
	} );

	classes.sort( function( a, b ){ return a - b } );
	
	// Append class options to selector.
	for ( var i = 0; i < classes.length; i++ )
	{
		$( ".class-selector" ).append( "<option value=" + classes[ i ] + ">" + classes[ i ] + "</option>" );
	}

	$( ".class-selector" ).on( "change", function()
	{
		var selected = $( this ).val();

		// Hides events on the calendar that don't match the search criteria, and
		// highlights the ones that do, unless "None" is selected.
		if ( selected === "none" )
		{
			$( ".calendar-event" ).removeClass( "highlight" );
			$( ".calendar-event" ).fadeIn();
		}
		else
		{
			$( ".calendar-event" ).each( function()
			{
				if ( $( this ).find( ".class-name" ).html().indexOf( selected ) === -1 )
				{
					$( this ).fadeOut();
					$( this ).removeClass( "highlight" );
				} else
				{
					$( this ).fadeIn();
					$( this ).addClass( "highlight" );
				}
			} );
		}
	} );
} );