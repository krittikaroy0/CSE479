<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
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
        <a class="" href="https://www.ewubd.edu"><img src="https://www.ewubd.edu/themes/east-west-university/assets/default/images/logo.png" alt=""></a>
        </div>
        
<div class="topnav" id="myTopnav">
  <a href="http://localhost/projectCSE479/index_user.php" class="active">User List</a>
  <a a href='upload.php'> Upload Faculty OfficeHour</a>
  <a a href='/projectCSE479/phpcalendar/index.php'> Booked Faculty OfficeHour</a>
  <a a href='/projectCSE479/index_user1.php'> Edit OfficeHour </a>
  <!-- <a a href='http://localhost/projectCSE479/phpcalendar/index1.php'> View Booked OfficeHour</a> -->
  <a href='home.php'>Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>


 
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    
  
    <div class="carousel-inner" role="listbox" >
      <div class="item active">
        <img src="EWU1.jpg" alt="img1" width="100%" height="1000%" title="Admin Home Page">
  
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
