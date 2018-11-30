
$(document).ready( function()
{
	$( "button" ).on( "click", buttonClicked );
	$( ".tut-deleteevent-button" ).on( "click", deleteEventButtonClicked );
	$( ".tutor-search" ).on( "keyup", tutorSearch );
} );

function buttonClicked()
{
	if ( $( this ).hasClass( "tut-addevent-button" ) )
		addEventButtonClicked( $( this ) );
	if ( $( this ).hasClass( "tut-deleteevent-button" ) )
		deleteEventButtonClicked( $( this ) );
}

function addEventButtonClicked( button )
{
	var dayString = button.parent().attr( "id" );
	var dayDiv = button.parent();
	var row = "";
	row += "<div class='row event-row shadow'><input type='hidden' name='day[]' value='" + dayString + "'>";
	row += "<div class='medium-2 columns'>Start time: <input type='number' name='start[]' min='1' max='12' value='1' required></div>";
	row += "<div class='medium-2 columns'>AM/PM<select name='startMod[]'><option value='am' selected>AM</option><option value='pm'>PM</option></select></div>";
	row += "<div class='medium-2 columns'>End time: <input type='number' name='end[]' min='1' max='12' value='1' required></div>";
	row += "<div class='medium-2 columns'>AM/PM<select name='endMod[]'><option value='am' selected>AM</option><option value='pm'>PM</option></select></div>";
	row += "<div class='medium-3 columns'>Location:<input type='text' name='location' required></div>";
	row += "<div class='medium-2 columns'>Class:<input type='number' name='class' min='101' max='999' placeholder='e.g. \"234\"' required></div>";
	row += "<div class='medium-10 columns'>Comments:<textarea name='comments' rows='5'></textarea></div>";
	row += "<span class='tut-deleteevent-button red'>&times;</span></div>";
	dayDiv.append( row );
	dayDiv.find( ".tut-deleteevent-button" ).off( "click" ).on( "click", deleteEventButtonClicked );
}

function deleteEventButtonClicked()
{
	var rowDiv = $( this ).parent();
	rowDiv.remove();
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