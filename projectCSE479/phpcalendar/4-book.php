<?php
require "2-lib-appo.php";

// Assuming $_APPO->save signature is (sname, semail, fname, section, date, slot, user)
$result = $_APPO->save(
    $_POST["id"],
    $_POST["sname"],
    $_POST["semail"],
    $_POST["fname"],
    $_POST["section"],
    $_POST["date"],
    $_POST["slot"],
    $_POST["user"]
);

if ($result) {
    echo "<a href='/projectCSE479/login/php/Student1.php'> Back To Home page</a>";
} else {
    echo "Error: " . $_APPO->error;
}
?>
