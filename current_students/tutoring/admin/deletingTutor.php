<?php
	//
	// This page deletes a tutor
	// The user will never see this page but will temporarily visit temporarily
	// any time they submit a delete tutor request
	// They will be redirected back to the main admin page
	//
	
	// Includes all necessary functions
	include "functions/deleteTutor.php";
	
	// Turns the POST data into an array of the tutor to delete
	$tutor = array($_POST["firstNameDelete"],$_POST["lastNameDelete"]);
	
	// Deletes the tutor
	deleteTutor($tutor);
	
	// Returns to the main admin page
	header("location:index.php");
	
	// Ends the page
	exit();
?>
