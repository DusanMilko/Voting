<?php
session_start();
if ( $_GET['status'] == "loggedout" ) {
	session_destroy();
}
else{
	if (isset($_SESSION['nm']) ) {
	header("location: login.php");
	}
	else {}
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

<div id="login_cont" class="votep">
	<h1>TOONTOWN VOTING</h1>
	
	<div class="cand ca">
		<a href="profile.php?id=3">
			<div class="canname">Mickey Mouse</div>
			<div class="canimg">
				<img src="imgs/mickey.png" /><br />
			</div>
		</a>
	</div>
	<div class="cand cb">
		<a href="profile.php?id=1">
			<div class="canname">Bugs Bunny</div>
			<div class="canimg">
				<img src="imgs/bugs.png" /><br />
			</div>
		</a>
	</div>
	<div class="cand cc">
		<a href="profile.php?id=2">
			<div class="canname">Pluto</div>
			<div class="canimg">
				<img src="imgs/mickey.png" /><br />
			</div>
		</a>
	</div>
	
	<div class="nav">
		<a class="vote active" href="vote.php"><span>Vote</span></a>
		<a class="results" href="results.php"><span>Results</span></a>
		<div class="arrow-top"></div>
		<div class="arrow-bottom"><p>derp</p></div>
	</div>	
</div>

<script>	
$(document).ready(function(){
	var newh = Math.ceil(($(window).height() - 135)/3);
	if( newh > 200 ){ newh = 200; }
	$('.cand').height(newh);
	var newhimg = newh-40;
	if( newhimg > 100 ){ newhimg = 100; }
	$('.canimg').height(newhimg);
});
$(window).resize(function() {
	var newh = Math.ceil(($(window).height() - 135)/3);
	if( newh > 200 ){ newh = 200; }
	$('.cand').height(newh);
	var newhimg = newh-40;
	if( newhimg > 100 ){ newhimg = 100; }
	$('.canimg').height(newhimg);
});
</script>
	
</body>
</html>