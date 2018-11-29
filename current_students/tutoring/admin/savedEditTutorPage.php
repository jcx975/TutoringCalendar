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
	
	// Gets the editTutorPage contents
	$contents = buildEditTutorPage("files/");
	
	// Displays the page
	echo $contents;
?>
