<?php
	//
	// Takes an events array as an argument and returns a schedule as a string
	// Each event will display the start time, end time, location, class, and tutor name
	// Each event will be separated by a horizontal line
	//
	
	if(!function_exists("buildSchedule"))
	{
		function buildSchedule($events,$tutorSchedule = FALSE)
		{
			// Creates a string with the first half of the schedule
			$schedule = "<div class='table-container'><table>"
				. "<tr>"
				.	"<th>Sunday</th>"
				.	"<th>Monday</th>"
				.	"<th>Tuesday</th>"
				.	"<th>Wednesday</th>"
				.	"<th>Thursday</th>"
				.	"<th>Friday</th>"
				.	"<th>Saturday</th>"
				. "</tr>"
				. "<tr>";
			
			// Creates the strings for each cell in the table
			$sunString = "<td>";
			$monString = "<td>";
			$tueString = "<td>";
			$wedString = "<td>";
			$thuString = "<td>";
			$friString = "<td>";
			$satString = "<td>";
			
			// Starts on Sunday and then the all following days
			for($i=0;$i<count($events);$i++)
			{
				// Starts on the first event of the current day
				for($ii=0;$ii<count($events[$i]);$ii++)
				{
					// Turns the current event into a string
					if($tutorSchedule)
					{
						// If the schedule is for an individual tutor it will not include the tutor name in the schedule
						$tempString = "<div class='calendar-event shadow'><strong>Start Time:</strong> " . $events[$i][$ii][1]
							. ":" . $events[$i][$ii][2] . $events[$i][$ii][3]
							. "<br><strong>End Time:</strong> " . $events[$i][$ii][4] . ":" . $events[$i][$ii][5]
							. $events[$i][$ii][6] . "<br><strong>Location:</strong> " . $events[$i][$ii][7]
							. "<br><strong>Class:</strong> <span class='class-name'>" . $events[$i][$ii][8]
							. "</span></div>";
					}
					else
					{
						// If the schedule is not for an individual tutor it will include the tutor name in the schedule
						$tempString = "<div class='calendar-event shadow'><strong>Start Time:</strong> " . $events[$i][$ii][1]
							. ":" . $events[$i][$ii][2] . $events[$i][$ii][3]
							. "<br><strong>End Time:</strong> " . $events[$i][$ii][4] . ":" . $events[$i][$ii][5]
							. $events[$i][$ii][6] . "<br><strong>Location:</strong> " . $events[$i][$ii][7]
							. "<br><strong>Class:</strong> <span class='class-name'>" . $events[$i][$ii][8]
							. "</span><br><strong>Tutor:</strong> " . $events[$i][$ii][9] . " " . $events[$i][$ii][10]
							. "<br><strong>Email:</strong> <a href='mailto:" . $events[$i][$ii][11] . "?Subject=Tutoring'>" . $events[$i][$ii][11] . "</a>"
							. "</div>";
					}
					
					// Checks the day of the current event
					switch ($events[$i][$ii][0])
					{	
						// Appends the event string to the matching day string
						case "Sunday":
							$sunString .= $tempString;
							break;
						case "Monday":
							$monString .= $tempString;
							break;
						case "Tuesday":
							$tueString .= $tempString;
							break;
						case "Wednesday":
							$wedString .= $tempString;
							break;
						case "Thursday":
							$thuString .= $tempString;
							break;
						case "Friday":
							$friString .= $tempString;
							break;
						case "Saturday":
							$satString .= $tempString;
							break;
					}
				}
			}
			
			// Closes the table data tag for each day
			$sunString .= "</td>";
			$monString .= "</td>";
			$tueString .= "</td>";
			$wedString .= "</td>";
			$thuString .= "</td>";
			$friString .= "</td>";
			$satString .= "</td>";
			
			// Fills in the second row with each days string
			$schedule .= $sunString . $monString . $tueString . $wedString .
				$thuString. $friString . $satString . "</tr></table></div>";
			
			// Returns the string of the schedule
			return $schedule;
		}
	}
?>
