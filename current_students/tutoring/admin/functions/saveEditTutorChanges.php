<?php
	//
	// Uses POST data to update the events file for a tutor
	//
	
	if(!function_exists("saveEditTutorChanges"))
	{
		function saveEditTutorChanges()
		{
			// Includes all necessary functions
			include "writeTutorEvents.php";
			include "deleteTutor.php";
			include "addTutor.php";
			
			// Boolean for if the tutor is new and if event info was sent
			$newTutor = FALSE;
			$eventSubmission = FALSE;
			
			// Check to see if the tutor is new and changes boolean if they are
			if(isset($_POST["newTutor"]))
			{
				if($_POST["newTutor"]==1)
				{
					$newTutor = TRUE;
				}
			}
			
			// Check to see if there was an event submission
			if(isset($_POST["day"][0]))
			{
				$eventSubmission = TRUE;
			}
			
			// If there was an event submission then it proceeds
			if($eventSubmission)
			{
				// Saves the POST data into variables
				$day = $_POST["day"];
				$start = $_POST["start"];
				$startIncrement = $_POST["startIncrement"];
				$startMod = $_POST["startMod"];
				$end = $_POST["end"];
				$endIncrement = $_POST["endIncrement"];
				$endMod = $_POST["endMod"];
				$location = $_POST["location"];
				$class = $_POST["class"];
			}
			
			// Variables from POST
			$firstNameOld = $_POST["firstNameOld"];
			$lastNameOld = $_POST["lastNameOld"];
			$emailOld = $_POST["emailOld"];
			$firstName = $_POST["firstName"];
			$lastName = $_POST["lastName"];
			$email = $_POST["email"];
			
			// Ensures all names don't include trailing or leading whitespace
			$firstNameOld = trim($firstNameOld);
			$lastNameOld = trim($lastNameOld);
			$firstName = trim($firstName);
			$lastName = trim($lastName);			
			
			// Makes an array for the old and new tutor
			$oldTutorArray = array($firstNameOld,$lastNameOld,$email);
			$newTutorArray = array($firstName,$lastName,$email);
			
			// Checks if the tutors name or email was changed
			if(!(($firstName==$firstNameOld)&&($lastName==$lastNameOld)&&($email==$emailOld)))
			{
				if(!$newTutor)
				{
					// Deletes the files of the old tutor
					deleteTutor($oldTutorArray);
				}
				
				// Adds new tutor and files with new tutor
				addTutor($newTutorArray);
			}
			
			// If an event submission was received then update write them to the tutors events file 
			if($eventSubmission)
			{
				// Writes the events over the tutors previous file
				writeTutorEvents($day,$start,$startIncrement,$startMod,$end,$endIncrement,$endMod,$location,$class,$firstName,$lastName,$email);
			}
			// If there was no event submission then write an empty file to the tutors events file
			else
			{
				// Attempts to open file
				$fileName = "files/" . $firstName . $lastName . ".csv";
				$file = fopen($fileName,"w");
				if (!$file)
				{
					die( "Unable to open $fileName" );
				}
				
				// Writes an empty string to the file
				fwrite($file,"");
				
				// Closes the file
				fclose($file);
			}
		}
	}
?>
