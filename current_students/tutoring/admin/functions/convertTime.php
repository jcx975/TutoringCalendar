<?php
	//
	// Takes a time and AM or PM modifier and returns the 24 hour time equivalent
	//
	
	if(!function_exists("convertTime"))
	{
		function convertTime($time,$increment,$mod)
		{
			// Variable that will hold the converted time
			$convertedTime;
			
			// Checks if the time is AM
			if(trim($mod)==trim("am")
			{
				// If it is 12 AM then it sets the time to 24
				if($time==12)
				{
					$convertedTime = 24;
				}
				// If it is any other AM time then it stays as normal
				else
				{
					$convertedTime = $time;
				}
			}
			else
			{
				// If it is 12 PM then it stays as normal
				if($time==12)
				{
					$convertedTime = $time;
				}
				// If it is any other PM time it adds 12
				else
				{
					$convertedTime = $time + 12;
				}
			}
			
			// Adds the minutes past the hour
			if(trim($increment)==trim("15"))
			{
				$convertTime += .25;
			}
			else if(trim($increment)==trim("30"))
			{
				$convertTime += .5;
			}
			else if(trim($increment)==trim("45"))
			{
				$convertTime += .75;
			}
			
			// Returns the converted time
			return $convertedTime;
		}
	}
?>
