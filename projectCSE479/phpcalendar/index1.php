<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Office Hour Booking</title>
  <link rel="stylesheet" href="3c-select.css">
  <script src="3b-select.js"></script>
</head>
<body>
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
define("APPO_SLOTS", ["9.00 AM", "9.30 AM", "10.00 AM", "10.30 AM", "11.00 AM", "11.30 AM", "12.00 PM", "12.30 PM", "01.00 PM", "01.30 PM", "02.00 PM", "02.30 PM", "03.00 PM", "03.30 PM", "04.00 PM", "04.30 PM"]);
define("APPO_MIN", 0); // next day
define("APPO_MAX", 7); // next week

class Appointment {
  private $pdo = null;
  private $stmt = null;
  public $error = "";

  function __construct() {
    $this->pdo = new PDO(
      "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
      DB_USER, DB_PASSWORD, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }

  // Destructor not needed for now, handled automatically

  // Example method for creating a new appointment
  function createAppointment($id, $sname, $semail, $fname, $section, $date, $slot, $user) {
    $this->query(
      "INSERT INTO `appointments` (`id`, `student_name`, `student_email`, `faculty_name`, `course_code`, `appo_date`, `appo_slot`, `user_id`) VALUES (?,?,?,?,?,?,?,?)",
      [$id, $sname, $semail, $fname, $section, $date, $slot, $user]
    );
    return true;
  }

  // Execute SQL query
  private function query($sql, $params = []) {
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute($params);
  }

  // Get appointments in date range
  function get($from, $to) {
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
}

// (A) LOAD LIBRARY + INIT
$start = strtotime("+" . APPO_MIN . " day");
$end = strtotime("+" . APPO_MAX . " day");
$booked = $_APPO->get(date("Y-m-d", $start), date("Y-m-d", $end));

// (B) SELECT APPOINTMENT DATE/SLOT
?>
<table id="select">
  <!-- (B1) FIRST ROW: HEADER CELLS -->
  <tr>
    <th></th>
    <?php foreach (APPO_SLOTS as $slot) {
      echo "<th>$slot</th>";
    } ?>
  </tr>

  <!-- (B2) FOLLOWING ROWS: DAYS -->
  <?php
  for ($unix = $start; $unix <= $end; $unix += 86400) {
    $thisDate = date("Y-m-d", $unix);
    echo "<tr><th>$thisDate</th>";
    foreach (APPO_SLOTS as $slot) {
      if (isset($booked[$thisDate][$slot])) {
        $student = $booked[$thisDate][$slot]['student_name'];
        $faculty = $booked[$thisDate][$slot]['faculty_name'];
        $course = $booked[$thisDate][$slot]['course_code'];
        echo "<td class='booked' style='color:red'><b>booked for: $student<br>Faculty:$faculty<br>Course:$course</b></td>";
      } else {
        echo "<td onclick=\"select(this, '$thisDate', '$slot')\"></td>";
      }
    }
    echo "</tr>";
  }
  ?>
</table>
</body>
</html>
