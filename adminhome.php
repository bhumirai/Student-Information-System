<?php 
       session_start();

  if(!isset($_SESSION['username']))
  {
  	header("location:login.php");
  }

  elseif($_SESSION['username']=='student')
  {
  	header("location:login.php");
  }
  $host = "localhost";
$user = "root";
$password = "";
$db = "collageproject";
$data = mysqli_connect($host, $user, $password, $db);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
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
    
  <?php
  include 'admin_css.php';

  ?>

</head>
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
            padding: 10px;
            text-align: center;
            background-color: skyblue;
        }
        th {
            background-color: white;
        }
        .table_css{

          width: 60%;
            margin: 0 auto;
            border-collapse: collapse;
          
          
        }
    </style>
<body>

	<?php
	include 'admin_sidebar.php';
	?>
  

  
  
    <div class="header">
        
    </div>

    
    <div class="sidebar">
       
    </div>
<center>
    
    <div class="content">
        <h1>Welcome to the Admin Dashboard</h1>
<br><br>
        <h2>Admin Details</h2>
        <br><br>
        <table border=2px>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Course</th>
            </tr>
            <?php
            $query = "SELECT * FROM user WHERE username='admin'";
            $result = mysqli_query($data, $query);
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["username"] . "</td><td>" . $row["email"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["course"] . "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='5'>0 results</td></tr>";
            }
            ?>
        </table>

      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <table border="2px" class="table_css" >
      <tr>
        
     <th>
        <img src="admins.jpg" alt="Admin Image" width="200" height="200" ></th>
        <th >About Admin
          <br>
        An administrator, commonly referred to as an admin, is a person or group responsible for the management, configuration, and maintenance of computer systems, networks, or other technical assets. Administrators play a crucial role in ensuring the smooth functioning and security of information systems within an organization. They often have privileges to manage user accounts, install and update software, oversee data backups, and address technical issues. The role requires a strong understanding of system operations and a proactive approach to problem-solving and decision-making. Administrators are vital for maintaining the integrity and efficiency of an organization's technological infrastructure.</th>
    </tr>
  </table>
</div>
</center>
    
    <div class="footer">
        
    </div>
  
  	
  	  	
  
</body>
</html>  