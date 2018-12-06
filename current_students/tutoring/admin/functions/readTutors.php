<?php
	//
	// Returns a sorted array of all tutors and their information
	//
	
	if(!function_exists("readTutors"))
	{
		function readTutors()
		{
			// Includes all necessary functions
			include "sortTutors.php";
			
			// Array to hold all tutors an their information
			$tutors = array();
			
			// Opens the tutors.csv file
			$fileName = "files/tutors.csv";
			$file = fopen($fileName,"r");
			if(!$file)
			{
				die("Unable to open $fileName");
			}
			
			// Reads file contents into array "tutors"
			while(!feof($file))
			{
				$line = fgets($file);
				$array = explode(";",$line);
				$tutors[] = $array;
			}
			
			// Closes the file
			fclose($file);
			
			// Removes the last line in the file as it is an empty line with no tutor information
			unset($tutors[count($tutors)-1]);
			
			// Trims all white spaces and new line characters from the array
			for($i=0;$i<count($tutors);$i++)
			{
				for($ii=0;$ii<count($tutors[$i]);$ii++)
				{
					$tutors[$i][$ii] = trim($tutors[$i][$ii]);
				}
			}
			
			// Sorts the array based on last name then first name
			usort($tutors,"sortTutors");
			
			// Returns the "tutors" array
			return $tutors;
		}
	}
?>
