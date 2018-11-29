<?php
	//
	// Function that makes a new events file for a tutor and add them to the tutors.csv file
	//
	
	if(!function_exists("addTutor"))
	{
		function addTutor($tutor)
		{
			// Includes all necessary function
			include "readTutors.php";
			include "writeTutors.php";
			
			// Gets the current tutors array
			$tutors = readTutors("files/tutors.csv");
			
			// Adds the current tutor
			$tutors[] = $tutor;
			
			// Writes the tutors.csv file with the new list
			writeTutors($tutors);
			
			// Empty string to write to the tutors empty file
			$emptyString = "";
			
			// Makes a new file for the tutor
			$fileName = "files/" . $tutor[0] . trim($tutor[1]) . ".csv";
			$file = fopen($fileName,"w");
			if(!$file)
			{
				die("Unable to open $fileName");
			}
			
			// Writes the empty string to the file
			fwrite($file,$emptyString);
			
			// Closes the file
			fclose($file);
		}
	}
?>
