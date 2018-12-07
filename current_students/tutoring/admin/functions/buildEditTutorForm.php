<?php
	//
	// Takes a tutor array and a boolean on whether they are a new tutor and returns a full edit tutor form
	// The form includes a section for the name, a section for each day of the week, and filled in event blocks
	// for any events the tutor already has on file
	//
	
	if(!function_exists("buildEditTutorForm"))
	{
		function buildEditTutorForm($tutor,$newTutor)
		{
			// Includes all necessary functions
			include "readEvents.php";
			include "filledEventForm.php";
			
			// Array of the days of the week
			$dayOfTheWeek = array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
			
			// String with the discard changes, delete tutor, and save changes form
			$editTutorForm = "<div class='row'><form id='discard' action='index.php' method='POST'></form>"
				. "<form id='save' action='editingTutor.php' method='POST'></form><form id='delete' action='deletingTutor.php' method='POST'></form>";
			
			// Adds the hidden values for the three forms
			$editTutorForm .= "<input type='hidden' form='save' name='firstNameOld' value='" . $tutor[0] . "'>"
				. "<input type='hidden' form='save' name='lastNameOld' value='" . $tutor[1] . "'>"
				. "<input type='hidden' form='save' name='emailOld' value='" . $tutor[2] . "'>"
				. "<input type='hidden' form='save' name='newTutor' value='" . $newTutor . "'>"
				. "<input type='hidden' form='delete' name='firstNameDelete' value='" . $tutor[0] . "'>"
				. "<input type='hidden' form='delete' name='lastNameDelete' value='" . $tutor[1] . "'>";
			
			// Adds the submit buttons for the three forms at the top
			$editTutorForm .= "<input class='button tut-add-button float-left' type='submit' form='discard' value='Cancel'>&nbsp"
				. "<input class='button tut-add-button float-left' type='submit' form='save' value='Save Changes'>&nbsp"
				. "<input class='button tut-add-button float-left' type='submit' form='delete' value='Delete Tutor'><hr>";
			
			// If this is a new tutor it makes an empty edit tutor page
			if($newTutor)
			{
				// Starts the form with a section for the tutors first and last name
				$editTutorForm .= "<h3>Name</h3>"
					. "<div class='small-6 columns'>First<input type='text' form='save' name='firstName' placeholder='john' required></div>"
					. "<div class='small-6 columns'>Last<input type='text' form='save' name='lastName' placeholder='smith' required></div>"
					. "<div class='small-10 columns'>Email<input type='text' form='save' name='email' placeholder='example@email.com' required></div><hr>";
				
				// Adds sections for each day of the week with a button to add an event form
				for($i=0;$i<count($dayOfTheWeek);$i++)
				{
					$editTutorForm .= "<div id='" . $dayOfTheWeek[$i] . "'><h3>" 
						. $dayOfTheWeek[$i] . "</h3><button type='button' class='button tut-addevent-button'>Add Event</button><br></div><hr>";
				}
			}
			
			// If this is an existing tutor it auto fills the form with all current events
			else
			{
				// Starts the form with a section for the tutors first and last name
				$editTutorForm .= "<h3>Name</h3>"
					. "<div class='small-6 columns'>First<input type='text' form='save' name='firstName' placeholder='john' value='" . $tutor[0] . "' required></div>"
					. "<div class='small-6 columns'>Last<input type='text' form='save' name='lastName' placeholder='smith' value='" . $tutor[1] . "' required></div>"
					. "<div class='small-10 columns'>Email<input type='text' form='save' name='email' placeholder='example@email.com' value='" . $tutor[2] . "'required></div><hr>";
					
				// Makes the file name
				$fileName = "files/" . $tutor[0] . $tutor[1] . ".csv";
				
				// Gets the necessary variables from the included functions
				$events = readEvents($fileName);
				
				// Adds sections for each day of the week with a button to add an event form
				for($i=0;$i<count($dayOfTheWeek);$i++)
				{
					$editTutorForm .= "<div id='" . $dayOfTheWeek[$i] . "'><h3>" 
						. $dayOfTheWeek[$i] . "</h3><button type='button' class='button tut-addevent-button'>Add Event</button><br>";
						
					// Makes an filled form for each event
					for($ii=0;$ii<count($events[$i]);$ii++)
					{
						// NOTE TO SELF - BE SMARTER AND JUST PASS THE ARRAY ITSELF RATHER THAN EACH INDIVIDUAL PIECE
						$editTutorForm .= filledEventForm($events[$i][$ii][0],$events[$i][$ii][1],$events[$i][$ii][2],$events[$i][$ii][3],
							$events[$i][$ii][4],$events[$i][$ii][5],$events[$i][$ii][6],$events[$i][$ii][7],$events[$i][$ii][8]);
					}
					
					// Closes the div tag and makes a horizontal line
					$editTutorForm .= "</div><hr>";
				}
			}
			
			// Adds the submit buttons for the three forms at the bottom
			$editTutorForm .= "<input class='button tut-add-button float-left' type='submit' form='discard' value='Cancel'>&nbsp"
				. "<input class='button tut-add-button float-left' type='submit' form='save' value='Save Changes'>&nbsp"
				. "<input class='button tut-add-button float-left' type='submit' form='delete' value='Delete Tutor'></div>";
			
			// Returns the string of the full form
			return $editTutorForm;
		}
	}
?>
