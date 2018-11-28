<?php
	//
	// Takes a file with each tutors name as the argument
	// and returns an array of the names
	//
	
	if(!function_exists("readTutors"))
	{
		function readTutors($fileName)
		{
			// Includes all necessary functions
			include "sortTutors.php";	
			
			// Create the core file name
			
			
			// Creates a 2D array to hold the tutor names
			$tutors;
			
			// Attempts to open the file given as the argument
			$file = fopen($fileName,"r");
			if(!$file)
			{
				die("Unable to open $fileName");
			}
			
			// Iterates through the entire file and saves the name in the array
			while(!feof($file))
			{
				$line = fgets($file);
				$array = explode(";",$line);
				$tutors[] = $array;
			}
			
			// Closes the file
			fclose($file);
			
			// Since the file ends in an empty line this removes that last empty line
			unset($tutors[count($tutors)-1]);
			
			// Sorts the array alphabetically by last name then first
			usort($tutors,"sortTutors");
			
			// Returns the sorted tutors array
			return $tutors;
		}
	}
?>
