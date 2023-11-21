<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['username'])) {
    header("location: login.php");
} elseif ($_SESSION['username'] == 'student') {
    header("location: login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "collageproject";

$data = mysqli_connect($host, $user, $password, $db);

if (isset($_POST['submit'])) {
    $id = $_POST['student_id'];

    $sql = "SELECT * FROM marks WHERE student_id='$id'";
    $result = mysqli_query($data, $sql);
    $info = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Display Marks</title>
    <style type="text/css">
        table {
            border-collapse: collapse;
            width: 65%;
        }
        th, td {
            border: 2px solid black;
            padding: 8px;
            text-align: center;
        }
        .main {
            background-color: skyblue;
        }
    </style>
</head>
<body>
    <div>
        <header>
            <?php
            include 'admin_sidebar.php';
            ?>
        </header>
    </div>
    <center>
        <div>
            <h2>Student Marks:</h2>
            <form action="" method="post">
                <label for="student_id">Enter Student ID: </label>
                <input type="text" name="student_id">
                <input type="submit" name="submit" class="btn btn-success" value="Display Marks">
            </form>
            <?php if (isset($info)) : ?>
                <div>
                    <table>
                        <tr class="main">
                            <th>Subject Name</th>
                            <th>Practical Marks</th>
                            <th>Theory Marks</th>
                        </tr>
                        <tr>
                            <td>Data Base Management System</td>
                            <td><?php echo $info['subject1_practical']; ?></td>
                            <td><?php echo $info['subject1_theory']; ?></td>
                        </tr>
                        <tr>
                            <td>Theory of computation</td>
                            <td><?php echo $info['subject2_practical']; ?></td>
                            <td><?php echo $info['subject2_theory']; ?></td>
                        </tr>
                        <tr>
                            <td>Internet And Web Technology</td>
                            <td><?php echo $info['subject3_practical']; ?></td>
                            <td><?php echo $info['subject3_theory']; ?></td>
                        </tr>
                        <tr>
                            <td>Cyber Security </td>
                            <td><?php echo $info['subject4_practical']; ?></td>
                            <td><?php echo $info['subject4_theory']; ?></td>
                        </tr>
                        <tr>
                            <td>Linux </td>
                            <td><?php echo $info['subject5_practical']; ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Python </td>
                            <td><?php echo $info['subject6_practical']; ?></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </center>
</body>
</html>
