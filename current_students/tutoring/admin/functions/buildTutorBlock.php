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
				"' class='large-12 columns tutor-card'><h4><span class='tut-name'>" . $tutor[0] . " " . trim($tutor[1]) . "</span></h4>
				<div class='columns small-8'>" .
				$schedule . "</div>
				<div class='columns small-4'><button type='button' class='button tut-edit-button'>Edit time</button></div></div>";
			
			return $tutorBlock;
		}
	}	
?>
