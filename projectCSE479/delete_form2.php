<?php
	session_start();
	include_once('connection.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM appointments   WHERE id = '".$_GET['id']."'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Register deleted successfully';
		}

		else{
			$_SESSION['error'] = 'Something went wrong in deleting Register';
		}
	}
	else{
		$_SESSION['error'] = 'Select Register to delete first';
	}

	header('location: index_user1.php');
?>