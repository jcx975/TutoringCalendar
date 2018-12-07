<?php
	//
	// Takes all event information excluding tutor name and makes a form with the info set as defaults
	//
	
	if(!function_exists("filledEventForm"))
	{
		function filledEventForm($dayOfTheWeek,$start,$startIncrement,$startMod,$end,$endIncrement,$endMod,$location,$class)
		{
			// Sets the start AM/PM to the correct value
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
			
			// Sets the end AM/PM to the correct value
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
			
			// Sets the start minutes to the correct value
			if($startIncrement == "00")
			{
				$selectStartIncrement =
				"<option value='00' selected>00</option>"
				. "<option value='15'>15</option>"
				. "<option value='30'>30</option>"
				. "<option value='45'>45</option>"
				. "</select>";
			}
			else if($startIncrement == "15")
			{
				$selectStartIncrement =
				"<option value='00'>00</option>"
				. "<option value='15' selected>15</option>"
				. "<option value='30'>30</option>"
				. "<option value='45'>45</option>"
				. "</select>";
			}
			else if($startIncrement == "30")
			{
				$selectStartIncrement =
				"<option value='00'>00</option>"
				. "<option value='15'>15</option>"
				. "<option value='30' selected>30</option>"
				. "<option value='45'>45</option>"
				. "</select>";
			}
			else
			{
				$selectStartIncrement =
				"<option value='00'>00</option>"
				. "<option value='15'>15</option>"
				. "<option value='30'>30</option>"
				. "<option value='45' selected>45</option>"
				. "</select>";
			}
			
			// Sets the end minutes to the correct value
			if($endIncrement == "00")
			{
				$selectEndIncrement =
				"<option value='00' selected>00</option>"
				. "<option value='15'>15</option>"
				. "<option value='30'>30</option>"
				. "<option value='45'>45</option>"
				. "</select>";
			}
			else if($endIncrement == "15")
			{
				$selectEndIncrement =
				"<option value='00'>00</option>"
				. "<option value='15' selected>15</option>"
				. "<option value='30'>30</option>"
				. "<option value='45'>45</option>"
				. "</select>";
			}
			else if($endIncrement == "30")
			{
				$selectEndIncrement =
				"<option value='00'>00</option>"
				. "<option value='15'>15</option>"
				. "<option value='30' selected>30</option>"
				. "<option value='45'>45</option>"
				. "</select>";
			}
			else
			{
				$selectEndIncrement =
				"<option value='00'>00</option>"
				. "<option value='15'>15</option>"
				. "<option value='30'>30</option>"
				. "<option value='45' selected>45</option>"
				. "</select>";
			}
			
				
			// Creates the string of the form
			$filledForm =
				"<div class='row event-row shadow'><input type='hidden' form='save' name='day[]' value='" . $dayOfTheWeek . "'>"
				. "<div class='medium-2 columns'>Start Time <input type='number' form='save' name='start[]' min='1' max='12' value='" . $start . "' required></div>"
				. "<div class='medium-2 columns'>Minutes<select form='save' name='startIncrement[]'>" . $selectStartIncrement . "</div>"
				. "<div class='medium-2 columns'>AM/PM<select form='save' name='startMod[]'>" . $selectStartAmPm . "</div>"
				. "<div class='medium-2 columns'>End Time <input type='number' form='save' name='end[]' min='1' max='12' value='" . $end . "' required></div>"
				. "<div class='medium-2 columns'>Minutes<select form='save' name='endIncrement[]'>" . $selectEndIncrement . "</div>"
				. "<div class='medium-2 columns'>AM/PM<select form='save' name='endMod[]'>" . $selectEndAmPm . "</div><br>"
				. "<div class='medium-3 columns'>Location<input type='text' form='save' name='location[]' value='" . $location . "' required></div>"
				. "<div class='medium-2 columns'>Class<input type='number' form='save' name='class[]' min='101' max='999' placeholder='e.g. \"234\"' value='" . $class . "' required></div>"
				. "<span class='tut-deleteevent-button red'>&times;</span></div>";
				
			// Returns the form string
			return $filledForm;
		}
	}
?>
