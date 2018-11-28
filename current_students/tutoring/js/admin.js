
$(document).ready( function()
{
	$( "button" ).click( buttonClicked );
} );

function buttonClicked()
{
	if ( $( this ).hasClass( "tut-edit-button" ) )
		editButtonClicked( $( this ) )
	if ( $( this ).hasClass( "tut-addtime-button" ) )
		addTimeButtonClicked( $( this ) );
	if ( $( this ).hasClass( "tut-add-button" ) )
		addTutorButtonClicked( $( this ) );
}

function editButtonClicked( button )
{
	button.hide();
	$( "#title" ).html( "Editing tutor" );
	$( ".tut-add-button" ).hide();
	button.siblings().hide();
	button.parent().append( "<button type='submit' class='success button'>Save</button>" );
	button.parent().prev().append( "<button type='button' class='button tut-addtime-button'>Add time</button>" );
	var currentCard = button.parentsUntil( ".tutor-card" ).parent();
	currentCard.siblings().hide();
	currentCard.wrap( "<form></form>" );
}

function addTutorButtonClicked()
{
	$( "#tutors" ).append( "<input type='text'></input>" );
}

function addTimeButton()
{
	var table = $( this ).prev();
	table.hide();
	table.find( "tbody" ).add( "tr" );
}