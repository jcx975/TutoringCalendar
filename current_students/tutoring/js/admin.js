
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
	row += "<div class='row event-row shadow'><input type='hidden' form='save' name='day[]' value='" + dayString + "'>";
	row += "<div class='medium-2 columns'>Start Time <input type='number' form='save' name='start[]' min='1' max='12' placeholder='1-12' value='' required></div>";
	row += "<div class='medium-2 columns'>Minutes<select form='save' name='startIncrement[]'><option value='00'>00</option>"
				+ "<option value='15'>15</option>"
				+ "<option value='30'>30</option>"
				+ "<option value='45'>45</option>"
				+ "</select></div>";
	row += "<div class='medium-2 columns'>AM/PM<select name='startMod[]' form='save'><option value='am' selected>AM</option><option value='pm'>PM</option></select></div>";
	row += "<div class='medium-2 columns'>End Time <input type='number' form='save' name='end[]' min='1' max='12' placeholder='1-12' value='' required></div>";
	row += "<div class='medium-2 columns'>Minutes<select form='save' name='endIncrement[]'><option value='00'>00</option>"
				+ "<option value='15'>15</option>"
				+ "<option value='30'>30</option>"
				+ "<option value='45'>45</option>"
				+ "</select></div>";
	row += "<div class='medium-2 columns'>AM/PM<select form='save' name='endMod[]'><option value='am' selected>AM</option><option value='pm'>PM</option></select></div>";
	row += "<div class='medium-3 columns'>Location<input type='text' form='save' name='location[]' placeholder='Watkins' required></div>";
	row += "<div class='medium-2 columns'>Class<input type='number' form='save' name='class[]' min='101' max='999' placeholder='e.g. \"234\"' required></div>";
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