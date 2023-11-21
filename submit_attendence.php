<?php

error_reporting(0);
$host = "localhost";
$user = "root";
$password = "";
$db = "collageproject";

$data = new mysqli($host, $user, $password, $db);
if ($data->connect_error) {
    die("Connection failed: " . $data->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $attendence = $_POST['attendence']; // corrected variable name

    $sql = "INSERT INTO attendence (name, date, attendence) VALUES ('$name', '$date', '$attendence')";

    if ($data->query($sql) === TRUE) { 
        echo "Attendence submitted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $data->error;
    }
}

$data->close();
?>
