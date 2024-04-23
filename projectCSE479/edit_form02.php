<?php
	session_start();
	include_once('connection.php');
	if(isset($_POST['edit'])){
        $id = $_POST['id'];
		$student_name = $_POST['student_name'];
		$student_email= $_POST['student_email'];
        $faculty_name = $_POST['faculty_name'];
		$course_code = $_POST['course_code'];
        $appo_date= $_POST['appo_date'];
		$appo_slot = $_POST['appo_slot'];
        $user_id = $_POST['user_id'];
        
		$sql = "UPDATE appointments SET student_name = '$student_name', student_email= '$student_email', faculty_name= '$faculty_name',course_code = '$course_code' ,appo_date = '$appo_date' ,appo_slot = '$appo_slot' , user_id= '$user_id'WHERE id = '$id'";

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

	header('location: index_userfa1.php');

?>