<?php
	//
	// Function to read the events.csv file and turn it into
	// an array sorted by day of week then start time
	//
	if(!function_exists("readEvents"))
	{
		function readEvents($fileName)
		{
			// Includes all necessary functions
			include "compareStart.php";
			
			// 3D array to contain each element seperated by day of the week
			$events = array (array(),array(),array(),array(),array(),array(),array());
			
			// Attempts to open the file
			$file = fopen($fileName,"r");
			if(!$file)
			{
				die("Unable to open $fileName");
			}
			
			// Iterates through each line of the file
			while(!feof($file))
			{
				$line = fgets($file);
				$array = explode(";",$line);
				
				// Separates the lines based upon day of the week
				switch($array[0])
				{
					case "Sunday":
						$events[0][] = $array;
						break;
					case "Monday":
						$events[1][] = $array;
						break;
					case "Tuesday":
						$events[2][] = $array;
						break;
					case "Wednesday":
						$events[3][] = $array;
						break;
					case "Thursday":
						$events[4][] = $array;
						break;
					case "Friday":
						$events[5][] = $array;
						break;
					case "Saturday":
						$events[6][] = $array;
						break;
				}
			}
			
			// Closes the file
			fclose($file);
			
			// Sorts the event for each day of the week based on start time
			for($i=0;$i<count($events);$i++)
			{
				usort($events[$i],"compareStart");
			}
			
			// Returns the sorted array of events
			return $events;
		}
	}
?>
