
<?php
    $path = "../../../";
    include $path."head1.html";    
?>
	<link rel="stylesheet" type="text/css" href="../css/tableStyles.css">

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
            <h3>Tutors</h3>
            <button class="button">Add</button>
        </div>
        <form action="">
        <?php
            for ( $i = 0; $i < 5; $i++ )
            {
        ?>
        <div class="large-12 columns profile-card">
            <h4>Name</h4>
                <label><input type="checkbox">Test</label>
                <label><input type="checkbox">Test</label>
            </div>
            <?php
            }
            ?>
        <input type="submit">
        </form>
        <hr>
    </div>
    <div class="row"><img src="<?=$path?>/img/line.svg"></div>
<?php
    include $path."footer.php";
?>