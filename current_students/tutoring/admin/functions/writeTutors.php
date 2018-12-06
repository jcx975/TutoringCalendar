<?php
	//
	// Takes an array of tutors as an argument and writes them to the tutors.csv file
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
				// Iterates through all of the current tutors content
				for($ii=0;$ii<count($tutors[$i]);$ii++)
				{
					// Makes sure not to add a delimiter to the end of the line and instead add a new line character
					if($ii<count($tutors[$i])-1)
					{
						$tutorsString .= $tutors[$i][$ii] . ";";
					}
					else
					{
						$tutorsString .= $tutors[$i][$ii] . "\n";
					}
				}
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
