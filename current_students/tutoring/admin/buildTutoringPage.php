<?php
    $path = "../../../";
    include $path."head1.html";
?>
	<!-- <link rel="stylesheet" type="text/css" href="../css/tableStyles.css"> -->
	<link rel="stylesheet" type="text/css" href="../css/index.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="../js/admin.js"></script>
<?php
    include $path."head2.php";
?>


<?php
	//
	// This page is a confirmation screen informing the user that the tutoring page has been successfully updated
	//

	// Includes all necessary functions
	include "functions/buildTutoringSchedule.php";

	// Gets the schedule for the tutoring page
	$tutoringPageContents = buildTutoringSchedule("files/");

	// Attempts to open the file
	$fileName = "tutoring.html";
	$file = fopen($fileName,"w");
	if(!$file)
	{
		die("Unable to open $fileName");
	}

	// Writes the contents of the tutoring page to the file
	fwrite($file,$tutoringPageContents);

	// Closes the file
	fclose($file);

	// Navigational links back to admin page or to view tutoring page
	$confirmationPage = "<div class = 'article'><p 'updated'>You have successfully updated the tutoring page.</a><br>"
		. "<div class = 'return-and-view-page'><a href='index.php'>Return</a><br><a href='tutoringPage.php'>View Tutoring Page</a></div></div>";

	// Displays the navigations links
	echo $confirmationPage;

?>
