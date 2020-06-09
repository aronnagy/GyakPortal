<?php
	session_start();

	$servername = "localhost";
	$username = "gyakportal2020";
	$password = "1doki9";
	$db = "gyakportal2020";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $db);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	echo "Connected successfully";

	if(isset($GET['exit']))
	{
		session_destroy();
		unset($_SESSION);
	}
?>