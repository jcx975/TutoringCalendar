<?php
	//
	// This page edits to an existing tutor are made
	//
	
	// Includes all necessary functions
	include "functions/buildEditTutorPage.php";
	
	// Builds the conents for this page
	$contents = buildEditTutorPage("files/");
	
	// Displays the page
	echo $contents;
?>
