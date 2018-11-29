<?php
	//
	// Function that takes a tutor name and deletes them from all files
	//
	
	if(!function_exists("deleteTutor"))
	{
		function deleteTutor($tutor)
		{
			// Includes all necessary functions
			include "readTutors.php";
			include "writeTutors.php";
			
			// Gets the array of tutors
			$tutors = readTutors("files/tutors.csv");
			
			// An array that will be all tutors except the one being removed
			$newTutors = array();
			
			// Iterates through all tutors adding them to the new array unless they are the same tutor being deleted
			for($i=0;$i<count($tutors);$i++)
			{
				if(!(($tutors[$i][0]==$tutor[0])&&(trim($tutors[$i][1])==trim($tutor[1]))))
				{
					$newTutors[] = $tutors[$i];
				}
			}
			
			// Writes the new tutors array to tutors.csv
			writeTutors($newTutors);
			
			// Deletes the tutors file
			$fileName = "files/" . $tutor[0] . trim($tutor[1]) . ".csv";
			unlink($fileName);
		}		
	}
?>
