<?php
	//
	// Deletes all tutors and their files performing a full refresh of all tutoring data
	//

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
