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
	// The page the edit tutor functions are on
	// The page allows the user to edit the name, events,
	// and view the schedule of a single tutor
	//
	
	// Includes all necessary functions
	include "functions/buildEditTutorPage.php";
	
	// Gets the necessary variables from the included functions
	$contents = buildEditTutorPage();
	
	// Displays the page contents
	echo $contents;
?>
