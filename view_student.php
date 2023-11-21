<?php
session_start();
error_reporting(0);

if(!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif($_SESSION['username']=='student') {
    header("location:login.php");
}

$host="localhost";
$user="root";
$password="";
$db="collageproject";
$data=mysqli_connect($host,$user,$password,$db);

$sql="SELECT * FROM user WHERE course='Engineering'";
$result=mysqli_query($data,$sql);

if($_GET['student_id']){
    $s_id=$_GET['student_id'];
    $sql2="DELETE FROM user WHERE id='$s_id'";
    $result2=mysqli_query($data,$sql2);
    if($result2){
        header('location:admin_view_student.php');
    }
}
    if (isset($_GET['search'])) {
    $searchId = $_GET['search'];
    $query = "SELECT * FROM user WHERE id = $searchId";
} else {
    $query = "SELECT * FROM user";
}

$result = mysqli_query($data, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <?php
    include 'admin_css.php';
    ?>
     <style type="text/css">
        .content {
            margin: 20px;
            padding: 20px;
            background-color: #f2f2f2;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .table_th {
            padding: 10px;
            font-size: 18px;
            background-color: skyblue;
            color: white;
        }
        .table_td {
            padding: 10px;
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
    include 'admin_sidebar.php';
    ?>
    <div class="content">
        <center>
            <form action="" method="GET">
            <label for="search">Search by ID:</label>
            <input type="text" id="search" name="search">
            <input type="submit" value="Search">
        </form>
            <h1> View all student data</h1>
            <table border="1px">
                <tr>
                    <th class="table_th">ID</th>
                    <th class="table_th">Username</th>
                    <th class="table_th">Phone</th>
                    <th class="table_th">Course</th>
                    <th class="table_th">Email</th>
                    <th class="table_th">Father's Name</th>
                    <th class="table_th">Address</th>
                    <th class="table_th">Semester</th>
                    <th class="table_th">Branch</th>
                    <th class="table_th">Year</th>
                    <th class="table_th">Delete</th>
                    <th class="table_th">Update</th>
                </tr>
                <?php
                while($info = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td class="table_td"><?php echo $info['id']?></td>
                        <td class="table_td"><?php echo $info['username']?></td>
                        <td class="table_td"><?php echo $info['phone']?></td>
                        <td class="table_td"><?php echo $info['course']?></td>
                        <td class="table_td"><?php echo $info['email']?></td>
                        <td class="table_td"><?php echo $info['fathers_name']?></td>
                        <td class="table_td"><?php echo $info['address']?></td>
                        <td class="table_td"><?php echo $info['semester']?></td>
                        <td class="table_td"><?php echo $info['branch']?></td>
                        <td class="table_td"><?php echo $info['year']?></td>
                        <td class="table_td">
                            <?php
                            echo "<a onClick=\"javascript:return confirm('Are you sure to Delete This');\" class='btn btn-danger' href='admin_view_student.php?student_id={$info['id']}'>Delete</a>";
                            ?>
                        </td>
                        <td class="table_td">
                            <?php
                            echo "<a href='update_student.php?student_id={$info['id']}' class='btn btn-primary'>Update</a>";
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </center>
    </div>
</body>
</html>
