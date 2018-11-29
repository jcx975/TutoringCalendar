<?php
	//
	// Function to take an events form submission and use it to write the events
	// to the tutors file and allows changes to the tutor name by deleting the
	// files associated with the old tutor name and making new files with the new name
	//
	
	if(!function_exists("savedEditTutorSubmission"))
	{
		function savedEditTutorSubmission()
		{
			// Includes all necessary functions
			include "writeTutorEvents.php";
			include "deleteTutor.php";
			include "addTutor.php";
			
			// Boolean to ensure a the POST request was successfully
			$receivedPOST = FALSE;
			
			if(isset($_POST["day"][0]))
			{
				$receivedPOST = TRUE;
			}
			
			if($receivedPOST)
			{
				// Gets the data from the form saved into arrays or variables
					// Arrays from POST
				$day = $_POST["day"];
				$start = $_POST["start"];
				$startMod = $_POST["startMod"];
				$end = $_POST["end"];
				$endMod = $_POST["endMod"];
			}
			
			// Variables from POST
			$oldFirstName = $_POST["oldFirstName"];
			$oldLastName = $_POST["oldLastName"];
			$firstName = $_POST["firstName"];
			$lastName = $_POST["lastName"];
			
			// Ensures all names dont include trailing or leading whitespace
			$oldFirstName = trim($oldFirstName);
			$oldLastName = trim($oldLastName);
			$firstName = trim($firstName);
			$lastName = trim($lastName);			
			
			// Checks if the tutors name was changed
			if((!(($firstName==$oldFirstName)&&($lastName==$oldLastName)))&&($receivedPOST))
			{
				// Makes an array for the old and new name
				$oldTutorName = array($oldFirstName,$oldLastName);
				$newTutorName = array($firstName,$lastName);
				
				// Deletes the files of the old name
				deleteTutor($oldTutorName);
				
				// Adds new tutor nd files with new name
				addTutor($newTutorName);
				
				// Writes the events
			}
			
			if($receivedPOST)
			{
				// Writes the events over the tutors previous file
				writeTutorEvents($day,$start,$startMod,$end,$endMod,$firstName,$lastName);
			}
			
			// Returns whether or not the POST data was received properly
			return $receivedPOST;
		}
	}
?>
