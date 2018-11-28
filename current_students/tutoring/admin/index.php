<?php
    $str = file_get_contents( "test.txt" );
    $names = json_decode( $str, true );
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
        <button type="button" class="button tut-add-button">Add tutor</button>
        <div class="large-12 columns">
            <?php
                for ( $i = 0; $i < count( $names ); $i++ )
                {
            ?>
            <div class="large-12 columns tutor-card">
                <h4><span class="tut-name"><?=$names[ $i ]?></span></h4>
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
                    <button type="button" class="button tut-edit-button">Edit</button>
                    <button type="button" class="alert button tut-delete-button">Delete</button>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
        <hr>
    </div>
    <div class="row"><img src="<?=$path?>/img/line.svg"></div>
<?php
    include $path."footer.php";
?>