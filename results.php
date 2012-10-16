<?php
session_start();

if (isset($_SESSION['nm']) ) {

}
else {
	//header("location: login.php");
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0" />
<title>Toontown Voting</title>
<meta name="description" content="dusan milko" />
<meta name="keywords" content="dusan milko" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<link rel="stylesheet" href="http://panicpop.com/css/screen.css" type="text/css" media="screen" />
<link rel="stylesheet" href="global.css" type="text/css" media="screen" />
<script type="text/javascript" src="http://dusanmilko.com/js/jquery-1.7.2.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css' />
</head>

<body id="body" >
	
	<div id="login_cont" class="results">
		<a class="tit" href="vote.php"><h1>TOONTOWN VOTING</h1></a>
		
		<div class="candpof">
			
			<?php
			$mysqlmi = new mysqli('internal-db.s93477.gridserver.com','db93477_bot','troll1337','db93477_panther') or die('Error connecting to database');
			$stmtmi = $mysqlmi->prepare('SELECT votes FROM election WHERE id="3"') or die("Problem with Query");
			$stmtmi->execute();
			$stmtmi->bind_result( $casted );
			while( $row = $stmtmi->fetch()) :
			
				$mivotes = $casted;
			
			endwhile;
			
			$stmtbu = $mysqlmi->prepare('SELECT votes FROM election WHERE id="1"') or die("Problem with Query");
			$stmtbu->execute();
			$stmtbu->bind_result( $casted );
			while( $row = $stmtbu->fetch()) :
			
				$buvotes = $casted;
			
			endwhile;
			
			$stmtpl = $mysqlmi->prepare('SELECT votes FROM election WHERE id="2"') or die("Problem with Query");
			$stmtpl->execute();
			$stmtpl->bind_result( $casted );
			while( $row = $stmtpl->fetch()) :
			
				$plvotes = $casted;
			
			endwhile;
			
			$dnvote = 50 - $mivotes - $buvotes - $plvotes;
			?>
			
			<div class="resultfull mi">
				<img src="imgs/mickey.png" />
				<div class="poo">
					<span style="width:<?php echo $mivotes*2;?>%;" ><?php echo $mivotes;?> Votes</span>
				</div>
			</div>
			<div class="resultfull bu">
				<img src="imgs/bugs.png" />
				<div class="poo">
					<span style="width:<?php echo $buvotes*2;?>%;" ><?php echo $buvotes;?> Votes</span>
				</div>
			</div>
			<div class="resultfull pl">
				<img src="imgs/pluto.png" />
				<div class="poo">
					<span style="width:<?php echo $plvotes*2;?>%;" ><?php echo $plvotes;?> Votes</span>
				</div>
			</div>
			<div class="resultfull el">
				
					<span><?php echo $dnvote;?>(<?php echo $dnvote*2;?>%) People Didn't Vote</span>
				
			</div>
			
			<?php
			if (isset($_SESSION['nm']) ) {
			?>
			<div class="nav">
				<a class="vote" href="vote.php"><span>Vote</span></a>
				<a class="results active" href="results.php"><span>Results</span></a>
				<div class="arrow-top"></div>
				<a class="log" href="login.php?out=yes"><span>LogOut</span></a>
			</div>	
			<div id="result"></div>
			<?php } ?>
		</div>
	</div>
	
<script>
$(document).ready(function(){
	var newh = Math.ceil(($(window).height() - 68));
	$('.candpof').height(newh);
});
$(window).resize(function() {
	var newh = Math.ceil(($(window).height() - 68));
	$('.candpof').height(newh);
});
</script>

</body>
</html>