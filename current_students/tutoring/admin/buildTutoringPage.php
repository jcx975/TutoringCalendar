<?php
	//
	// This page is a confirmation screen informing the user that the tutoring page has been successfully updated
	//
	
	// Includes all necessary functions
	include "functions/buildTutoringSchedule.php";
	
	// Gets the schedule for the tutoring page
	$tutoringPageContents = buildTutoringSchedule("files/");
	
	// Attempts to open the file
	$fileName = "tutoring.html";
	$file = fopen($fileName,"w");
	if(!$file)
	{
		die("Unable to open $fileName");
	}
	
	// Writes the contents of the tutoring page to the file
	fwrite($file,$tutoringPageContents);
	
	// Closes the file
	fclose($file);
	
	// Navigational links back to admin page or to view tutoring page
	$confirmationPage = "<p>You have successfully updated the tutoring page</a><br>"
		. "<a href='index.php'>Return</a>&nbsp<a href='tutoring.html'>View Tutoring Page</a>";
	
	// Displays the navigations links
	echo $confirmationPage;
	
?>
