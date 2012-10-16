<?php
session_start();

$uid = intval(stripcslashes($_GET['user']));
$ucan = intval(stripcslashes($_GET['cand']));
$voted = 1;

$mysqlq = new mysqli('internal-db.s93477.gridserver.com','db93477_bot','troll1337','db93477_panther') or die('Error connecting to database');
$stmtq = $mysqlq->prepare('SELECT submit FROM voterid WHERE vid='.$uid.'') or die("Problem with Query");
$stmtq->execute();
$stmtq->bind_result( $casted );

while( $row = $stmtq->fetch()) :

	$checkcast = intval($casted);

endwhile;

if( $checkcast == 0 ){

	$mysql = new mysqli('internal-db.s93477.gridserver.com','db93477_bot','troll1337','db93477_panther') or die('Error connecting to database');
	$stmt = $mysql->prepare('SELECT votes FROM election WHERE id='.$ucan.'') or die("Problem with Query");
	$stmt->execute();
	$stmt->bind_result( $votes );
	
	while( $row = $stmt->fetch()) :
	
		$newvotes = intval($votes)+1;
	
	endwhile;
	
	$mysqlo = new mysqli('internal-db.s93477.gridserver.com','db93477_bot','troll1337','db93477_panther') or die('Error connecting to database');
	$stmto = $mysqlo->prepare('UPDATE election SET votes='.$newvotes.' WHERE id='.$ucan.'') or die("Problem with Query");
	$stmto->execute();
	
	$mysqlp = new mysqli('internal-db.s93477.gridserver.com','db93477_bot','troll1337','db93477_panther') or die('Error connecting to database');
	$stmtp = $mysqlp->prepare('UPDATE voterid SET submit='.$voted.' WHERE vid='.$uid.'') or die("Problem with Query");
	$stmtp->execute();
	echo $voted;
	echo $uid;
}
else{
	echo "You Have Already Voted!";
}
?>