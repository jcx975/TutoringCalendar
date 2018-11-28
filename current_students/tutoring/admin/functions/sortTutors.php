<?php
	//
	// Sorts the array of tutors by last name then first alphabetically
	//
	
	if(!function_exists("sortTutors"))
	{
		function sortTutors($x,$y)
		{
			// If the last name is the same it checks by first name
			if(strcasecmp($x[1],$y[1]) == 0)
			{
				return strcasecmp($x[0],$y[0]);
			}
			else
			{
				return strcasecmp($x[1],$y[1]);
			}
		}
	}
?>
