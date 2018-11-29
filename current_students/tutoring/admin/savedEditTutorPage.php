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
	// This page is the same as the normal editTutorPage except it is updated with user entered
	// information and updates all files as needed.
	//
	
	// Includes all necessary functions
	include "functions/savedEditTutorSubmission.php";
	include "functions/buildEditTutorPage.php";
	
	// Updates the file information with saved information
	$postResult = savedEditTutorSubmission();
	
	// Gets the editTutorPage contents
	$contents = buildEditTutorPage("files/");
	
	// Displays the page
	echo $contents;
?>
