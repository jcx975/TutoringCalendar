<?php
	//
	// Writes the current full schedule into an html file called schedule.html
	//
	
	if(!function_exists("writeSchedule"))
	{
		function writeSchedule()
		{
			// Includes all necessary functions
			include "functions/readTutors.php";
			include "functions/writeEvents.php";
			include "functions/readEvents.php";
			include "functions/buildSchedule.php";
			
			// Gets the necessary variables from the included functions
			$tutors = readTutors();
			writeEvents($tutors);
			$events = readEvents("files/events.csv");
			$schedule = buildSchedule($events);
			
			// Attempts to open file schedule.html
			$fileName = "schedule.html";
			$file = fopen($fileName,"w");
			if(!$file)
			{
				die("Unable to open $fileName");
			}
			
			// Writes the schedule to the file
			fwrite($file,$schedule);
			
			// Closes the file
			fclose($file);
		}
	}
?>
