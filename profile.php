<?php
session_start();
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
		<h1>TOONTOWN VOTING</h1>
		
		<div class="profile">
			<img src="<?php echo $imge;?>" />
			<div class="pname"><?php echo $name;?></div>
			<div class="desc"><?php echo $descri;?></div>
			<a href="">Cast Vote</a>
		</div>
		
		<div class="nav">
			<a class="vote active" href="vote.php"><span>Vote</span></a>
			<a class="results" href="results.php"><span>Results</span></a>
			<div class="arrow-top"></div>
		</div>	
		
	</div> 

	<?php endwhile; ?>

<script>
</script>
	
</body>
</html>