<?php
	//////////////////////////////////////////////////////////////
	//	Creates a calendar string based on an events array
	//////////////////////////////////////////////////////////////

	function buildCalendar($events)
	{
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
			
		return $calendar;
	}
?>
