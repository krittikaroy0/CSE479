<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>Admin Login</title>
</head>

<style>
h1{
font-size:50px;
text-align:center;
padding-top:30px;
color:#000066;
}
img 
{ float: left;
width: 77px;
}
li{
font-size:24px;
}
h3{
font-size:24px;}
p{
text-align:center;
font-size:26px;
color: navy;
}

body {margin:0;
padding:0;
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
width:100%;
height:100vh;
background-image:url(EWU1.jpg);
background-size:cover;
}

 .container {
  
   max-width: 1200px;
   margin-top: 100px ;
   padding: 2px;
  
 }

 #loginform {
    max-width: 400px;
    margin: 0 auto;
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .form-group {
    margin-bottom: 10px;
  }

</style>
<body class="signin">
    <?php
    error_reporting(0);
    session_start();
    include("connection.php");
    // include('..translate.php'); // Assuming this file is not used or properly included

    if (isset($_POST['submit'])) {
        $admin_email = $_POST['email'];
        $admin_pswd = $_POST['admin_pswd'];

        if (empty($admin_email) || empty($admin_pswd)) {
            // Handle empty fields if needed
        } else {
            $admin_query = "SELECT * FROM admin WHERE email='$admin_email' AND admin_pswd='$admin_pswd'";
            $check = mysqli_query($db, $admin_query);

            if (mysqli_num_rows($check) > 0) {
                $check_row = mysqli_fetch_assoc($check);
                $_SESSION['email'] = $check_row['email'];
                header("Location: admin2.php"); // Redirect to admin2.php upon successful login
                exit();
            } else {
                $invalid_msg = "Invalid user id / password ";
            }
        }
    }
    ?>

   

<form id="loginform" method="post" name="myForm" onsubmit="return loginclick()">
  <!-- Login -->
      <div class="panel panel-signin"  >
        
      <div class="logo text-center">
    <img style="float:center;width:100%; background: center ;" src="logo.jpg" alt="Chain Logo">
    <p  class=" text-center font-weight-small text-navy "><em>Admin Login</em></p>
</div>
  <form class="modal-content animate"  id="loginform"  name="myForm" onsubmit="return loginclick() " method="post">
        <div class="w3-container w3-white " >
        <span><i class="fa fa-user"></i></span> 
        <label for="email"><b>Email</b></label>
      <input type="email" class="w3-input w3-border" placeholder="Enter e-mail" name="email" style="width:100%"  required>
      <span><i class="fa fa-lock"></i></span>
      <label for="pswd"><b>Password</b></label>
      <input type="password" class="w3-input w3-border" placeholder="Enter Password" name="admin_pswd" style="width:100%" required>
      <br>
      <div class="input-group mb15">
                <label id="lblFirstNo" style="margin:0px 0px 0px 0px;font-size:small;font-weight: bold;" class="form-inline col-lg-1 col-md-1 col-sm-1">6</label>
                <label id="lblplus" style="margin:0px 0px 0px 0px;font-size:small;font-weight: bold;" class="form-inline col-lg-1 col-md-1 col-sm-1"> + </label>
                <label id="lblSecondNo" style="margin:0px 0px 0px 0px;font-size:small;font-weight: bold;" class="form-inline col-lg-2 col-md-2 col-sm-2">8</label>
                <label id="lblequal" style="margin:0px 0px 0px 0px;font-size:small;font-weight: bold;" class="form-inline col-lg-2 col-md-2 col-sm-2">=? </label>
                <input id="lblcaptchaAnswer" name="Answer" type="text" class="form-inline col-lg-2 col-md-2 col-sm-2" style="margin:-3px 0px 0px 0px;font-size:small;font-weight: bold;" value="">

                <input type="hidden" name="FirstNo" value="6">
                <input type="hidden" name="SecondNo" value="8">
              </div>
              

              <div id="errors" class="errors" style="color:red;font-weight:bold;font-size:1.1em"></div>
              <div class="clearfix">
                <div class="pull-left">
                  <div class="ckbox ckbox-primary mt2">
                    <input type="checkbox" id="rememberMe" value="1">
                    <label for="rememberMe">Remember Me</label>
                  </div>
                </div>

        <!-- <button type ="submit" name="submit" value="login"  class="w3-button w3-block w3-green"><a herf="admin2.php">Login</a></button> -->
        </div>
        
<p style="text-align:center" >
<a style="text-align:center;width:75%;background:navy;font-size:20px;" href="admin2.php"><strong style="color:White">Login</strong></a></p>
       
      </form></div>




  

 <?php
if(isset($error_msg)){echo $error_msg;}
if(isset($invalid_msg)){echo $invalid_msg;}
?>



</body>
</html>