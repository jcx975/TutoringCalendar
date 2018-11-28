
<?php
    include "./functions/readTutors.php";
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

    <div class="row">
        <h3 id="title">Tutors</h3>
        <a href="./editTutors.php" class="button tut-add-button">Edit tutors</a>
        <div class="large-12 columns">
            <?php
                echo $str;
            ?>
            <!-- <div class="large-12 columns tutor-card">
                <h4><span class="tut-name"><?=$tutors[ $i ][ 0 ]?> <?=$tutors[ $i ][ 1 ]?></span></h4>
                <div class="columns small-8">
                <p>Times:</p>
                    <table>
                        <thead>
                            <tr>
                                <th>Start time</th>
                                <th>End time</th>
                                <th>Class</th>
                                <th>Day</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="columns small-4">
                    <button type="button" class="button tut-edit-button">Edit time</button>
                </div>
            </div> -->
        </div>
        <hr>
    </div>
    <div class="row"><img src="<?=$path?>/img/line.svg"></div>
    <div class="schedule">
    </div>
<?php
    include $path."footer.php";
?>