<?php
	
	include "functions/readTutors.php";
	include "functions/buildTutorBlock.php";
	
	$tutors = readTutors();
	
	$allBlocks = "";
	
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
        
    </div>
    <div class="row"><img src="<?=$path?>/img/line.svg"></div>
<?php
    include $path."footer.php";
?>