<?php
	//
	// Main admin page
	// Provides the tutoring block, full schedule, and buttons
	// to edit tutors and publish changes
	//
	
	// Starts the session to allow confirmation messages
	session_start();	

	// Includes all necessary functions
	include "functions/readTutors.php";
	include "functions/buildTutorBlock.php";
	include "functions/writeEvents.php";
	include "functions/readEvents.php";
	include "functions/buildSchedule.php";
	
	// Gets the necessary variables from the included functions
	$tutors = readTutors();
	writeEvents($tutors);
	$events = readEvents("files/events.csv");
	$schedule = buildSchedule($events);
	
	// A string to hold all the tutor blocks
	$allBlocks = "";
	
	$addTutor = "<form action='editTutor.php' method='POST'>"
		. "<input type='hidden' name='firstName' value='NEW'>"
		. "<input type='hidden' name='lastName' value='TUTOR'>"
		. "<input type='hidden' name='email' value='example@email.com'>"
		. "<input class='button tut-add-button float-right' type='submit' value='Add Tutor'></form>";
		
	$deleteAll = "<form action='deletingAll.php' method='POST'>"
		. "<input class='button tut-add-button float-right' type='submit' value='Delete All Tutors'></form>";
		
	$tutorButtons = $addTutor . $deleteAll;
	
	for($i=0;$i<count($tutors);$i++)
	{
		$allBlocks .= buildTutorBlock($tutors[$i]);
	}
?>

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
	
	// Checks if there was a confirmation message sent
	if(isset($_SESSION["confirmEditTutor"]))
	{
		echo $_SESSION["confirmEditTutor"];
		unset($_SESSION["confirmEditTutor"]);
	}
	
	if(isset($_SESSION["confirmDeleteTutor"]))
	{
		echo $_SESSION["confirmDeleteTutor"];
		unset($_SESSION["confirmDeleteTutor"]);
	}

	if(isset($_SESSION["confirmDeleteAll"]))
	{
		echo $_SESSION["confirmDeleteAll"];
		unset($_SESSION["confirmDeleteAll"]);
	}
?>

    <div class="banner row">
        <div class="large-12 columns">
            <img src="<?=$path?>/img/tutoring.png">
            <h2>Tutoring Admin Page</h2>
        </div>    
    </div>
    <div class="row"><img src="<?=$path?>/img/line.svg"></div>
    <div class="row">
        <div class="large-12 columns">
            <a href="buildTutoringPage.php" class="button tut-publish-button">Publish Changes</a>
        </div>
    </div>
    <div>
        <input class="tutor-search" type="search" placeholder="Search by name">
    </div>
    <div class="row full-width purple-background round">
		<?php
			echo $tutorButtons;
		?>    
		<h2 class="white" id="title">Tutors</h2>
        <div class="large-12 columns">
            <?php
                echo $allBlocks;
            ?>
        </div>
    </div>
    <div class="row"><img src="<?=$path?>/img/line.svg"></div>
    <div class="row schedule purple-background round full-width">
        <h2 class="white">Schedule Preview</h2>
        <?php echo $schedule; ?>
    </div>
    <div class="row"><img src="<?=$path?>/img/line.svg"></div>
<?php
    include $path."footer.php";
?>