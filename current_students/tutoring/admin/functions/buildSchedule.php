<?php
	//
	// Function to build a schedule using a sorted events array.
	// Outputs schedule as a string of an HTML table.
	//
	
	if(!function_exists("buildSchedule"))
	{
		function buildSchedule($events)
		{
			// Creates a string with the first half of the schedule
			$schedule = "<table>
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
							$sunString .= "<div class='calendar-event'>Start Time: " . $events[$i][$ii][1]
								. $events[$i][$ii][2]
								. "<br>End Time: " . $events[$i][$ii][3]
								. $events[$i][$ii][4] . "</div><hr>";
							break;
						case "Monday":
							$monString .= "<div class='calendar-event'>Start Time: " . $events[$i][$ii][1]
								. $events[$i][$ii][2]
								. "<br>End Time: " . $events[$i][$ii][3]
								. $events[$i][$ii][4] . "</div><hr>";
							break;
						case "Tuesday":
							$tueString .= "<div class='calendar-event'>Start Time: " . $events[$i][$ii][1]
								. $events[$i][$ii][2]
								. "<br>End Time: " . $events[$i][$ii][3]
								. $events[$i][$ii][4] . "</div><hr>";
							break;
						case "Wednesday":
							$wedString .= "<div class='calendar-event'>Start Time: " . $events[$i][$ii][1]
								. $events[$i][$ii][2]
								. "<br>End Time: " . $events[$i][$ii][3]
								. $events[$i][$ii][4] . "</div><hr>";
							break;
						case "Thursday":
							$thuString .= "<div class='calendar-event'>Start Time: " . $events[$i][$ii][1]
								. $events[$i][$ii][2]
								. "<br>End Time: " . $events[$i][$ii][3]
								. $events[$i][$ii][4] . "</div><hr>";
							break;
						case "Friday":
							$friString .= "<div class='calendar-event'>Start Time: " . $events[$i][$ii][1]
								. $events[$i][$ii][2]
								. "<br>End Time: " . $events[$i][$ii][3]
								. $events[$i][$ii][4] . "</div><hr>";
							break;
						case "Saturday":
							$satString .= "<div class='calendar-event'>Start Time: " . $events[$i][$ii][1]
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
			$schedule .= $sunString . $monString . $tueString . $wedString .
				$thuString. $friString . $satString . "</tr></table>";
			
			// Returns the string of the schedule
			return $schedule;
		}
	}
?>
