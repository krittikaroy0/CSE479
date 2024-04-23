<?php
	//$conn = new mysqli('localhost', 'root', '', 'onlinehealthcare_db');
	$conn = new mysqli('localhost', 'root', '', 'facultyofficehour_db');
	if($conn->connect_error){
	   die("Connection failed: " . $conn->connect_error);
	}
	
?>