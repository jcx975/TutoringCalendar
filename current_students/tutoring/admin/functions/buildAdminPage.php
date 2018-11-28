<?php
	//
	// Function to build the main admin page
	//
	
	if(!function_exists("buildAdminPage"))
	{	
		function buildAdminPage($path)
		{
			// Includes all neccessary functions
			include "readTutors.php";
			include "writeEvents.php";
			include "readEvents.php";
			include "buildSchedule.php";
			include "buildTutorBlock.php";
			
			// Appends the path onto the file names
			$tutorsFileName = $path . "tutors.csv";
			$eventsFileName = $path . "events.csv";
			
			// Gets the tutors array
			$tutors = readTutors($tutorsFileName);
			
			// Writes the tutorEvents to the events.csv
			writeEvents($tutors,$path);
			
			// Gets the events array
			$events = readEvents($eventsFileName);
			
			// Gets the schedule
			$schedule = buildSchedule($events);
			
			// String for the temporary admin page layout
			$adminPageContents =
				"<h1>Admin Page</h1><hr>" .
					"<div id='tutors'><h2>Tutors</h2>";
			
			// Adds the tutor blocks to the string
			for($i=0;$i<count($tutors);$i++)
			{
				$adminPageContents .= buildTutorBlock($tutors[$i],$path);
			}
			
			// Adds the end div tag
			$adminPageContents .= "</div><hr>";
			
			// Adds the schedule to the string
			$adminPageContents .= "<div id='schedule'><h2>Schedule</h2>" .
				$schedule . "</div>";
				
			// Returns the finished adminPage string
			return $adminPageContents;
		}
	}
?>
