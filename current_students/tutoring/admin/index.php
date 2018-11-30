<?php
	// Includes all necessary functions
    include "./functions/readTutors.php";
    include "./functions/buildTutoringSchedule.php";
    include "./functions/buildTutorBlock.php";
	
	// Gets the tutors array
    $tutors = readTutors( "./files/tutors.csv" );
	
    $str = "";
    for ( $i = 0; $i < count( $tutors ); $i++ )
    {
        $str .= buildTutorBlock( $tutors[ $i ], "./files/" );
    }
	
	$editTutorString = "";
	
	$editTutorStringP1 = "<form action='editTutorPage.php' method='POST'>"
			. "<input type='hidden' name='firstName' value='";
			
	$editTutorStringP2 = "'><input type='hidden' name='lastName' value='";
			
	$editTutorStringP3 = "'><input class='button tut-add-button float-right' type='submit' value='Add tutor'></form>";
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
			$editTutorString .= $editTutorStringP1 . "New" . $editTutorStringP2 . "Tutor" . $editTutorStringP3;
			echo $editTutorString;
		?>
        <h2 class="white" id="title">Tutors</h2>
        <div class="large-12 columns">
            <?php
                echo $str;
            ?>
        </div>
    </div>
    <div class="row"><img src="<?=$path?>/img/line.svg"></div>
    <div class="row schedule purple-background round full-width">
        <h2 class="white">Schedule Preview</h2>
        <?php echo buildTutoringSchedule( "./files/" ); ?>
    </div>
    <div class="row"><img src="<?=$path?>/img/line.svg"></div>
<?php
    include $path."footer.php";
?>