<?php
	session_start();
	$_SESSION["admin"]=true;
	if($_SESSION["admin"])
		echo "Session 'admin' is set";
?>