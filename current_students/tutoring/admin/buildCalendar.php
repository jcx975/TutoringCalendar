<?php
///////////////////////// Reads the CSV and makes the table /////////////
	// Makes the array for all events
	$events = array (array(),array(),array(),array(),array(),array(),array());
	
	// Reads the CSV file containing all events
	$csvFileName = "calendarData.csv";
	$csvFile = fopen($csvFileName, "r");
	if(!$csvFile)
	{
		die("Unable to open $csvFileName");
	}
	
	// Assigns the arrays of each line to the correct day
	while(!feof($csvFile))
	{
		$line = fgets($csvFile);
		$array = explode(";",$line);
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
	fclose($csvFile);
	
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
	
	// Sorts the events array
	for($i=0;$i<count($events);$i++)
	{
		usort($events[$i],"compareStart");
	}
	
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
		for($ii=0;$ii<count($events[$i]);$ii++)
		{
			// Checks the day of each array of the current day in a switch
			switch ($events[$i][$ii][0])
			{
				// Creates a div element with the start and end time displayed for each event
				case "Sunday":
					$sunString .= "<div>Start Time: " . $events[$i][$ii][1]
						. $events[$i][$ii][2]
						. "<br>End Time: " . $events[$i][$ii][3]
						. $events[$i][$ii][4] . "</div><hr>";
					break;
				case "Monday":
					$monString .= "<div>Start Time: " . $events[$i][$ii][1]
						. $events[$i][$ii][2]
						. "<br>End Time: " . $events[$i][$ii][3]
						. $events[$i][$ii][4] . "</div><hr>";
					break;
				case "Tuesday":
					$tueString .= "<div>Start Time: " . $events[$i][$ii][1]
						. $events[$i][$ii][2]
						. "<br>End Time: " . $events[$i][$ii][3]
						. $events[$i][$ii][4] . "</div><hr>";
					break;
				case "Wednesday":
					$wedString .= "<div>Start Time: " . $events[$i][$ii][1]
						. $events[$i][$ii][2]
						. "<br>End Time: " . $events[$i][$ii][3]
						. $events[$i][$ii][4] . "</div><hr>";
					break;
				case "Thursday":
					$thuString .= "<div>Start Time: " . $events[$i][$ii][1]
						. $events[$i][$ii][2]
						. "<br>End Time: " . $events[$i][$ii][3]
						. $events[$i][$ii][4] . "</div><hr>";
					break;
				case "Friday":
					$friString .= "<div>Start Time: " . $events[$i][$ii][1]
						. $events[$i][$ii][2]
						. "<br>End Time: " . $events[$i][$ii][3]
						. $events[$i][$ii][4] . "</div><hr>";
					break;
				case "Saturday":
					$satString .= "<div>Start Time: " . $events[$i][$ii][1]
						. $events[$i][$ii][2]
						. "<br>End Time: " . $events[$i][$ii][3]
						. $events[$i][$ii][4] . "</div><hr>";
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
	
	echo "Preformating and style<hr><br>" . $calendar;
	
////////////////////// Creates the PHP page string /////////////////
	
	// Creates a string to write to file
	$tutoringString = "";
	
	// Adds the includes and the calendar
	$tutoringString .= "<?php $" . "path = '../../../'; ?>";
	$tutoringString .= "<?php include $" . "path . 'head1.html'; ?>";
	$tutoringString .= "<?php include $" . "path . 'head2.php'; ?>";
	$tutoringString .= $calendar;
	$tutoringString .= "<?php include $" . "path . 'footer.php'; ?>";
	$tutoringString .= "</body></html>";
	
////////////////////// Writes the PHP page string to a PHP file ///////////

	// Creates and opens the file "tutoring.php"
	$tutoringFileName = "tutoring.php";
	$tutoringFile = fopen($tutoringFileName,"w");
	if(!$tutoringFile)
	{
		die("Unable to write to file $tutoringFileName");
	}
	
	// Writes the tutoringString to the file making the PHP page
	fwrite($tutoringFile,$tutoringString);
	// Closes the tutoringFile
	fclose($tutoringFile);
?>

<a href='tutoring.php'>Tutoring Schedule</a>