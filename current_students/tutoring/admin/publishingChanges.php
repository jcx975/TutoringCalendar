<?php
	//
	// This page publishes any changes to the schedule to the
	// public tutoring page and returns a confirmation message to the admin page
	// The user does not see this page but will temporarily visit it when publishing changes
	// Redirects the user back to the admin page
	//
	
	// Starts the session to allow confirmation messages
	session_start();
	
	// Adds confirmation message to the SESSION
	$_SESSION["confirmPublishChanges"] = "Changes have been published";

	// Includes all necessary functions
	include "functions/writeSchedule.php";
	
	echo writeSchedule();
	
	// Returns to the main admin page
	header("location:index.php");
	
	// Ends the page
	exit();
?>
