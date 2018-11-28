<?php
	//
	// Function to compare the start times of each event
	// and sort them with regards to AM vs PM
	//
	
	if(!function_exists("compareStart"))
	{
		function compareStart($x,$y)
		{	
			// Adds 12 to value of pm times
			if(trim($x[2])==trim("pm"))
			{	
				$xVal = $x[1]+12;
			}
			else
			{
				$xVal = $x[1];
			}
			
			if(trim($y[2])==trim("pm"))
			{	
				$yVal = $y[1]+12;
			}
			else
			{
				$yVal = $y[1];
			}
			
			// Evaluates if xVal is smaller than yVal
			if($xVal==$yVal)
			{
				return 0;
			}
			else if($xVal>$yVal)
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
