<?php
	//
	// Deletes all tutors and their files performing a full refresh of all tutoring data
	//

	// Starts the session to allow confirmation messages
	session_start();
	
	// Adds confirmation message to the SESSION
	$_SESSION["confirmDeleteAll"] = "All tutors have been deleted";	
	
	// Includes all necessary functions
	include "functions/readTutors.php";
	include "functions/deleteTutor.php";
	
	// Gets the necessary variables from the included functions
	$tutors = readTutors();
	
	// Deletes each tutor in the tutors.csv file
	for($i=0;$i<count($tutors);$i++)
	{
		deleteTutor($tutors[$i]);
	}
	
	// Returns to the main admin page
	header("location:index.php");
	
	// Ends the page
	exit();
?>
