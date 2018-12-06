<?php
	//
	// Takes a tutor array as an argument and deletes that tutors files
	// and removes them from the tutors.csv file
	//
	
	if(!function_exists("deleteTutor"))
	{
		function deleteTutor($tutor)
		{
			// Includes all necessary functions
			include "readTutors.php";
			include "writeTutors.php";
			
			// Gets the necessary variables from the included functions
			$tutors = readTutors();
			
			// An array that will contain all tutors except the one being removed
			$newTutors = array();
			
			// Iterates through all tutors adding them to the new array unless they are the same tutor being deleted
			for($i=0;$i<count($tutors);$i++)
			{
				if(!(($tutor[0]==$tutors[$i][0])&&($tutor[1]==$tutors[$i][1])))
				{
					$newTutors[] = $tutors[$i];
				}
			}
			
			// Writes the new tutors array to tutors.csv
			writeTutors($newTutors);
			
			// Deletes the tutor file
			$fileName = "files/" . $tutor[0] . $tutor[1] . ".csv";
			unlink($fileName);
		}		
	}
?>
