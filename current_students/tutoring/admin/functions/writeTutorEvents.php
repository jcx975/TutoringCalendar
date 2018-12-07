<?php
	//
	// Takes arrays of event data and turns it into event arrays and saves it to a tutor file
	//
	
	if(!function_exists("writeTutorEvents"))
	{
		function writeTutorEvents($day,$start,$startIncrement,$startMod,$end,$endIncrement,$endMod,$location,$class,$firstName,$lastName,$email)
		{
			// String to contain the events to write to the file
			$events = "";
			
			// Saves each line of events with delimiters and new line characters
			for($i=0;$i<count($day);$i++)
			{
				$events .= $day[$i] . ";" . $start[$i] . ";" . $startIncrement[$i] . ";"
					. $startMod[$i] . ";" . $end[$i] . ";" . $endIncrement[$i] . ";"
					. $endMod[$i] . ";" . $location[$i] . ";" . $class[$i] . ";"
					. $firstName . ";" . $lastName . ";" . $email . "\n";
			}
			
			// Attempts to open file
			$fileName = "files/" . $firstName . $lastName . ".csv";
			$file = fopen($fileName,"w");
			if(!$file)
			{
				die("Unable to open $fileName");
			}
			
			// Writes the events to the file
			fwrite($file,$events);
			
			// Closes the file
			fclose($file);
		}
	}
?>
