<?php
	//
	// Reads the contents of the temporary tutoring page file and writes it to the finale tutoring page file
	// while also reading the contents of temporary csv file and writing to the final csv file.
	// This allows the admin to work with a replica of the tutoring page without actually changing the official
	// tutoring page or csv file. Additionally, this allows for a preview of the what the tutoring page will be
	// and ensure the official tutoring page will be exactly equal to the preview.
	//
	
	///////////////////////// Gets temp CSV contents /////////////////////////
	
	// Opens the temp CSV file containing all events
	$tempcsvFileName = "tempTutoringEvents.csv";
	$tempcsvFile = fopen($tempcsvFileName, "r");
	if(!$tempcsvFile)
	{
		die("Unable to open $tempcsvFileName");
	}
	
	// Reads the contents of $tempcsvFile to a string
	$tempcsvFileContents = fread($tempcsvFile,filesize($tempcsvFileName));
	
	// Closes tempcsvFile
	fclose($tempcsvFile);
	
	///////////////////////// Saves temp CSV contents to official CSV /////////////////////////
	
	// Opens the official CSV file to contain all events
	$csvFileName = "tutoringEvents.csv";
	$csvFile = fopen($csvFileName, "w");
	if(!$csvFile)
	{
		die("Unable to open $csvFileName");
	}
	
	// Writes the tempcsvFileContents to the official CSV file
	fwrite($csvFile,$tempcsvFileContents);
	
	// Closes csvFile
	fclose($csvFile);
	
	///////////////////////// Gets temp tutoring page contents /////////////////////////
	
	// Opens the file tempTurtoing.php
	$tempTutoringFileName = "tempTutoring.php";
	$tempTutoringFile = fopen($tempTutoringFileName,"r");
	if(!$tempTutoringFile)
	{
		die("Unable to open file $tempTutoringFile");
	}
	
	// Reads the contents of $tempTutoring.php to a string
	$tempTutoringContents = fread($tempTutoringFile,filesize($tempTutoringFileName));
	
	// Closes tempTutoringFile
	fclose($tempTutoringFile);
	
	///////////////////////// Saves temp tutoring page contents to official tutoring page /////////////////////////
	
	// Opens the file tutoring.php
	$tutoringFileName = "tutoring.php";
	$tutoringFile = fopen($tutoringFileName,"w");
	if(!$tutoringFile)
	{
		die("Unable to write to file $tutoringFileName");
	}
	
	// Writes the tempTutoringString to the file making the PHP page
	fwrite($tutoringFile,$tempTutoringContents);
	
	// Closes tutoringFile
	fclose($tutoringFile);
	
	///////////////////////// Navigational links /////////////////////////
	
	// Creates a navigational link to the tutoring.php page	
	echo "<p>Tutoring page has been finalized</p><br>"
		. "<a href='tutoring.php'>View Tutoring Page</a>";
	
?>
