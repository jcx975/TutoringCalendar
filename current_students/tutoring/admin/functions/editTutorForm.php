<?php
	//
	// Function that returns a full form for the edit tutor page.
	// The form will come with any current events pre-filled in.
	//
	
	if(!function_exists("editTutorForm"))
	{
		function editTutorForm($tutor,$path,$newTutor)
		{
			// Includes all necessary functions
			include "readTutorEvents.php";
			include "blankEventForm.php";
			include "filledEventForm.php";
			
			// Array of days of the week
			$dayOfTheWeek = array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
			
			// Makes the file name
			$fileName = $path . $tutor[0] . trim($tutor[1]) . ".csv";
			
			// Makes the start of the form
			$tutorForm = "<form action='savedEditTutorPage.php' method='POST'>"
				. "<input type='hidden' name='oldFirstName' value='" . $tutor[0] . "'>"
				. "<input type='hidden' name='oldLastName' value='" . trim($tutor[1]) . "'>";

			$tutorForm .= "<div class='row'>";
				
			if(!$newTutor)
			{
				$tutorForm .= "<h3>Name</h3>"
					. "<div class='small-6 columns'>First<input type='text' name='firstName' value='" . $tutor[0] . "' required></div>"					
					. "<div class='small-6 columns'>Last<input type='text' name='lastName' value='" . trim($tutor[1]) . "' required></div><hr>";
				
				// Gets the events of the tutor
				$events = readTutorEvents($fileName);
				
				for($i=0;$i<count($events);$i++)
				{
					$tutorForm .= "<div id='" . $dayOfTheWeek[$i] . "'><h3>" . $dayOfTheWeek[$i]
						. "</h3><button type='button' class='button tut-addevent-button'>Add Event</button><br>";
					
					for($ii=0;$ii<count($events[$i]);$ii++)
					{
						$tutorForm .= filledEventForm($events[$i][$ii][0],$events[$i][$ii][1],
							$events[$i][$ii][2],$events[$i][$ii][3],$events[$i][$ii][4]);
					}
					
					$tutorForm .= "</div><hr>";
				}
			}
			else
			{	
				$tutorForm .= "<h3>Name</h3>"
					. "<div class='small-6 columns'>First<input type='text' name='firstName' required></div>"
					. "<div class='small-6 columns'>Last<input type='text' name='lastName' required></div><hr>";
				
				for($i=0;$i<count($dayOfTheWeek);$i++)
				{
					$tutorForm .= "<div class='" . $dayOfTheWeek[$i] . "'><h3>" 
						. $dayOfTheWeek[$i] . "</h3><button type='button' class='button tut-addevent-button'>Add Event</button><br></div><hr>";
				}
			}
			
			$tutorForm .= "<input type='submit' value='Save Changes'><a href='index.php'>Return</a></form>";
			$tutorForm .= "</div>";
			
			return $tutorForm;
		}
	}
?>