<?php session_start(); ?>

<?php
require_once('common.php');

$error = '0';

if (isset($_POST['submitBtn'])){
	// Get user input
	$user = isset($_POST['user']) ? $_POST['user'] : '';
	$pass1 = isset($_POST['password1']) ? $_POST['password1'] : '';
	
    
	// Try to login the user
	$error = loginUser($user,$pass1);
}
?>

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
	<?php
	require_once('db.php');
	if(!$dbconn = mysql_connect(DB_HOST, DB_USER, DB_PW)) 
	{
		echo 'Could not connect to mysql on ' . DB_HOST . '\n';
		exit; 
	}
	if(!mysql_select_db(DB_NAME, $dbconn)) 
	{
		echo 'Could not user database ' . DB_NAME . '\n'; echo mysql_error() . '\n';
		exit;
	}
	mysql_select_db('winestore');
	?>
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
						<?php if ($error != '') {?>

						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
							<div class = 'inputs'><label>Email </labeL><input class="text" name="user" type="text"  /></div>
							<div  class = 'inputs'><label>Password </labeL><input class="text" name="password1" type="password" /></div>
							<div class = 'inputs'><label><input class="text" type="submit" name="submitBtn" value="Login" /></labeL></div>
						</form>
					</div>

					<?php 
				}
				if (isset($_POST['submitBtn'])){
			?>

			<h2>Login result:</h2>

			<?php
			if ($error == '') {
				$_SESSION['username'] = $user;
				echo "<p>Welcome <b>$user!</b></br>You have successfully logged in!<br/><br/></p>";
				echo '<li><a href="index.php">Home</a></li>';
			}
			else echo "<p><b>**$error</p></b>";
			?>
			<?php
		}
		?>

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
