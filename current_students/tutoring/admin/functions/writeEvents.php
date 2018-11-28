<?php
	//
	// Function to read each tutorEvents.csv file and make them one big
	// string to then write to events.csv
	//
	if(!function_exists("writeEvents"))
	{
		function writeEvents($tutors,$path)
		{
			// Includes all necessary functions
			include "readTutorEvents.php";
			
			// An string to hold all events
			$eventsString = "";
			
			// Iterates through each tutor
			for($i=0;$i<count($tutors);$i++)
			{
				// Selects a file name based on the first and last name of the tutor
				$fileName = $path . $tutors[$i][0] . trim($tutors[$i][1]) . ".csv";
				
				// An array to hold the events of that file
				$tutorEvents = readTutorEvents($fileName);
				
				// Iterates through each event in that array
				for($ii=0;$ii<count($tutorEvents);$ii++)
				{
					for($iii=0;$iii<count($tutorEvents[$ii]);$iii++)
					{
						for($iiii=0;$iiii<count($tutorEvents[$ii][$iii]);$iiii++)
						{
							if($iiii<count($tutorEvents[$ii][$iii])-1)
							{
								$eventsString .= $tutorEvents[$ii][$iii][$iiii] . ";";
							}
							else
							{
								$eventsString .= $tutorEvents[$ii][$iii][$iiii];							
							}
						}
					}
				}
			}
			
			// Attempts to open events.csv
			$fileName = $path . "events.csv";
			$file = fopen($fileName,"w");
			if(!$file)
			{
				die("Unable to open $fileName");
			}
			
			// Writes the string to the file
			fwrite($file,$eventsString);
			
			// Closes the file
			fclose($file);
		}
	}
?>
