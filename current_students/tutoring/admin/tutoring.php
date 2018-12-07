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
            <h2>Tutoring </h2>
        </div>
    </div>

<div class="row"><img src="<?=$path?>/img/line.svg"></div>

	<div class="row schedule purple-background round full-width">
		<h2 class="white">Schedule</h2>
<?php
	include "schedule.html";
?>
	</div>

<div class="row"><img src="<?=$path?>/img/line.svg"></div>

<?php
    include $path."footer.php";
?>
