<?php session_start(); ?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <?php include('title.php'); ?>

	<link rel="stylesheet" href="template.css" type="text/css" />
</head>

<body>
	<div id="wrapper">

		<div id="nav">
			<?php include('menu.php'); ?>
		</div>

		<div id="login">
			<?php if (!isset($_SESSION['username']))
			{
				include('toplog2.php');
			}
			else{include('toplog.php'); }
			?>
		</div>

		<div id="banner">
			<?php include('sitetitle.php'); ?>
		</div>

		<div id="main">
			<h1>Welcome to the Expedition Overview Alpha Tool</h1>
			<p id="home">- This is an RMIT Student Project for Web/Internet Projects (Sem-1 2013) -</p>

			<h3>
				<a href="resourceComp.php"><img src="images/homeimage1.png" alt="homeStats1"/></a>
				<a href="resourceComp.php"><img src="images/homeimage2.png" alt="homeStats2"/></a>
				<a href="resourceComp.php"><img src="images/homeimage3.png" alt="homeStats3"/></a>
			</h3>

			<p id="homeDesc">- Select An Image to View Data or Browse though the Navigation Tabs. -</p>

			<h3><i>-Comments Created By Jasio Dunford</i></h3>
		</div>

		<div id="footer">

			<div id="validate">
				<a href="http://validator.w3.org/check?uri=referer">
					<img src="http://www.w3.org/Icons/valid-xhtml10" 
					alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a>

					<a href="http://jigsaw.w3.org/css-validator/check/referer">
						<img style="border:0;width:88px;height:31px" 
						src="http://jigsaw.w3.org/css-validator/images/vcss"
						alt="Valid CSS!" /></a>
					</div>

					<?php include('footer.php'); ?>
				</div>
			</div>
		</body>
	</html>
