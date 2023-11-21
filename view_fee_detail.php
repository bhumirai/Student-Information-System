<?php
session_start();
error_reporting(0);

if(!isset($_SESSION['username'])) {
    header("location: login.php");
} elseif($_SESSION['username'] == 'student') {
    header("location: login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "collageproject";

$data = mysqli_connect($host, $user, $password, $db);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if (isset($_GET['search'])) {
    $searchId = $_GET['search'];
    $query = "SELECT * FROM fees WHERE id = $searchId";
} else {
    $query = "SELECT * FROM fees";
}

$result = mysqli_query($data, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <style>
      
        .center-content {
            text-align: center;
            margin-top: 50px;
        }

        /* CSS for the table */
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: center;
            background-color: #f2f2f2;
        }

        th {
            background-color: skyblue;
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
<center>

    <div class="center-content">
        <form action="" method="GET">
            <label for="search">Search by ID:</label>
            <input type="text" id="search" name="search">
            <input type="submit" value="Search">
        </form>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Fee Amount</th>
                <th>Date</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['student_name'] . "</td>";
                echo "<td>" . $row['fee_amount'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

</center>
</body>
</html>
