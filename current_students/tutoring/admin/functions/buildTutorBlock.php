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
			
			$editTutorStringP1 = "<form action='editTutorPage.php' method='POST'>"
				. "<input type='hidden' name='firstName' value='";
			
			$editTutorStringP2 = "'><input type='hidden' name='lastName' value='";
			
			$editTutorStringP3 = "'><input class='button tut-add-button float-right' type='submit' value='Edit tutor'></form>";
			
			$editTutorString = $editTutorStringP1 . $tutor[0] . $editTutorStringP2 . trim($tutor[1]) . $editTutorStringP3;
			
			$tutorEventsFileName = $path . $tutor[0] . trim($tutor[1]) . ".csv";
			
			$events = readTutorEvents($tutorEventsFileName);
			$schedule = buildSchedule($events);
			
			// Old button
			// <a href='./editTutors.php' class='button tut-edit-button float-right'>
			
			// String to hold the block contents
			$tutorBlock = "<div id='" . $tutor[0] . trim($tutor[1]) .
				"' class='large-12 columns tutor-card shadow round'>"
					. $editTutorString . "</a>"
					. "<h4><span class='tutor-name'>" . $tutor[0] . " " . trim($tutor[1]) . "</span></h4>"
					. "<div class='columns small-12'>"
					. $schedule . "</div></div>";
			
			return $tutorBlock;
		}
	}	
?>
