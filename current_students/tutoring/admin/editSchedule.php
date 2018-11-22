<?php
	// Includes the functions for managing the calendar
	include "readCSV.php";
	include "buildCalendar.php";
	include "buildTempTutoringPage.php";
	
	// Runs the functions to read the CSV, build the calendar string, then build the tutoring.php page
	$events = readCSV();
	$calendar = buildCalendar($events);
	buildTempTutoringPage($calendar);
	
	// Creates a navigational link to the tutoring.php page	
	echo "<a href='finalizeTutoringPage.php'>Finalize tutoring page</a><br>";
	echo "<a href='tempTutoring.php'>View preview of tutoring page</a><br>";
	echo "<a href='tutoring.php'>View current tutoring page</a><br>";
	
?>
