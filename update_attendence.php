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

if (isset($_POST['submit_attendance'])) {
    $Eno = $_POST['Eno'] ?? '';
    $student_name = $_POST['student_name'] ?? '';
    $status = $_POST['status'] ?? '';
    $date = $_POST['date'] ?? '';

    $check_sql = "SELECT * FROM attendance WHERE Eno = '$Eno' AND date = '$date'";
    $check_result = mysqli_query($data, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        $update_sql = "UPDATE attendance SET student_name = '$student_name', status = '$status' WHERE Eno = '$Eno' AND date = '$date'";
        $update_result = mysqli_query($data, $update_sql);

        if ($update_result) {
            echo "<script type='text/javascript'> alert('Attendance updated successfully');</script>";
        } else {
            echo "Failed to update attendance" . mysqli_error($data);
        }
    } else {
        $sql = "INSERT INTO attendance (Eno, student_name, date, status) VALUES ('$Eno', '$student_name', '$date', '$status')";
        $result = mysqli_query($data, $sql);

        if ($result) {
            echo "<script type='text/javascript'> alert('Attendance uploaded successfully');</script>";
        } else {
            echo "Failed to upload attendance" . mysqli_error($data);
        }
    }
}

if (isset($_POST['submit_search'])) {
    $search = $_POST['search'] ?? '';

    $sql_search = "SELECT * FROM attendance WHERE Eno = '$search'";
    $result_search = mysqli_query($data, $sql_search);
}



?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload Attendance</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }
        .content {
            text-align: center;
            margin-top: 50px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            font-weight: bold;
            margin-bottom: 10px;
        }
        input[type="text"] {
            padding: 8px;
            margin-bottom: 15px;
            width: 250px;
        }
        select {
            padding: 8px;
            margin-bottom: 15px;
            width: 250px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        .search-student {
            margin-top: 50px;
            text-align: center;
            align-items: center;
        }
        table {
            width: 60%;
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
            background-color: #4CAF50;
            color: white;
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

<div class="content">
    <center>
    <h2>Upload Attendance</h2>
    <form action="#" method="POST">
        <label for="Eno">Eno:</label>
        <input type="text" name="Eno" id="Eno">
        <br><br>
        <label for="student_name">Student Name:</label>
        <input type="text" name="student_name" id="student_name">
        <br><br>
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="Present">Present</option>
            <option value="Absent">Absent</option>
        </select>
        <br><br>
        <label for="date">Date:</label>
        <input type="date" name="date" id="date">
        <br><br>
        <input type="submit" name="submit_attendance" value="Submit">
    </form>
</div>
<br><br>
<div class="search-student">
    <h2>Search Student Attendence</h2>
    <form action="#" method="POST">
        <label for="search">Search by Eno DateWise:</label>
        <input type="text" name="search" id="search">
        <br><br>
        <input type="submit" name="submit_search" value="Search">
    </form>
    <br><br>
<div class="eno-form">
    <form action="overall_attendence.php" method="GET">

        <input type="submit" value="Check Overall Attendance">
    </form>
    <?php
    if (isset($_POST['submit_search'])) {
        if ($result_search && mysqli_num_rows($result_search) > 0) {
            echo "<table border='1'>
                    <tr>
                        <th>Eno</th>
                        <th>Student Name</th>
                        <th>Date</th>
                        <th>Status</th>

                    </tr>";
            while ($row = mysqli_fetch_assoc($result_search)) {
                echo "<tr>";
                echo "<td>" . $row['Eno'] . "</td>";
                echo "<td>" . $row['student_name'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No results found";
        }
    }
    ?>
    </center>
</div>


</center>

</div>

</body>
</html>
