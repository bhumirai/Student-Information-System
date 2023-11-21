<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit();
} elseif ($_SESSION['username'] == 'student') {
    header("location:login.php");
    exit();
}

$host = "localhost";
$user = "root";
$password = "";
$db = "collageproject";

$data = mysqli_connect($host, $user, $password, $db);

$id = $_GET['student_id'];

$sql = "SELECT * FROM user WHERE id='$id'";
$result = mysqli_query($data, $sql);
$info = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $course = isset($_POST['course']) ? $_POST['course'] : '';

    $query = "UPDATE user SET username='$name', email='$email', phone='$phone', course='$course' WHERE id='$id'";
    $result2 = mysqli_query($data, $query);

    if ($result2) {
        header("location:view_student.php");
    } else {
        echo "Update failed: " . mysqli_error($data);
    }
}
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
    <style type="text/css">
        label {
            display: inline-block;
            width: 100px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .div_deg {
            background-color: skyblue;
            width: 400px;
            padding-bottom: 70px;
            padding-top: 70px;
        }
    </style>
</head>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <style type="text/css">
        label {
            display: inline-block;
            width: 100px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .div_deg {
            background-color: skyblue;
            width: 400px;
            padding-bottom: 70px;
            padding-top: 70px;
            margin: auto;
        }
        input[type=text], input[type=email], input[type=number], input[type=hidden] {
            width: 200px;
            padding: 5px;
            margin: 5px 0;
            box-sizing: border-box;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            width: 32%;
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

  
    <div class="content">
        <center>
            <h1> Update Student </h1>
            <div class="div_deg">
                <form action="#" method="POST">
                    <input type="hidden" name="id" value="<?php echo isset($info['id']) ? $info['id'] : ''; ?>">
                    <div>
                        <label>Username:</label>
                        <input type="text" name="name" value="<?php echo isset($info['username']) ? $info['username'] : ''; ?>">
                    </div>
                    <div>
                        <label>Email:</label>
                        <input type="email" name="email" value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>">
                    </div>
                    <div>
                        <label>Phone:</label>
                        <input type="number" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>">
                    </div>
                    <div>
                        <label>Course:</label>
                        <input type="text" name="course" value="<?php echo isset($info['course']) ? $info['course'] : ''; ?>">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-success" name="update" value="Update">
                    </div>
                </form>
            </div>
        </center>
    </div>
</body>
</html>
