<?php
	session_start();
	echo "Dear ".$_SESSION['name'].",<br/>";
	echo "You have signed at ".$_SESSION['time'].",<br/>";
	echo "Your IP address is ".$_SESSION['ip'].",<br/>";
	echo "Your encrypted password is ".$_SESSION['psw'].".<br/>";
?>