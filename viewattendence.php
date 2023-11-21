<?php
session_start();
error_reporting(0);

$host = "localhost";
$user = "root";
$password = "";
$db = "collageproject";

$data = mysqli_connect($host, $user, $password, $db);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit();
}

$username = $_SESSION['username'];
$student_query = "SELECT * FROM user WHERE username='$username'";
$student_result = mysqli_query($data, $student_query);

if (!$student_result) {
    die("Query to fetch student data failed");
}

$student_info = $student_result->fetch_assoc();

$Eno = $student_info['id']; // Assuming 'id' from the 'user' table is the same as 'Eno' in the 'attendance' table

$attendance_query = "SELECT * FROM attendance WHERE Eno='$Eno'";
$attendance_result = mysqli_query($data, $attendance_query);

if (!$attendance_result) {
    die("Query to fetch attendance data failed");
}
?>

<!DOCTYPE html>
<html>
<head>
   <!DOCTYPE html>
<html>
<head>
      <?php include 'student_css.php'?> 
 <style type="text/css">
        /* Your CSS styles for the admin dashboard */
        .content {
            text-align: center;
            margin-top: 50px;
        }
        table {
            width: 60%;
            margin: 0 auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: center;
            background-color: White;
        }
        th {
            background-color: skyblue;
        }
        .table_css{

            width: 60%;
            margin: 0 auto;
            border-collapse: collapse;
          background-color: lightskyblue;
          
        }
    </style>
</head>
<body>
     <header class="header">
        <div>
        <?php include 'student_sidebar.php'?>
        </div>
    </header>
</head>
<body>
 <center>
    <h2>Attendance Record:</h2>
    <table>
        <tr>
            <th>Date</th>
            <th>Status</th>
        </tr>
        <?php
            if (mysqli_num_rows($attendance_result) > 0) {
                while ($row = mysqli_fetch_assoc($attendance_result)) {
                    echo "<tr>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No attendance records found.</td></tr>";
            }
        ?>
    </table>
   </center>
</body>
</html>
