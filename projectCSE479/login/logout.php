<?php  
session_start();

session_unset();
session_destroy();

header("Location: /projectCSE479/home.php");
exit;