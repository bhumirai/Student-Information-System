<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit();
} elseif ($_SESSION['username'] == 'student') {
    header("location: login.php");
    exit();
}

$host = "localhost";
$user = "root";
$password = "";
$db = "collageproject";

$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['add_student'])) {
    $user_id = mysqli_real_escape_string($data, $_POST['id']);
    $username = mysqli_real_escape_string($data, $_POST['username']);
    $user_phone = mysqli_real_escape_string($data, $_POST['phone']);
    $user_course = mysqli_real_escape_string($data, $_POST['course']);
    $user_email = mysqli_real_escape_string($data, $_POST['email']);
    $fathers_name = mysqli_real_escape_string($data, $_POST['fathers_name']);
    $address = mysqli_real_escape_string($data, $_POST['address']);
    $semester = mysqli_real_escape_string($data, $_POST['semester']);
    $branch = mysqli_real_escape_string($data, $_POST['branch']);
    $year = mysqli_real_escape_string($data, $_POST['year']);

    if (empty($user_id) || empty($username) || empty($user_phone) || empty($user_course) || empty($user_email) || empty($fathers_name) || empty($address) || empty($semester) || empty($branch) || empty($year)) {
        echo "<script type='text/javascript'> alert('All fields are required');</script>";
    } else {
        $check_query = "SELECT * FROM user WHERE username = '$username' OR id = '$user_id'";
        $check_result = mysqli_query($data, $check_query);

        if ($check_result) {
            if (mysqli_num_rows($check_result) > 0) {
                echo "<script type='text/javascript'> alert('Username or Enrollment Number Already Exists, Try Another One');</script>";
            } else {
                $insert_query = "INSERT INTO user (id, username, phone, course, email, fathers_name, address, semester, branch, year) VALUES ('$user_id', '$username', '$user_phone', '$user_course', '$user_email', '$fathers_name', '$address', '$semester', '$branch', '$year')";
                $insert_result = mysqli_query($data, $insert_query);

                if ($insert_result) {
                    echo "<script type='text/javascript'> alert('Data upload success');</script>";
                } else {
                    echo "Upload failed" . mysqli_error($data);
                }
            }
        } else {
            echo "Check query execution failed: " . mysqli_error($data);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    
    <style type="text/css">
        label {
            display: inline-block;
            text-align: right;
            width: 150px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg {
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }

        .table_th {
            padding: 10px;
            font-size: 18px;
            background-color: #4CAF50;
            color: white;
        }

        .table_td {
            padding: 10px;
            background-color: #f2f2f2;
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
            <h1>Add Student</h1>
            <div class="div_deg">
                <form action="#" method="POST">
                    <div>
                        <label>Enrollment no</label>
                        <input type="number" name="id">
                    </div>
                    <div>
                        <label>Student name</label>
                        <input type="text" name="username">
                    </div>
                    <div>
                        <label>Phone</label>
                        <input type="text" name="phone">
                    </div>
                    <div>
                        <label>Course</label>
                        <input type="text" name="course">
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="text" name="email">
                    </div>
                    <div>
                        <label>Father's Name</label>
                        <input type="text" name="fathers_name">
                    </div>
                    <div>
                        <label>Address</label>
                        <input type="text" name="address">
                    </div>
                    <div>
                        <label>Semester</label>
                        <input type="number" name="semester">
                    </div>
                    <div>
                        <label>Branch</label>
                        <input type="text" name="branch">
                    </div>
                    <div>
                        <label>Year</label>
                        <input type="number" name="year">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary" name="add_student" value="Add Student">
                    </div>
                </form>
            </div>
            <br><br>
        </center>
    </div>
               
            
            <br><br>
           
            <?php
                if (isset($_GET['search_student'])) {
                    $search_id = $_GET['search_id'];
                    $search_query = "SELECT * FROM user WHERE id = $search_id";
                    $search_result = mysqli_query($data, $search_query);

                    if (mysqli_num_rows($search_result) > 0) {
                        echo "<h2>Student Details:</h2>";
                        echo "<table border='1'>";
                        echo "<tr>";
                        echo "<th class='table_th'>ID</th>";
                        echo "<th class='table_th'>Student Name</th>";
                        echo "<th class='table_th'>Phone</th>";
                        echo "<th class='table_th'>Course</th>";
                        echo "<th class='table_th'>Email</th>";
                        echo "<th class='table_th'>Father's Name</th>";
                        echo "<th class='table_th'>Address</th>";
                        echo "<th class='table_th'>Semester</th>";
                        echo "<th class='table_th'>Branch</th>";
                        echo "<th class='table_th'>Year</th>";
                        echo "</tr>";

                        while ($row = mysqli_fetch_assoc($search_result)) {
                            echo "<tr>";
                            echo "<td class='table_td'>" . $row['id'] . "</td>";
                            echo "<td class='table_td'>" . $row['username'] . "</td>";
                            echo "<td class='table_td'>" . $row['phone'] . "</td>";
                            echo "<td class='table_td'>" . $row['course'] . "</td>";
                            echo "<td class='table_td'>" . $row['email'] . "</td>";
                            echo "<td class='table_td'>" . $row['fathers_name'] . "</td>";
                            echo "<td class='table_td'>" . $row['address'] . "</td>";
                            echo "<td class='table_td'>" . $row['semester'] . "</td>";
                            echo "<td class='table_td'>" . $row['branch'] . "</td>";
                            echo "<td class='table_td'>" . $row['year'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<h2>No student found with that ID.</h2>";
                    }
                }
            ?>
        </center>
    </div>
</body>
</html>
