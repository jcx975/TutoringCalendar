<?php
	//
	// Function that takes a tutors events and writes them to the tutors events file
	//
	
	if(!function_exists("writeTutorEvents"))
	{
		function writeTutorEvents($day,$start,$startMod,$end,$endMod,$firstName,$lastName)
		{
			// String to contain the events to write to the file
			$events = "";
			
			// Saves each line of events with delimiters and new line characters
			for($i=0;$i<count($day);$i++)
			{
				$events .= $day[$i] . ";" . $start[$i] . ";"
					. $startMod[$i] . ";" . $end[$i] . ";"
					. $endMod[$i] . "\n";
			}
			
			// Attempts to open file
			$fileName = "files/" . $firstName . $lastName . ".csv";
			$file = fopen($fileName,"w");
			if(!$file)
			{
				die("Unable to open $fileName");
			}
			
			// Writes the events to the file
			fwrite($file,$events);
			
			// Closes the file
			fclose($file);
		}
	}
?>
