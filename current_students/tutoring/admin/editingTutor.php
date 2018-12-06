<?php
	//
	// This page completes the edits to a tutors events file after
	// the user submits them
	// This page will never be seen by the user but will temporarily visit
	// to complete event writing before returning to the edit tutor page
	//
	
	// Includes all necessary functions
	include "functions/saveEditTutorChanges.php";
	
	// Saves the changes to the tutors events file
	saveEditTutorChanges();
	
	// Returns to the main admin page
	header("location:index.php");
	
	// Ends the page
	exit();
?>
