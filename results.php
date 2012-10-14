<?php
session_start();

if (isset($_SESSION['nm']) ) {

}
else {
	header("location: login.php");
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
			<div class="nav">
				<a class="vote" href="vote.php"><span>Vote</span></a>
				<a class="results active" href="results.php"><span>Results</span></a>
				<div class="arrow-top"></div>
				<a class="log" href="login.php?out=yes"><span>LogOut</span></a>
			</div>	
			<div id="result"></div>
		</div>
	</div>
	
<script>
</script>

</body>
</html>