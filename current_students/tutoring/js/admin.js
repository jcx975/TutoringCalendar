
$(document).ready( function()
{
	$( "button" ).click( buttonClicked );
} );

function buttonClicked()
{
	if ( $( this ).hasClass( "tut-addevent-button" ) )
		addEventButtonClicked( $( this ) );
}

function addEventButtonClicked( button )
{
	
}