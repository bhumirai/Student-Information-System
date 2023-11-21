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

  $sql="SELECT * from admission";

  $result=mysqli_query($data,$sql);

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
</head>
<style>
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
            background-color: white;
        }
        th {
            background-color: skyblue;
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
  

  
  <div class="content">

  	<center>
  	
  	<h1>Applied for  Admission </h1>

  	<br><br>

  	<table border='1px'>
  		<tr>
  			<th style='padding: 20px; font-size: 15px;'>Name </th>
  			<th style='padding: 20px; font-size: 15px;'>Email </th>
  			<th style='padding: 20px; font-size: 15px;'>Phone </th>
  			<th style='padding: 20px; font-size: 15px;'>Message </th>

  		</tr>
         
         <?php

         while($info=$result->fetch_assoc())

          {

         ?>

  		<tr>
  			
    <td style='padding: 20px; font-size: 15px;'>
    	<?php   echo "{$info['Name']}"; ?>
    </td>
    <td style='padding: 20px; font-size: 15px;'>
    		<?php   echo "{$info['Email']}"; ?>
    </td>
    <td style='padding: 20px; font-size: 15px;'>
    		<?php   echo "{$info['phone']}"; ?>
    </td>
    <td style='padding: 20px; font-size: 15px;'>
    		<?php   echo "{$info['message']}"; ?>
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