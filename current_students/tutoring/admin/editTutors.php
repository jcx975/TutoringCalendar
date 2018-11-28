
<?php
    include "./functions/readTutors.php";
    $tutors = readTutors( "./files/tutors.csv" );
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

    <div class="row">
        <a href="./" class="button">Go back</a>
        <h3 id="title">Edit Tutors</h3>
        <div id="tutors" class="large-12 columns">
            <form>
            <?php
                for ( $i = 0; $i < count( $tutors ); $i++ )
                {
            ?>
                <input type="text" value="<?=$tutors[ $i ][ 0 ]?> <?=$tutors[ $i ][ 1 ]?>"></input>
            <?php
                }
            ?>
        </div>
            <button class="button tut-add-button" type="button">Add tutor</button>
            <button class="button" type="submit">Submit</button>
            </form>
        <hr>
    </div>
    <div class="row"><img src="<?=$path?>/img/line.svg"></div>
<?php
    include $path."footer.php";
?>