<?php
	//
	// Function to read a tutorEvents.csv file and return a sorted array of the events
	//
	
	if(!function_exists("readTutorEvents"))
	{
		function readTutorEvents($fileName)
		{
			// Includes all necessary functions
			include "readEvents.php";
			
			// Reads the tutorEvent.csv file into an array
			$events = readEvents($fileName);
			
			return $events;
		}
	}
?>
