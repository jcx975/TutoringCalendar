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
	// This page edits to an existing tutor are made
	//
	
	// Includes all necessary functions
	include "functions/buildEditTutorPage.php";
	
	// Builds the conents for this page
	$contents = buildEditTutorPage("files/");
	
	// Displays the page
	echo $contents;
?>
