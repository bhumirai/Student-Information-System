<?php 
       //session_start();
error_reporting(0);
  if(!isset($_SESSION['username']))
  {
  	header("location:login.php");
  }

  elseif($_SESSION['username']=='student')
  {
  	header("location:login.php");
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
<body>
  

  <header class="header">

  	<a href="">Admin Dashboard </a>
   <div class="logout">

   	<a href="logout.php" class="btn btn-primary" >Logout</a>

   </div>

  </header>

<aside>
	
	<ul>
		<li>
			
			<a href="admission.php">Admission</a>
		</li>
        <li>
			
			<a href="add_student.php">Add Student</a>
		</li>
		<li>
			
			<a href="view_student.php">View student</a>
		</li>
		<li>
			
			<a href="admin_add_teacher.php">Add teacher</a>
		</li>
		<li>
			
			<a href="admin_view_teacher.php">View teacher</a>
		</li>

		<li>
			
			<a href="update_attendence.php">Update Attendence</a>
		</li>
		<li>
			
			<a href="view_fee_detail.php">View Fees Detail</a>
		</li>
	<li>
			
			<a href="update_marks.php">Upload Marks</a>
		</li>


	</ul>
</aside>

</body>
</html>