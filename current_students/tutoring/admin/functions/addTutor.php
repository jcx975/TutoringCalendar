<?php
	//
	// Takes a tutor array and adds them to tutors.csv and makes an empty events file
	// for that tutor and it checks to ensure there are no duplicate tutor additions
	//
	
	if(!function_exists("addTutor"))
	{
		function addTutor($tutor)
		{
			// Includes all necessary function
			include "readTutors.php";
			include "writeTutors.php";
			
			// Gets the necessary variables from the included functions
			$tutors = readTutors("files/tutors.csv");
			
			// Makes sure there is an array to search
			if(empty($tutors))
			{
				$tutors = array(array("DELETE","ALL","EMAIL"));
			}
			
			// Boolean to ensure this is not a duplicate addition of a tutor
			$duplicateTutor = FALSE;
			
			for($i=0;$i<count($tutors);$i++)
			{
				if(($tutor[0]==$tutors[$i][0])&&($tutor[1]==$tutors[$i][1]))
				{
					$duplicateTutor = TRUE;
				}
			}
			
			// Only completes the process of adding a tutor if this is not a duplicate addition
			if(!$duplicateTutor)
			{
				// Adds the current tutor
				$tutors[] = $tutor;
				
				// Fixes problem with deleting all tutors
				if(($tutors[0][0]=="DELETE")&&($tutors[0][1]=="ALL"))
				{
					$tutors[0][0] = $tutors[1][0];
					$tutors[0][1] = $tutors[1][1];
					$tutors[0][2] = $tutors[1][2];
					unset($tutors[1]);
				}
				
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
	}
?>
