
$(document).ready( function()
{
	$( "button" ).on( "click", buttonClicked );
	$( ".tutor-search" ).on( "keyup", tutorSearch );
} );

function buttonClicked()
{
	if ( $( this ).hasClass( "tut-addevent-button" ) )
		addEventButtonClicked( $( this ) );
}

function addEventButtonClicked( button )
{
	var dayString = button.parent().attr( "id" );
	var dayDiv = button.parent();
	var row = "";
	row += "<div class='row event-row'><input type='hidden' name='day[]' value='" + dayString + "'>";
	row += "<div class='small-3 columns'>Start time: <input type='number' name='start[]' min='1' max='12' value='1' required></div>";
	row += "<div class='small-3 columns'>AM/PM<select name='startMod[]'><option value='am' selected>AM</option><option value='pm'>PM</option></select></div>";
	row += "<div class='small-3 columns'>End time: <input type='number' name='end[]' min='1' max='12' value='1' required></div>";
	row += "<div class='small-3 columns'>AM/PM<select name='endMod[]'><option value='am' selected>AM</option><option value='pm'>PM</option></select></div></div>";
	dayDiv.append( row );

	// "<div class='row event-row'><input type='hidden' name='day[]' value='" . $dayOfTheWeek . "'>"
	// . "<div class='small-3 columns'>Start time: <input type='number' name='start[]' min='1' max='12' value='" . $start ."' required></div>"
	// . "<div class='small-3 columns'>AM/PM<select name='startMod[]'>" . $selectStartAmPm . "</div>"
	// . "<div class='small-3 columns'>End time: <input type='number' name='end[]' min='1' max='12' value='" . $end . "' required></div>"
	// . "<div class='small-3 columns'>AM/PM<select name='endMod[]'>" . $selectEndAmPm . "</div></div>";
}

function tutorSearch()
{
	var searchString = $.trim( $( ".tutor-search" ).val().toLowerCase() );

	if ( searchString != "" )
	{
		$( ".tutor-card" ).each( function( index )
		{
			var nameSpan = $( this ).find( ".tutor-name" );
			var name = nameSpan.text().toLowerCase();
			
			if ( name.indexOf( searchString ) === -1 )
			{
				nameSpan.removeClass( "highlight" );
				$( this ).fadeOut();
			}
			else
			{
				$( this ).fadeIn();
				nameSpan.addClass( "highlight" );
			}
		} );
	} else
	{
		$( ".tutor-name" ).removeClass( "highlight" );
		$( ".tutor-card" ).fadeIn();
	}
}