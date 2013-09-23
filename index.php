<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>PickMe</title>
	<meta http-equiv= "Content-Type" content = "text/html;charset=iso-8859-1" />
	<link type="text/css" rel="stylesheet" href="style.css" />
	<link type="text/css" rel="stylesheet" href="reset.css" />
	<!--[if !IE 7]>
		<style type="text/css">
			#page-layout { height:100%;}
		</style>
	<![endif]-->
</head>
<body>
	<div id="page-layout">
		
		<div id="nav-wrap">
			<div id="nav">
				<div id="member">
					<p>&nbsp;</p>
				</div>
				<div id="login">
					<p>
						<img src="images/leaf-icon.png" alt="" />&nbsp;

						<?php if (isset($_SESSION['username']))
						{
							include('login_n1.php');
						}
						else{include('login_n2.php');}
						?>
					</p>
				</div>
			</div>	
		</div>
		
		<div id="header-wrap">
			<div id="header">
				<div id="logo">
					<a href="#"><img src="images/logo.png" alt="" /></a>
				</div>
				<div id="searchbar">
				&nbsp;
				</div>	
			</div>
		</div>
		
		<div id="content-wrap">	
			<div id="content-head">
			</div>
			<!--Start page content-->
				<div class = 'content'>
					<div class ='loginform'>
					
						<h2 class = 'h2form'> What do you want to do? </h2>
							<div>
							<a href="#" class = 'butn'> I want to Buy </a> 
							</div>
							<br>
							<br>
							<div>
							<a href="#" class = 'butn'> I want to Sell </a> </div>
							
						</form>
						<br>
						
					</div>
			</div>
			<!--End page content-->
			<div id="content-foot">
			</div>
		</div>
		
		<div id="foot-wrap">
			<div id="footer-top">
			</div>
			<div id="foot-wrap2">
				<div id="footer">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">About Us</a></li>
						<li><a href="#">The Process</a></li>
						<li><a href="#">FAQs</a></li>
						<li><a href="#">Contact Us</a></li>
					</ul>
					<p>PickMe &copy;2013.</p>
				</div>
			</div>	
		</div>
		
	</div>
</body>
</html>
