<?php
session_start();

if (isset($_SESSION['nm']) ) {

}
else {
	header("location: login.php");
}

$id = intval(stripcslashes($_GET['id']));

$mysql = new mysqli('internal-db.s93477.gridserver.com','db93477_bot','troll1337','db93477_panther') or die('Error connecting to database');
$stmt = $mysql->prepare('SELECT name, img, descr FROM election WHERE id='.$id.'') or die("Problem with Query");
$stmt->execute();
$stmt->bind_result( $name, $imge, $descri );
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
	
	<?php while( $row = $stmt->fetch()) : ?>
	
	<div id="login_cont" class="prof">
		<a class="tit" href="vote.php"><h1>TOONTOWN VOTING</h1></a>
		
		<div class="candpof">
			<div class="profile">
				<img src="<?php echo $imge;?>" />
				<div class="pname"><?php echo $name;?></div>
				
				
				<?php $tempu = $_SESSION['nm'];
				$mysqlt = new mysqli('internal-db.s93477.gridserver.com','db93477_bot','troll1337','db93477_panther') or die('Error connecting to database');
				$stmtt = $mysqlt->prepare('SELECT submit FROM voterid WHERE vid='.$tempu.'') or die("Problem with Query");
				$stmtt->execute();
				$stmtt->bind_result( $casted );
				
				while( $row = $stmtt->fetch()) :
				
					$checkcast = intval($casted);
				
				endwhile;
				
				if( $checkcast == 1 ){
					$mysqltt = new mysqli('internal-db.s93477.gridserver.com','db93477_bot','troll1337','db93477_panther') or die('Error connecting to database');
					$stmttt = $mysqltt->prepare('SELECT votes FROM election WHERE id='.$id.'') or die("Problem with Query");
					$stmttt->execute();
					$stmttt->bind_result( $votes );
					
					while( $row = $stmttt->fetch()) :
					
						echo '<div class="pool">This Candidate has '.$votes.' Votes</div>';
					
					endwhile;
				}
				?>
				
				
				<div class="desc"><?php echo $descri;?></div>
				<a class="button orange" href="">Vote For <?php echo $name;?></a>
			</div>
			
			<div class="nav">
				<a class="vote" href="vote.php"><span>Vote</span></a>
				<a class="results" href="results.php"><span>Results</span></a>
				<div class="arrow-top"></div>
				<a class="log" href="login.php?out=yes"><span>LogOut</span></a>
			</div>	
			<div id="result"></div>
		</div>
	</div> 

	<?php endwhile; ?>

<script>
$(document).ready(function(){
	var newh = Math.ceil(($(window).height() - 68));
	$('.candpof').height(newh);
	
	//Ajax
	$.ajaxSetup ({  
        cache: false  
    });  
    var ajax_load = "<img class='hid loader' src='imgs/ajax-loader.gif' alt='loading...' />"; 
	$(".profile a").click(function(){
    	var loadUrl = "castvote.php?cand=<?php echo $id;?>&user=<?php echo $_SESSION['nm'];?>";
        $("#result").html(ajax_load).load(loadUrl); 
        return false;
    });
});
$(window).resize(function() {
	var newh = Math.ceil(($(window).height() - 68));
	$('.candpof').height(newh);
});
</script>
	
</body>
</html>