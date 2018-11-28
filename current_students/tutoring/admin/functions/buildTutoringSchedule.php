<?php
	//
	// Function that takes a pathway to the files and returns a string with the schedule
	//
	
	if(!function_exists("buildTutoringSchedule"))
	{
		function buildTutoringSchedule($path)
		{
			// Includes all necessary function
			include "readTutors.php";
			include "writeEvents.php";
			include "readEvents.php";
			include "buildSchedule.php";
			
			// Makes the correct pathway to event.csv
			$eventsFileName = $path . "events.csv";

			$fileName = $path . "tutors.csv";
			
			// Gets the tutors array
			$tutors = readTutors($fileName);
			
			// Writes the events.csv file
			writeEvents($tutors, $path);
			
			// Gets the events array
			$events = readEvents($eventsFileName);
			
			// Gets the schedule as a string
			$schedule = buildSchedule($events);
			
			// Returns the schedule as a string
			return $schedule;
		}
	}
?>
