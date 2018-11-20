
$(document).ready( function()
{
	$( "button" ).click( editButtonClicked );
} );

function buttonClicked()
{
	if ( $( this ).hasClass( "tut-edit-button" ) )
		editButtonClicked();
	if ( $( this ).hasClass( "tut-addtime-button" ) )
		addTimeButtonClicked();
}

function editButtonClicked()
{
	if ( $( this ).hasClass( "tut-edit-button" ) )
	{
		$( this ).hide();
		$( "#title" ).html( "Editing tutor" );
		$( ".tut-add-button" ).hide();
		$( this ).siblings().hide();
		$( this ).parent().append( "<button type='submit' class='success button'>Save</button>" );
		$( this ).parent().prev().append( "<button type='button' class='button tut-addtime-button'>Add time</button>" );
		var currentCard = $( this ).parentsUntil( ".tutor-card" ).parent();
		currentCard.siblings().hide();
		currentCard.wrap( "<form></form>" );
	}
}

function addTimeButton()
{
	var table = $( this ).prev();
	table.hide();
	table.find( "tbody" ).add( "tr" );
}