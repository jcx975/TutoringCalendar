<?php
	// Makes the array for all events
	$events;
	
	// Reads the CSV file containing all events
	$csvFileName = "calendarData.csv";
	$csvFile = fopen($csvFileName, "r");
	if(!$csvFile)
	{
		die("Unable to open $csvFileName");
	}
	
	// Makes each row of the file into an array and puts it in
	// an associative array with each key being days of the week
	while(!feof($csvFile))
	{
		$line = fgets($csvFile);
		$array = explode(";",$line);
		$events[$array[0]][] = $array;
	}
	
	// Creates an array of the keys for the events
	$eventsKeys = array_keys($events);
	
	// Creates the top of the calendar table
	$calendar = "<table>
		<tr>
			<th>Sunday</th>
			<th>Monday</th>
			<th>Tuesday</th>
			<th>Wednesday</th>
			<th>Thursday</th>
			<th>Friday</th>
			<th>Saturday</th>
		</tr>
		<tr>";
	
	// Creates the strings for each cell in the table
	$sunString = "<td>";
	$monString = "<td>";
	$tueString = "<td>";
	$wedString = "<td>";
	$thuString = "<td>";
	$friString = "<td>";
	$satString = "<td>";
	
	// Iterates through the array of days
	for($i=0;$i<count($events);$i++)
	{
		// Iterates through the arrays of the current day
		for($ii=0;$ii<count($events[$eventsKeys[$i]]);$ii++)
		{
			// Checks the day of each array of the current day in a switch
			switch ($events[$eventsKeys[$i]][$ii][0])
			{
				// Creates a div element with the start and end time displayed for each event
				case "Sunday":
					$sunString .= "<div>Start Time: " . $events[$eventsKeys[$i]][$ii][1]
						. "<br>End Time: " . $events[$eventsKeys[$i]][$ii][2] . "</div>";
					break;
				case "Monday":
					$monString .= "<div>Start Time: " . $events[$eventsKeys[$i]][$ii][1]
						. "<br>End Time: " . $events[$eventsKeys[$i]][$ii][2] . "</div>";					
					break;
				case "Tuesday":
					$tueString .= "<div>Start Time: " . $events[$eventsKeys[$i]][$ii][1]
						. "<br>End Time: " . $events[$eventsKeys[$i]][$ii][2] . "</div>";
					break;
				case "Wednesday":
					$wedString .= "<div>Start Time: " . $events[$eventsKeys[$i]][$ii][1]
						. "<br>End Time: " . $events[$eventsKeys[$i]][$ii][2] . "</div>";
					break;
				case "Thursday":
					$thuString .= "<div>Start Time: " . $events[$eventsKeys[$i]][$ii][1]
						. "<br>End Time: " . $events[$eventsKeys[$i]][$ii][2] . "</div>";
					break;
				case "Friday":
					$friString .= "<div>Start Time: " . $events[$eventsKeys[$i]][$ii][1]
						. "<br>End Time: " . $events[$eventsKeys[$i]][$ii][2] . "</div>";
					break;
				case "Saturday":
					$satString .= "<div>Start Time: " . $events[$eventsKeys[$i]][$ii][1]
						. "<br>End Time: " . $events[$eventsKeys[$i]][$ii][2];
					break;
			}
		}
	}
	
	// Closes the table data tag for each cell
	$sunString .= "</td>";
	$monString .= "</td>";
	$tueString .= "</td>";
	$wedString .= "</td>";
	$thuString .= "</td>";
	$friString .= "</td>";
	$satString .= "</td>";
	
	// Fills in the second row with each days cells
	$calendar .= $sunString . $monString . $tueString . $wedString .
		$thuString. $friString . $satString . "</tr></table>";
	
	// Displays the calendar
	
	echo $calendar;
	
	
	
	
	
?>