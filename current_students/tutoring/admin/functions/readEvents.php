<?php
	//
	// Takes a file to read from as an argument and sorts its contents into an array
	// The array is split by day of the week, then sorted by start and end time
	//
	
	if(!function_exists("readEvents"))
	{
		function readEvents($fileName)
		{
			// Includes all necessary functions
			include "sortEvents.php";
			
			// 3D array to contain each event separated by day of the week
			$events = array (array(),array(),array(),array(),array(),array(),array());
			
			// Attempts to open the file
			$file = fopen($fileName,"r");
			if(!$file)
			{
				die("Unable to open $fileName");
			}
			
			// Reads the files contents into array "events"
			while(!feof($file))
			{
				$line = fgets($file);
				$array = explode(";",$line);
				
				// Sorts the events into the correct day of the week
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
			
			// Trims all white spaces and new line characters from the array
			for($i=0;$i<count($events);$i++)
			{
				for($ii=0;$ii<count($events[$i]);$ii++)
				{
					for($iii=0;$iii<count($events[$i][$ii]);$iii++)
					{
						$events[$i][$ii][$iii] = trim($events[$i][$ii][$iii]);
					}
				}
			}
			
			// Sorts the events based on start time and end time
			for($i=0;$i<count($events);$i++)
			{
				usort($events[$i],"sortEvents");
			}
			
			// Returns the sorted array of events
			return $events;
		}
	}
?>
