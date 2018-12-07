<?php
	//
	// Takes a tutor array as an argument and returns the tutor block as a string
	// A tutor block includes the tutors name, schedule, edit button, and delete button
	//
	
	if(!function_exists("buildTutorBlock"))
	{
		function buildTutorBlock($tutor)
		{
			// Includes all necessary functions
			include "readEvents.php";
			include "buildSchedule.php";
			
			// Constructs the file name for the tutors events file
			$fileName = "files/" . $tutor[0] . $tutor[1] . ".csv";
			
			// Gets the necessary variables from the included functions
			$events = readEvents($fileName);
			$schedule = buildSchedule($events,TRUE);
			
			// String to hold the content of the tutor block
			$tutorBlock = "<div id='" . $tutor[0] . $tutor[1] . "' class='large-12 columns tutor-card shadow round'>";
			
				
			// Creates a delete tutor form with hidden values and a submit button
			$tutorBlock .= "<form action='deletingTutor.php' method='POST'>"
				. "<input type='hidden' name='firstNameDelete' value='" . $tutor[0] . "'>"
				. "<input type='hidden' name='lastNameDelete' value='" . $tutor[1] . "'>"
				. "<input class='button tut-add-button float-right' type='submit' value='Delete Tutor'></form>";
			
			// Creates a edit tutor form with hidden values and a submit button
			$tutorBlock .= "<form action='editTutor.php' method='POST'>"
				. "<input type='hidden' name='firstName' value='" . $tutor[0] . "'>"
				. "<input type='hidden' name='lastName' value='" . $tutor[1] . "'>"
				. "<input type='hidden' name='email' value='" . $tutor[2] . "'>"
				. "<input class='button tut-add-button float-right' type='submit' value='Edit Tutor'></form>";
			
			// Adds the schedule to the block
			$tutorBlock .=  "<h4><span class='tutor-name'>" . $tutor[0] . " " . $tutor[1] . "</span></h4>"
				. "<div class='columns small-12'>" . $schedule . "</div></div>";
			
			return $tutorBlock;
		}
	}
?>
