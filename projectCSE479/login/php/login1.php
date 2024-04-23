<?php 
session_start();

if(isset($_POST['email']) && 
   isset($_POST['pass'])){

    include "../db_conn.php";

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $data = "email=".$email;
    
    if(empty($email)){
    	$em = "Email is required";
    	header("Location: ../login1.php?error=$em&$data");
	    exit;
    }else if(empty($pass)){
    	$em = "Password is required";
    	header("Location: ../login1.php?error=$em&$data");
	    exit;
    }else {

    	$sql = "SELECT * FROM faculty WHERE email = ?";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$email]);

      if($stmt->rowCount() == 1){
          $user = $stmt->fetch();

          $email =  $user['email'];
          $password =  $user['password'];
          $fname =  $user['fname'];
          $id =  $user['id'];
          $pp =  $user['pp'];

          if($email === $email){
             if(password_verify($pass, $password)){
                 $_SESSION['email'] = $email;
                 $_SESSION['fname'] = $fname;
                 $_SESSION['pp'] = $pp;

                 header("Location: faculty1.php");
                 exit;
             }else {
               $em = "Incorect email or password";
               header("Location: ../login1.php?error=$em&$data");
               exit;
            }

          }else {
            $em = "Incorect email or password";
            header("Location: ../login1.php?error=$em&$data");
            exit;
         }

      }else {
         $em = "Incorect email or password";
         header("Location: ../login1.php?error=$em&$data");
         exit;
      }
    }


}else {
	header("Location: ../login1.php?error=error");
	exit;
}
