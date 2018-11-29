<?php
	//
	// This page is the same as the normal editTutorPage except it is updated with user entered
	// information and updates all files as needed.
	//
	
	// Includes all necessary functions
	include "functions/savedEditTutorSubmission.php";
	include "functions/buildEditTutorPage.php";
	
	// Updates the file information with saved information
	$postResult = savedEditTutorSubmission();
	
	if($postResult)
	{
		// Gets the editTutorPage contents
		$contents = buildEditTutorPage("files/");
		
		// Displays the page
		echo $contents;
	}
	else
	{
		echo "<p>Tutor was not added. Please include at least one event tutoring event to add a tutor</p><br>"
			. "<a href='index.php'>Return</a>";
	}
?>
