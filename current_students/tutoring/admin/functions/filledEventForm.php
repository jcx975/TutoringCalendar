<?php
	//
	// Function that takes a day of the week, start time, start mod, end time, and end mod
	// as a parameter and returns a string of a form for a single event specific to that day of the week
	// with the given values prefilled in
	//
	
	if(!function_exists("filledEventForm"))
	{
		function filledEventForm($dayOfTheWeek,$start,$startMod,$end,$endMod)
		{
			// If the start time is AM then AM is preselected otherwise PM is
			if($startMod == "am")
			{
				$selectStartAmPm =
				"<option value='am' selected>AM</option>"
				. "<option value='pm'>PM</option>"
				. "</select>";
			}
			else
			{
				$selectStartAmPm =
				"<option value='am'>AM</option>"
				. "<option value='pm' selected>PM</option>"
				. "</select>";				
			}
			
			// If the end time is AM then AM is preselected otherwise PM is
			if($endMod == "am")
			{
				$selectEndAmPm =
				"<option value='am' selected>AM</option>"
				. "<option value='pm'>PM</option>"
				. "</select>";
			}
			else
			{
				$selectEndAmPm =
				"<option value='am'>AM</option>"
				. "<option value='pm' selected>PM</option>"
				. "</select>";						
			}
				
			// Creates the string of the form
			$filledForm =
				"<div class='row event-row shadow'><input type='hidden' name='day[]' value='" . $dayOfTheWeek . "'>"
				. "<div class='medium-2 columns'>Start time: <input type='number' name='start[]' min='1' max='12' value='" . $start ."' required></div>"
				. "<div class='medium-2 columns'>AM/PM<select name='startMod[]'>" . $selectStartAmPm . "</div>"
				. "<div class='medium-2 columns'>End time: <input type='number' name='end[]' min='1' max='12' value='" . $end . "' required></div>"
				. "<div class='medium-2 columns'>AM/PM<select name='endMod[]'>" . $selectEndAmPm . "</div>"
				. "<div class='medium-3 columns'>Location:<input type='text' name='location' required></div>"
				. "<div class='medium-2 columns'>Class:<input type='number' name='class' min='101' max='999' placeholder='e.g. \"234\"' required></div>"
				. "<div class='medium-10 columns'>Comments:<textarea name='comments' rows='5'></textarea></div>"
				. "<span class='tut-deleteevent-button red'>&times;</span></div>";
				
			// Returns the form string
			return $filledForm;
		}
	}
?>
