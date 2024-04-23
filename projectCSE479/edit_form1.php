<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
        $password= $_POST['password'];
		$confirmpassword = $_POST['confirmpassword'];
        $user_type = $_POST['user_type'];
		$sql = "UPDATE users SET name = '$name', email= '$email', password= '$password',confirmpassword = '$confirmpassword' , user_type= '$user_type'WHERE id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Register updated successfully';
		}
		
		
		else{
			$_SESSION['error'] = 'Something went wrong in updating register';
		}
	}
	else{
		$_SESSION['error'] = 'Select register to edit first';
	}

	header('location: index_user.php');

?>