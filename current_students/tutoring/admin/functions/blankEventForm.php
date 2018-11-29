<?php
	//
	// Function that takes a day of the week as a parameter and returns
	// a string of a form for a single event specific to that day of the week
	//
	
	if(!function_exists("blankEventForm"))
	{
		function blankEventForm($dayOfTheWeek)
		{
			// Part of the form used to select AM or PM
			$selectAmPm =
				"<option value='am'>AM</option>"
				. "<option value='pm'>PM</option>"
				. "</select>";
			
			// A String to hold the form
			$blankForm =
				"<input type='hidden' name='day[]' value='" . $dayOfTheWeek . "'>"
				. "Start time: <input type='number' name='start[]' min='1' max='12' required>"
				. "&nbsp<select name='startMod[]'>" . $selectAmPm
				. "&nbspEnd time: <input type='number' name='end[]' min='1' max='12' required>"
				. "&nbsp<select name='endMod[]'>" . $selectAmPm . "<br>";
			
			// Returns the string of the form
			return $blankForm;
		}
	}
?>
