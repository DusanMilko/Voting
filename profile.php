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
<!--Preheat oven to 325 degrees F (165 degrees C).
In a large bowl, combine cream cheese, sugar and vanilla. Beat until smooth. Blend in eggs one at a time. Remove 1 cup of batter and spread into bottom of crust; set aside.
Add pumpkin, cinnamon, cloves and nutmeg to the remaining batter and stir gently until well blended. Carefully spread over the batter in the crust.
Bake in preheated oven for 35 to 40 minutes, or until center is almost set. Allow to cool, then refrigerate for 3 hours or overnight. Cover with whipped topping before serving.-->
<body id="body" >
	
	<?php while( $row = $stmt->fetch()) : ?>
	
	<div id="login_cont" class="prof">
		<h1>TOONTOWN VOTING</h1>
		
		<div class="profile">
			<img src="<?php echo $imge;?>" />
			<div class="pname"><?php echo $name;?></div>
			<div class="desc"><?php echo $descri;?></div>
			<p><a href="">Cast Vote</a></p>
		</div>
		
		<div class="nav">
			<a class="vote active" href="vote.php"><span>Vote</span></a>
			<a class="results" href="results.php"><span>Results</span></a><!--Works if user is registered-->
			<div class="arrow-top"></div>
		</div>	
		
	</div> 

	<?php endwhile; ?>

<script>
</script>
	
</body>
</html>