<?php
	//
	// Sorts an events array based upon the start time and end time
	//
	
	if(!function_exists("sortEvents"))
	{
		function sortEvents($x,$y)
		{
			// Includes all necessary function
			include "convertTime.php";
			
			// Converts all times to 24 hour time
			$xStart = convertTime($x[1],$x[2],$x[3]);
			$yStart = convertTime($y[1],$y[2],$y[3]);
			$xEnd = convertTime($x[4],$x[5],$x[6]);
			$yEnd = convertTime($y[4],$y[5],$y[6]);
			
			// Checks which event starts first
			if($xStart==$yStart)
			{
				// If the start times are equal then it checks end times
				if($xEnd==$yEnd)
				{
					return 0;
				}
				else if($xEnd>$yEnd)
				{
					return 1;
				}
				else
				{
					return -1;
				}
			}
			else if($xStart>$yStart)
			{
				return 1;
			}
			else
			{
				return -1;
			}
		}
	}
?>
