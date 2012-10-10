<?php
session_start();
$nm = intval(stripcslashes($_GET['nm']));
$mysql = new mysqli('internal-db.s93477.gridserver.com','db93477_bot','troll1337','db93477_panther') or die('Error connecting to database');
$stmt = $mysql->prepare('SELECT submit FROM voterid WHERE vid='.$nm.'') or die("Problem with Query");
$stmt->execute();
$stmt->bind_result( $quan );
$on = 0;
while( $row = $stmt->fetch()) : ?>
		
<?php 
	$on = 1;
	$quan = intval($quan);
	if( $quan == 1 ){
		echo '<script>window.location.href = "result.php";</script>';
	}else if( $quan == 0 ){
		echo '<script>window.location.href = "vote.php";</script>';
	}else{
		echo "Not a Valid Voter Id";
	}
?>

<?php endwhile; ?>

<?php 
if( $on == 0 ){
	echo "<div class='response'>Not a Valid Voter Id</div>";
}
?>
