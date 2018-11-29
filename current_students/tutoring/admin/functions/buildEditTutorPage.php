<?php
	//
	// Function that returns the contents of the editTutor page by checking if
	// the tutor name given is a known tutor or a unknown one
	//
	
	if(!function_exists("buildEditTutorPage"))
	{
		function buildEditTutorPage($path)
		{
			echo $_POST["firstName"] . " " . $_POST["lastName"] . "<hr>";
			
			// Includes all necessary functions
			include "readTutors.php";
			include "readTutorEvents.php";
			include "editTutorForm.php";
			include "buildSchedule.php";
			
			// Makes the correct file name
			$tutorsFileName = $path . "tutors.csv";
			
			// Gets the tutors array
			$tutors = readTutors($tutorsFileName);
			
			// Array holding the current tutor
			$tutor = array($_POST["firstName"],$_POST["lastName"]);
			
			// Boolean to hold status as new tutor or not
			$newTutor = TRUE;
			
			// String to hold the editTutorForm
			$tutorForm = "";
			
			// String to hold the tutor schedule
			$tutorSchedule = "";
			
			// If this is a new tutor it makes an empty editTutorPage
			if(($tutor[0] == "New")&&($tutor[1] == "Tutor"))
			{
				$newTutor = TRUE;
				$tutorForm = editTutorForm($tutor,$path,$newTutor);
			}
			else
			{
				for($i=0;$i<count($tutors);$i++)
				{
					if(($tutor[0]==$tutors[$i][0])&&(trim($tutor[1])==trim($tutors[$i][1])))
					{
						$newTutor = FALSE;
						$tutorForm = editTutorForm($tutor,$path,$newTutor);
					}
				}
				
				// Makes the file name
				$tutorFileName = $path . $tutor[0] . trim($tutor[1]) . ".csv";
				
				// Gets the events array
				$tutorEvents = readTutorEvents($tutorFileName);
				
				// Gets the schedule of only this tutor
				$tutorSchedule = buildSchedule($tutorEvents);
			}
			
			// String with the entire contents of the editTutor page
			$editTutorPageContents = "<h1>Edit Tutor</h1><h2>" . $tutor[0] . " " . trim($tutor[1]) . "</h2>" . $tutorForm . $tutorSchedule;
			
			// Returns the string of the page contents
			return $editTutorPageContents;
		}
	}
?>
