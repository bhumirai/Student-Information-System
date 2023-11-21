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


$host="localhost";
$user="root";
$password="";
$db="collageproject";
$data=mysqli_connect($host,$user,$password,$db);
 
 if(isset($_POST['add_teacher'])){

 	$t_name=$_POST['name'];
 	$t_description=$_POST['description'];
 	$file=$_FILES['image']['name'];
 	$dst="./image/".$file;
 	$dst_db="image/".$file;
 	move_uploaded_file($_FILES['image']['tmp_name'],$dst);
 	$sql="INSERT INTO teacher(name,description,image) VALUES('$t_name','$t_description','$dst_db')";
 	$result=mysqli_query($data,$sql);

 	if($result){
                  header('location:admin_add_teacher.php');
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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style type="text/css">
	
 .div_deg
 {
 	background-color: skyblue;
 	padding-top: 70px;
 	padding-bottom: 70px;
 	width: 500px;
 }


</style>
    
  <?php
  include 'admin_css.php';

  ?>

</head>
<body>
	<?php

	include 'admin_sidebar.php';

	?>
  

  
  <div class="content">
  	<center>
  	
  	<h1> Add Teacher</h1><br><br>
  	<div class="div_deg">
  		<form action="#" method="POST" enctype="multipart/form-data">
  			
  			<div> 
           <label> teacher Name:</label>
           <input type="text" name="name">

  			</div>
  			<br>
  			<div> 
           <label> Description:</label>
          <textarea name="description"></textarea>

  			</div>
  			<br>
  			<div> 
           <label> Image:</label>
           <input type="file" name="image">

  			</div>
  			<br>
  			<div> 
           
           <input type="submit" name="add_teacher" value="Add Teacher" class="btn btn-primary">

  			</div>
  			<br>
  		</form>
  	</div>
  </center>
  	
  </div>
</body>
</html>