<?php
	//
	// Function to build a single tutor block including name and individual schedule
	//
	
	if(!function_exists("buildTutorBlock"))
	{
		function buildTutorBlock($tutor,$path)
		{
			// Includes all necessary functions
			include "readTutorEvents.php";
			include "buildSchedule.php";
			
			$tutorEventsFileName = $path . $tutor[0] . trim($tutor[1]) . ".csv";
			
			$events = readTutorEvents($tutorEventsFileName);
			$schedule = buildSchedule($events);
			
			// String to hold the block contents
			$tutorBlock = "<div id='" . $tutor[0] . trim($tutor[1]) .
				"'><h3>" . $tutor[0] . " " . trim($tutor[1]) . "</h3>" .
				$schedule . "</div>";
			
			return $tutorBlock;
		}
	}	
?>
