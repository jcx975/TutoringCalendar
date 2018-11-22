<?php
	//////////////////////////////////////////////////////////////
	//	Creates a tempTutoring.php page based upon a calendar string
	//////////////////////////////////////////////////////////////
	
	function buildTempTutoringPage($calendar)
	{
		// Creates a string to write to file
		$tempTutoringString = "";
		
		// Adds the includes and the calendar
		$tempTutoringString .= "<?php $" . "path = '../../../'; ?>";
		$tempTutoringString .= "<?php include $" . "path . 'head1.html'; ?>";
		$tempTutoringString .= "<?php include $" . "path . 'head2.php'; ?>";
		$tempTutoringString .= $calendar;
		$tempTutoringString .= "<?php include $" . "path . 'footer.php'; ?>";
		$tempTutoringString .= "</body></html>";
	
		// Creates and opens the file tempTutoring.php
		$tempTutoringFileName = "tempTutoring.php";
		$tempTutoringFile = fopen($tempTutoringFileName,"w");
		if(!$tempTutoringFile)
		{
			die("Unable to open file $tutoringFileName");
		}
		
		// Writes the tempTutoringString to the file making the PHP page
		fwrite($tempTutoringFile,$tempTutoringString);
		
		// Closes the tempTutoringFile
		fclose($tempTutoringFile);
	}
?>
