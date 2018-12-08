
var classes = [];

$(document).ready( function()
{
	$( ".class-name" ).each( function()
	{
		var className = $( this ).html();

		if ( $.inArray( className, classes ) === -1 )
			classes.push( className );
	} );

	classes.sort( function( a, b ){ return a - b } );
	
	for ( var i = 0; i < classes.length; i++ )
	{
		$( ".class-selector" ).append( "<option value=" + classes[ i ] + ">" + classes[ i ] + "</option>" );
	}

	$( ".class-selector" ).on( "change", function()
	{
		var selected = $( this ).val();

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