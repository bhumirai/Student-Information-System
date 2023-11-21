<?php
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

if (isset($_POST['upload'])) {
    $student_id = mysqli_real_escape_string($data, $_POST['student_id']);
    $subject1_practical = mysqli_real_escape_string($data, $_POST['subject1_practical']);
    $subject1_theory = mysqli_real_escape_string($data, $_POST['subject1_theory']);
    $subject2_practical = mysqli_real_escape_string($data, $_POST['subject2_practical']);
    $subject2_theory = mysqli_real_escape_string($data, $_POST['subject2_theory']);
    $subject3_practical = mysqli_real_escape_string($data, $_POST['subject3_practical']);
    $subject3_theory = mysqli_real_escape_string($data, $_POST['subject3_theory']);
    $subject4_practical = mysqli_real_escape_string($data, $_POST['subject4_practical']);
    $subject4_theory = mysqli_real_escape_string($data, $_POST['subject4_theory']);
    $subject5_practical = mysqli_real_escape_string($data, $_POST['subject5_practical']);
    $subject6_practical = mysqli_real_escape_string($data, $_POST['subject6_practical']);

    $sql = "INSERT INTO marks (student_id, subject1_practical, subject1_theory, subject2_practical, subject2_theory, 
    subject3_practical, subject3_theory, subject4_practical, subject4_theory, subject5_practical, subject6_practical) 
    VALUES ('$student_id', '$subject1_practical', '$subject1_theory', '$subject2_practical', '$subject2_theory', 
    '$subject3_practical', '$subject3_theory', '$subject4_practical', '$subject4_theory', '$subject5_practical', 
    '$subject6_practical')";

    if (mysqli_query($data, $sql)) {
        echo "Marks uploaded successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($data);
    }
}
?>

<!DOCTYPE html>

<html>
<head>
    <title>Upload Marks</title>
    <style type="text/css">
        label {
            display: inline-block;
            width: 150px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .div_deg {
            width: 500px;
            padding-bottom: 70px;
            padding-top: 70px;
            margin: auto;
        }
        .form-group {
            padding: 10px;
            background-color: skyblue;
        }
    </style>
</head>
<body>
    <header>
        <div>
            <?php include 'admin_sidebar.php'; ?>
        </div>
    </header>

    <div class="div_deg">
        <center> <h2>Student Marks</h2></center>
        <form action="" method="post">
            <div class="form-group">
                <label for="student_id">Student ID:</label>
                <input type="text" name="student_id">
                <a href="see_detail.php" class="btn btn-success">See Detail</a><br><br>
            </div>

            <div class="form-group">
                <label for="subject1_practical">Data Base Management System Practical:</label>
                <input type="text" name="subject1_practical"><br><br>
            </div>

            <div class="form-group">
                <label for="subject1_theory">Data Base Management System Theory:</label>
                <input type="text" name="subject1_theory"><br><br>
            </div>

            <div class="form-group">
                <label for="subject2_practical">Theory of computation Practical:</label>
                <input type="text" name="subject2_practical"><br><br>
            </div>

            <div class="form-group">
                <label for="subject2_theory">Theory of computation Theory:</label>
                <input type="text" name="subject2_theory"><br><br>
            </div>

            <div class="form-group">
                <label for="subject3_practical">Internet And Web Technology Practical:</label>
                <input type="text" name="subject3_practical"><br><br>
            </div>

            <div class="form-group">
                <label for="subject3_theory">Internet And Web Technology Theory:</label>
                <input type="text" name="subject3_theory"><br><br>
            </div>

            <div class="form-group">
                <label for="subject4_practical">Cyber Security Practical:</label>
                <input type="text" name="subject4_practical"><br><br>
            </div>

            <div class="form-group">
                <label for="subject4_theory">Cyber Security Theory:</label>
                <input type="text" name="subject4_theory"><br><br>
            </div>

            <div class="form-group">
                <label for="subject5_practical">Linux Practical:</label>
                <input type="text" name="subject5_practical"><br><br>
            </div>

            <div class="form-group">
                <label for="subject6_practical">Python Practical:</label>
                <input type="text" name="subject6_practical"><br><br>
            </div>

            <center>
                <div>
                    <input type="submit"  class="btn btn-success" name="upload" value="Upload Marks">
                </div>
                <br>
                <br>
                 <div>
                    <a href="display_marks.php" class="btn btn-success">Display Marks</a>
                </div>
            </center>
        </form>
    </div>
</body>
</html>
