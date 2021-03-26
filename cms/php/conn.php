<?php
	$conn = mysqli_connect('localhost', 'root', '', 'bdClima')or die(mysqli_connect_error());
	mysqli_set_charset($conn, 'utf8');
	session_start();
?>