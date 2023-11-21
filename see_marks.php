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

$id = $student_info['id']; // Assuming 'id' from the 'user' table is the same as 'student_id' in the 'marks' table

$marks_query = "SELECT * FROM marks WHERE student_id='$id'";
$marks_result = mysqli_query($data, $marks_query);

if (!$marks_result) {
    die("Query to fetch marks data failed");
}
?>

<!DOCTYPE html>
<html>
<head>
      <?php include 'student_css.php'?> 
 <style type="text/css">
        
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
            background-color: white;
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
    </header><center>
    <h2>Student Marks:</h2>
    <table>
        <tr>
            <th>Subject Name</th>
            <th>Practical Marks</th>
            <th>Theory Marks</th>
        </tr>
        <?php
            if (mysqli_num_rows($marks_result) > 0) {
                $marks_data = $marks_result->fetch_assoc();
                echo "<tr>";
                echo "<td>Data Base Management System </td>";
                echo "<td>" . $marks_data['subject1_practical'] . "</td>";
                echo "<td>" . $marks_data['subject1_theory'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Theory of computation</td>";
                echo "<td>" . $marks_data['subject2_practical'] . "</td>";
                echo "<td>" . $marks_data['subject2_theory'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Internet And Web Technology</td>";
                echo "<td>" . $marks_data['subject3_practical'] . "</td>";
                echo "<td>" . $marks_data['subject3_theory'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Cyber Security</td>";
                echo "<td>" . $marks_data['subject4_practical'] . "</td>";
                echo "<td>" . $marks_data['subject4_theory'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Linux </td>";
                echo "<td>" . $marks_data['subject5_practical'] . "</td>";
                echo "<td></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Python</td>";
                echo "<td>" . $marks_data['subject6_practical'] . "</td>";
                echo "<td></td>";
                echo "</tr>";
            } else {
                echo "<tr><td colspan='3'>No marks records found.</td></tr>";
            }
        ?>
    </table>
   </center>
</body>
</html>
