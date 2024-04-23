
        
<div class="topnav" id="myTopnav">
<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {

  include "../db_conn.php";
include 'User.php';
$user = getUserById($_SESSION['id'], $conn);
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="login/css/style.css">

  <style>
    .shadow {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .w-350 {
        width: 350px; 
    }

    .p-3 {
        padding: 1rem;
    }

    .text-right {
        text-align: right;

    }

    .img-fluid {
        max-width: 50%;
        height: auto;
        border-radius: 50%; 
       
    }

    
    .display-4 {
        font-size: 0.75rem;
        margin-top: 1px;
         
    }
    .shadow-left {
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
       
        padding: 0.5rem;
        background: left;
        text-align: center;
    }


.topnav {
  overflow: hidden;
  background-color: white;
}


.topnav a {
  float: left;
  display: block;
  color:  navy;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color:  navy;
  color: white;
}

.topnav a.active {
  background-color: navy;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}

 
.kingster-logo-inner {
    text-align: left; 
}
.kingster-logo-inner a {
    text-decoration: none; 
}
.kingster-logo-inner img {
    max-width: 100%;
    height: 30px; 
    box-shadow: white;
}

.latest-news-marquee-mobile {
    overflow: hidden; 
    white-space: nowrap; 
    width: 100%;
    background: #192F59;

}



</style>

</head>
<body>

<div class="kingster-logo-inner">
  <a class="" ><img src="https://www.ewubd.edu/themes/east-west-university/assets/default/images/logo.png" alt=""></a>
  <a href="edit.php"class="active" >Edit Profile</a>
  <a a href='/projectCSE479/upload1.php'> View Faculty OfficeHour</a>
  <a a href='/projectCSE479/phpcalendar/index.php'> Booked Faculty Office Hour</a>
  <a a href='https://meet.google.com/xwz-yobw-qop'>Video call</a>
  <a href="logout.php" > Logout </a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>

  <?php if ($user) { ?> 
  <div class="shadow-left">
  <img src="../upload/<?=$user['pp']?>" class="img-fluid rounded-circle">
  <h3 class="display-4"><?=$user['fname']?></h3>
</div>

 <?php }else { 
  header("Location: login.php");
  exit;
 } ?>
      </div>
   








 
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    
  
    <div class="carousel-inner" role="listbox" >
      <div class="item active">
        <img src="https://th.bing.com/th/id/R.2a9c3936e0a006a75c4434fe99d977de?rik=z7i9dvCd8IZo1Q&riu=http%3a%2f%2fwww.chrisppicsplus.com%2fwp-content%2fuploads%2f2014%2f08%2fanimation-pam-01.gif&ehk=z7B1Es6QQfp%2f3gg8DOb9ect9JUAwoCweEDu8Ox78Yc0%3d&risl=&pid=ImgRaw&r=0" 
        alt="img1" width="100%" height="750vh" title="Student Home Page">
  
    </div></div></div>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
</body>
</html>