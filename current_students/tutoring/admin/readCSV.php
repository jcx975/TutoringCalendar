<?php
	//////////////////////////////////////////////////////////////
	//	Reads the CSV into an array and sorts it
	//////////////////////////////////////////////////////////////
	
	function readCSV()
	{
		// Makes the 3D array to contain all tutoring events
		// Outer array represents the day of the week
		// Middle array represents the events of the specific day of the week
		// Inner array represents the data of the specific event
		$events = array (array(),array(),array(),array(),array(),array(),array());
		
		// Opens the temp CSV file containing all events
		$tempcsvFileName = "tempTutoringEvents.csv";
		$tempcsvFile = fopen($tempcsvFileName, "r");
		if(!$tempcsvFile)
		{
			die("Unable to open $tempcsvFileName");
		}
		
		// Saves each event as a new array within the $events array
		while(!feof($tempcsvFile))
		{
			$line = fgets($tempcsvFile);
			$array = explode(";",$line);
			// Saves each event array in the correct day of the week
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
		fclose($tempcsvFile);
		
		// Function used to sort the array of events
		function compareStart($x,$y)
		{	
			// Adds 12 to value of pm times
			if(trim($x[2])==trim("pm"))
			{	
				$xVal = $x[1]+12;
			}
			else
			{
				$xVal = $x[1];
			}
			
			if(trim($y[2])==trim("pm"))
			{	
				$yVal = $y[1]+12;
			}
			else
			{
				$yVal = $y[1];
			}
			
			// Evaluates if xVal is smaller than yVal
			if($xVal==$yVal)
			{
				return 0;
			}
			else if($xVal>$yVal)
			{
				return 1;
			}
			else
			{
				return -1;
			}
		}
		
		// Sorts the $events array
		for($i=0;$i<count($events);$i++)
		{
			usort($events[$i],"compareStart");
		}
		
		return $events;
	}
?>
