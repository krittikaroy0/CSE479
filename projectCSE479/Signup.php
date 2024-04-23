<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration Form</title>

    <style>
        

        .container-fluid {
            padding: 50px;
        }

        .form-inline {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 10px;
            color:navy;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            color: navy;
        }

        .btn {
            background-color: #d9534f;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #c9302c;
        }

        .error-msg {
            color: #d9534f;
            margin-bottom: 20px;
        }

        .success-msg {
            color: #5cb85c;
            margin-bottom: 20px;
        }
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
height: auto;
background-image:url(EWU1.jpg);
background-size:cover;
}

 .container {
  
   max-width: 1400px;
   margin-top: 1px ;
   height: 10%;
  
  
 }

 #loginform {
    max-width: 400px;
    margin: 0 auto;
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    background-size:right;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .form-group {
    margin-bottom: 10px;
  }
    </style>
</head>
<body>

<?php
$db = mysqli_connect('localhost', 'root', '', 'facultyofficehour_db');
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    // Validate the user input
    $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
    $user_type = mysqli_real_escape_string($db, $_POST['user_type']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($db, $_POST['confirmPassword']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_length = strlen($password);
    $name_length = strlen($name);

    $error_msg = "";

    $query = "select name from users where email = '$email' limit 1";

    if (empty($name) || $name_length < 6 || $name_length > 25 || !preg_match("/^[a-zA-Z]+$/", $name)) {
        $error_msg .= "Please enter a valid name (14-25 characters, only letters).<br>";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_msg .= "Please enter a valid email address.<br>";
    }

    if (empty($password) || $password_length < 8 || !preg_match("#[0-9]+#", $password) || !preg_match("#[A-Z]+#", $password) || !preg_match("#[a-z]+#", $password)) {
        $error_msg .= "Please enter a valid password (at least 8 characters, 1 uppercase letter, 1 lowercase letter, and 1 number).<br>";
    }

    if (empty($user_id) || empty($password) || empty($confirmPassword) || empty($name) || empty($email) || empty($user_type)) {
        $error_msg .= "All fields are required.<br>";
    }

    if ($password != $confirmPassword) {
        $error_msg .= "The passwords do not match.<br>";
    }

    if (!empty($error_msg)) {
        echo '<div class="error-msg">' . $error_msg . '</div>';
        exit();
    }

    // Insert user data into the database
    $query = "INSERT INTO `users` (`id`, `name`, `email`, `password`, `confirmPassword`, `user_type`) VALUES ('$user_id', '$name', '$email','$password', '$confirmPassword','$user_type')";

    if (mysqli_query($db, $query)) {
        $success_msg = "Thank you for registering!<br>";
        echo "<script> window.location='Log.php' </script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($db);
    }
}

mysqli_close($db);
?>
<form id="loginform" method="post" name="myForm" onsubmit="return loginclick()">
<div class="panel panel-signin"  >
        
      <div class="logo text-center">
    <img style="float:center;width:100%; background: center ;" src="logo.jpg" alt="Chain Logo">
    
</div>

<form class="modal-content animate" action="FacultyLog.php" id="loginform"  name="myForm" onsubmit="return loginclick() " method="post">
<div class="container-fluid text-center bg-grey col-50 width-50%">
    <form action="" method="POST" class="form-inline">
        <div class="container">
            <center><b><P> Registration </p></b></center>
            <span><i class="fa fa-user"></i></span>
            <label for="user_id" style="font-size:16px"><b>ID:</b></label>
            <input type="number" placeholder="Enter Your id" name="user_id" required><br>
           
            <label for="name" style="font-size:16px"><i class="fa fa-user"></i><b>Name:</b></label>
            <input type="text" placeholder="Enter Your Name" name="name" pattern="[a-zA-Z\s]+" required><br>

            <label for="email" style="font-size:16px"><i class="fa fa-envelope"></i><b>Email Address:</b></label>
            <input type="text" style="font-size:16px" placeholder="Enter Your Email Address" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required><br>

            <label for="password" style="font-size:16px"><i class="fa fa-key icon"></i><b>Password:</b></label>
            <input type="password" placeholder="Create Your password" name="password" required><br>

            <label for="confirmPassword" style="font-size:16px"><i class="fa fa-key icon"></i><b>Confirm Password:</b></label>
            <input type="password" placeholder="Confirm Your password" name="confirmPassword" required><br>

           
            <label for="user_type" style="font-size:16px"><i class="fa fa-envelope"></i><b>User type:</b></label>
            <br>
            <select name="user_type" size="1">
                <option>Admin</option>
                <option>Faculty</option>
                <option>Student</option>
            </select>
            <br><br>
            <div style="padding:10px">Already have an account? <a href="Log.php">Login here</a></div>
            <input type="submit" class="btn btn-danger text-uppercase focus" name="submit" value="Register">
           </div>
<!-- <p style="text-align:center" > -->
<!-- <a style="text-align:center;width:45%;background:navy;font-size:12px;" href="home.php"><strong style="color:White">Back To Home Page</strong></a></p> -->
       
      </form></div>
            <?php
            if (isset($error_msg)) {
                echo '<div class="error-msg">' . $error_msg . '</div>';
            }
            if (isset($success_msg)) {
                echo '<div class="success-msg">' . $success_msg . '</div>';
            }
            ?>
        </div>
    </form>
</div>

</body>
</html>
