<?php
	//
	// Function that writes the list of tutors to the tutors.csv
	//
	
	if(!function_exists("writeTutors"))
	{
		function writeTutors($tutors)
		{
			// String to write to tutors.csv
			$tutorsString = "";
			
			// Makes sure the tutors string has a delimiter and includes a new line character at the end
			for($i=0;$i<count($tutors);$i++)
			{
				$tutorsString .= $tutors[$i][0] . ";" . trim($tutors[$i][1]) . "\n";
			}
			
			// Attempts to open the file
			$fileName = "files/tutors.csv";
			$file = fopen($fileName,"w");
			if(!$file)
			{
				die("Unable to open $fileName");
			}
			
			// Writes the string to the file
			fwrite($file,$tutorsString);
			
			// Closes the file
			fclose($file);
		}
	}
?>