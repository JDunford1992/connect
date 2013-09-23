<?php
	require_once('common.php');
	logoutUser();
	header('Location: index.php');
	session_destroy();
?>	
