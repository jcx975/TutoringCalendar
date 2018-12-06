<?php
	//
	// Takes an array of tutors as an argument and writes their events
	// to the events.csv file
	//
	
	if(!function_exists("writeEvents"))
	{
		function writeEvents($tutors)
		{
			// Includes all necessary functions
			include "readEvents.php";
			
			// A string to hold all events
			$eventsString = "";
			
			// Iterates through each tutor
			for($i=0;$i<count($tutors);$i++)
			{
				// Select file of the current tutor
				$fileName = "files/" . $tutors[$i][0] . $tutors[$i][1] . ".csv";
				
				// An array to hold the events of that file
				$tutorEvents = readEvents($fileName);
				
				// Iterates through each event in that array
				for($ii=0;$ii<count($tutorEvents);$ii++)
				{
					for($iii=0;$iii<count($tutorEvents[$ii]);$iii++)
					{
						for($iiii=0;$iiii<count($tutorEvents[$ii][$iii]);$iiii++)
						{
							// Adds delimiter between each part of the event except the after the last which is replaced with a new line character
							if($iiii<count($tutorEvents[$ii][$iii])-1)
							{
								$eventsString .= $tutorEvents[$ii][$iii][$iiii] . ";";
							}
							else
							{
								$eventsString .= $tutorEvents[$ii][$iii][$iiii] . "\n";							
							}
						}
					}
				}
			}
			
			// Attempts to open events.csv
			$fileName = "files/events.csv";
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
