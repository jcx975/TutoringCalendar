<?php
	//
	// Builds a string of the entire edit tutoring page and uses other functions to build the form
	// for submitting changes to the event information and a displays a schedule preview for the tutor
	//
	
	if(!function_exists("buildEditTutorPage"))
	{
		function buildEditTutorPage()
		{
			// Includes all necessary functions
			include "readEvents.php";
			include "buildSchedule.php";
			include "buildEditTutorForm.php";
			
			// Boolean set to true if this is a new tutor
			$newTutor;
			
			// Array to hold tutor information
			$tutor = array($_POST["firstName"],$_POST["lastName"],$_POST["email"]);
			
			// String that will contain the edit tutor page contents
			$editTutorPageContents = "<div class='row'><h2>Editing <span class='tutor-name'>" . $tutor[0] . " " . $tutor[1] . "</span></h2>";
			
			// Determines if this is a new tutor or not
			if(($tutor[0]=="NEW")&&($tutor[1]=="TUTOR"))
			{
				$newTutor = TRUE;
			}
			else
			{
				$newTutor = FALSE;
			}
			
			// If its a new tutor it makes a blank edit tutor page
			if($newTutor)
			{
				// Appends the empty edit tutor form
				$editTutorPageContents .= buildEditTutorForm($tutor,$newTutor);
			}
			// If this is an existing tutor it pulls the information and builds the schedule
			else
			{
				// Appends the filled edit tutor form
				$editTutorPageContents .= buildEditTutorForm($tutor,$newTutor);
				
				// Makes the file name
				$fileName = "files/" . $tutor[0] . $tutor[1] . ".csv";
				
				// Gets the necessary variables from the included functions
				$events = readEvents($fileName);
				$schedule = buildSchedule($events,TRUE);
				
				$editTutorPageContents .= $schedule;
			}
			
			// Closes the div tag
			$editTutorPageContents .= "</div>";
			
			// Returns the string of the edit tutoring page contents
			return $editTutorPageContents;
		}
	}
?>
