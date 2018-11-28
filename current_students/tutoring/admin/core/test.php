<?php
	// A testing file to test functions and site features
	
	$filePath = "../files/";
	
	include "../functions/buildAdminPage.php";
	
	$schedule = buildAdminPage($filePath);
	
	echo $schedule;
	
	
?>