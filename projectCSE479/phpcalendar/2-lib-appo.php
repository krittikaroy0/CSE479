<?php
// (G) DATABASE SETTINGS - CHANGE TO YOUR OWN!
define("DB_HOST", "localhost");
define("DB_NAME", "facultyofficehour_db");
define("DB_CHARSET", "utf8mb4");
define("DB_USER", "root");
define("DB_PASSWORD", "");

// (H) NEW APPOINTMENT OBJECT
$_APPO = new Appointment();
// (F) APPOINTMENT DATES & SLOTS - CHANGE TO YOUR OWN!
define("APPO_SLOTS", ["9.00 AM", "9.30 AM",  "10.00 AM",  "10.30 AM","11.00 AM", "11.30 AM",  "12.00 AM",  "12.30 AM","01.00 AM", "01.30 AM",  "02.00 AM",  "02.30 AM","03.00 AM", "03.30 AM",  "04.00 AM",  "04.30 AM"]);
define("APPO_MIN", 0); // next day
define("APPO_MAX", 7); // next week



class Appointment {
  // (A) CONSTRUCTOR - CONNECT TO DATABASE
  private $pdo = null;
  private $stmt = null;
  public $error = "";
  function __construct () {
    $this->pdo = new PDO(
      "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
      DB_USER, DB_PASSWORD, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }

  // (B) DESTRUCTOR - CLOSE DATABASE CONNECTION
  function __destruct () {
    if ($this->stmt!==null) { $this->stmt = null; }
    if ($this->pdo!==null) { $this->pdo = null; }
  }

  // (C) HELPER FUNCTION - EXECUTE SQL QUERY
  function query ($sql, $data=null) : void {
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute($data);
  }

  // (D) GET APPOINTMENTS IN DATE RANGE
  function get ($from, $to) {
    $this->query(
      "SELECT * FROM `appointments` WHERE `appo_date` BETWEEN ? AND ?",
      [$from, $to]
    );
    $res = [];
    while ($r = $this->stmt->fetch()) {
      $res[$r["appo_date"]][$r["appo_slot"]] = [
        'student_name' => $r["student_name"],
        'faculty_name' => $r["faculty_name"],
        'course_code' => $r["course_code"],
        'user_id' => $r["user_id"]
      ];
    }
    return $res;
  }

  // (E) SAVE APPOINTMENT
  function save ($id,$sname, $semail,$fname,$section ,$date, $slot, $user) {
    // (E1) CHECK SELECTED DATE
    $min = strtotime("+".APPO_MIN." day");
    $max = strtotime("+".APPO_MAX." day");
    $unix = strtotime($date);
    if ($unix<$min || $unix<$max) {
      $this->error = "Date must be between ".date("Y-m-d", $min)." and ".date("Y-m-d", $max);
    }

    // (E2) CHECK PREVIOUS APPOINTMENT
    $this->query(
      "SELECT * FROM `appointments` WHERE `appo_date`=? AND `appo_slot`=?",
      [$date, $slot]
    );
    if (is_array($this->stmt->fetch())) {
      $this->error = "$date $slot is already booked";
      return false;
    }

    // (E3) CREATE ENTRY
    $this->query(
      "INSERT INTO `appointments` (`id`, `student_name`, `student_email`,`faculty_name`,`course_code`,`appo_date`, `appo_slot`, `user_id`) VALUES (?,?,?,?,?,?,?,?)",
      [$id,$sname, $semail,$fname,$section ,$date, $slot, $user]
    );
    return true;
  }
}
?>
