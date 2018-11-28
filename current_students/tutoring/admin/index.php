
<?php
    include "./functions/readTutors.php";
    include "./functions/buildTutoringSchedule.php";
    include "./functions/buildTutorBlock.php";
    $tutors = readTutors( "./files/tutors.csv" );
    $str = "";
    for ( $i = 0; $i < count( $tutors ); $i++ )
    {
        $str .= buildTutorBlock( $tutors[ $i ], "./files/" );
    }
?>

<?php
    $path = "../../../";
    include $path."head1.html";    
?>
	<link rel="stylesheet" type="text/css" href="../css/tableStyles.css">
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

    <div class="row full-width purple-background round">
        <a href="./editTutors.php" class="button tut-add-button float-right">Add tutor</a>
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