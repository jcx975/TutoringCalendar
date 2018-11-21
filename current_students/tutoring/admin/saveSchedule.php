<?php
	// Reads the CSV file containing all events
	$csvFileName = "calendarData.csv";
	$csvFile = fopen($csvFileName, "r");
	if(!$csvFile)
	{
		die("Unable to open $csvFileName");
	}
	
	$csvFileContents = fread($csvFile,filesize($csvFileName));
	fclose($csvFile);
	
	// Creates a new line for the CSV file based upon the submission results
	$formContents = $_POST["day"] . ";" . $_POST["start"] . ";"
		. $_POST["startMod"] . ";" . $_POST["end"] . ";" . $_POST["endMod"] . "\n";
	
	// Appends the CSV contents with the formContents
	$csvFileContents .= $formContents;
	
	// Writes the appended CSV contents to the CSV file to retain
	$csvFile = fopen($csvFileName, "w");
	if(!$csvFile)
	{
		die("Unable to open $csvFileName");
	}
	
	fwrite($csvFile,$csvFileContents);
?>

<h2>You have successfully added to the tutors schedule <a href="buildCalendar.php">click to finalize</a></h2>