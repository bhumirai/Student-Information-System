<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$user = "root";
$password = "";
$db = "collageproject";

$data = mysqli_connect($host, $user, $password, $db);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Calculate overall attendance
$overall_attendance_query = "SELECT Eno, COUNT(CASE WHEN status = 'Present' THEN 1 END) as present_count, COUNT(*) as total_count FROM attendance GROUP BY Eno";
$overall_attendance_result = mysqli_query($data, $overall_attendance_query);

$overall_attendance_data = array();

if ($overall_attendance_result) {
    while ($row = mysqli_fetch_assoc($overall_attendance_result)) {
        $Eno = $row['Eno'];
        $present_count = $row['present_count'];
        $total_count = $row['total_count'];
        $attendance_percentage = ($total_count > 0) ? ($present_count / $total_count) * 100 : 0;
        $overall_attendance_data[$Eno] = $attendance_percentage;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Overall Attendance</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .overall-attendance {
            text-align: center;
            margin-top: 50px;
        }
        table {
            width: 40%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: skyblue;
            color: white;
        }
        .search-form {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<header>
    <div>
        <?php
        include 'admin_sidebar.php';
        ?>
    </div>
</header>

<div class="search-form">
    <form action="#" method="GET">
        <label for="searchEno">Enter Eno to check overall attendance:</label>
        <input type="text" name="searchEno" id="searchEno">
        <input type="submit" value="Search">
    </form>
</div>

<div class="overall-attendance">
    <?php
    if (isset($_GET['searchEno'])) {
        $searchEno = $_GET['searchEno'];
        if (!empty($overall_attendance_data[$searchEno])) {
            $student_name_query = "SELECT student_name FROM attendance WHERE Eno = '$searchEno' LIMIT 1";
            $student_name_result = mysqli_query($data, $student_name_query);
            $student_name = mysqli_fetch_assoc($student_name_result)['student_name'];

            echo "<h2>Overall Attendance for Eno: " . $searchEno . "</h2>";
            echo "<h3>Student Name: " . $student_name . "</h3>";
            echo "<table border='1'>
                <tr>
                    <th>Eno</th>
                    <th>Student Name</th>
                    <th>Overall Attendance Percentage</th>
                </tr>";
            echo "<tr>";
            echo "<td>" . $searchEno . "</td>";
            echo "<td>" . $student_name . "</td>";
            echo "<td>" . $overall_attendance_data[$searchEno] . "%</td>";
            echo "</tr>";
            echo "</table>";
        } else {
            echo "<h2>No data found for Eno: " . $searchEno . "</h2>";
        }
    } else {
        echo "<h2>Overall Attendance</h2>";
        if (!empty($overall_attendance_data)) {
            echo "<table border='1'>
                <tr>
                    <th>Eno</th>
                    <th>Student Name</th>
                    <th>Overall Attendance Percentage</th>
                </tr>";
            foreach ($overall_attendance_data as $Eno => $attendance_percentage) {
                $student_name_query = "SELECT student_name FROM attendance WHERE Eno = '$Eno' LIMIT 1";
                $student_name_result = mysqli_query($data, $student_name_query);
                $student_name = mysqli_fetch_assoc($student_name_result)['student_name'];
                echo "<tr>";
                echo "<td>" . $Eno . "</td>";
                echo "<td>" . $student_name . "</td>";
                echo "<td>" . $attendance_percentage . "%</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No overall attendance data available.</p>";
        }
    }
    ?>
</div>

</body>
</html>
