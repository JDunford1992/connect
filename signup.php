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
				<div class='content'>
				<h1 class = "fun"> Sign Up!  </h1>
					<div class = 'square'>
					
					<h2 class = 'h2form' > It's Quick and Free! </h2>
						<form method="post" action="#">
							
								<div class = 'inputs'><label>First Name </labeL><input type="text" name="fname"/></div>
								<div class = 'inputs'><label>Last Name</labeL><input type="text" name="lname"/></div>
								<div class = 'inputs'>
								<label>Gender</label>
									<input type="radio" name="male" value='1' /> Male
									<input type="radio" name="female" value='2' /> Female 
								</div>
								<div class = 'inputs'><label>Phone</labeL><input type="text" name="phone"/></div>
								<div class = 'inputs'><label>Email </labeL><input type="text" name="email"/></div>
								<div class = 'inputs'><label>Confirm Email </labeL><input type="text" name="confemail"/></div>
								<div class = 'inputs'><label>Password </labeL><input type="password" name="email"/></div>
								
								<div class = 'inputs'><label><input type="submit" class = 'sub' name="submit" value="Sign Up"/></labeL></div>
								</div>
							<div class = 'square'>
								<h2 class = 'h2form' > I am interested in: </h2>
								<div id = "checkbox">
								<ul>
									<li><input class = 'check' type="checkbox" name="1" checked="checked"/>Accesories</li>
									<li><input class = 'check' type="checkbox" name="2" checked="checked"/>Bags</li>
									<li><input class = 'check'  type="checkbox" name="3" checked="checked"/>Caps & Hats</li>
									<li><input class = 'check' type="checkbox" name="4" checked="checked"/>Hoodies & Sweatshirts</li>
									<li><input class = 'check' type="checkbox" name="5" checked="checked"/>Jackets & Coats</li>
									<li><input class = 'check' type="checkbox" name="6" checked="checked"/>Jeans</li>
									<li><input class = 'check' type="checkbox" name="7" checked="checked"/>Jewellery</li>
									<li><input class = 'check' type="checkbox" name="8" checked="checked"/>Jumpers & Cardigans</li>
									<li><input class = 'check' type="checkbox" name="9" checked="checked"/>Leather Jackets</li>
									<li><input class = 'check' type="checkbox" name="10" checked="checked"/>Long Sleeve T-Shirts</li>
									<li><input class = 'check' type="checkbox" name="11" checked="checked"/>Onesie</li>
									
								</ul>
								<ul>
									<li><input class = 'check' type="checkbox" name="12" checked="checked"/>Polo Shirts</li>
									<li><input class = 'check' type="checkbox" name="13" checked="checked"/>Shirts</li>
									<li><input class = 'check' type="checkbox" name="14" checked="checked"/>Shoes, Boots & Trainers</li>
									<li><input class = 'check' type="checkbox" name="15" checked="checked"/>Shorts</li>
									<li><input class = 'check' type="checkbox" name="16" checked="checked"/>Suits & Blazers</li>
									<li><input class = 'check' type="checkbox" name="17" checked="checked"/>Sunglasses</li>
									<li><input class = 'check' type="checkbox" name="18" checked="checked"/>Swimwear</li>
									<li><input class = 'check' type="checkbox" name="19" checked="checked"/>Pants & Chinos</li>
									<li><input class = 'check' type="checkbox" name="20" checked="checked"/>T-Shirts & Singlets</li>
									<li><input class = 'check' type="checkbox" name="21" checked="checked"/>Underwear & Socks</li>
									<li><input class = 'check' type="checkbox" name="22" checked="checked"/>Watches</li>
								</ul>
							</div>	
							</div>
								
						</form>
						
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
