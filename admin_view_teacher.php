<?php 
       session_start();

       error_reporting(0);

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

$sql="SELECT * FROM teacher ";
$result=mysqli_query($data,$sql);

if($_GET['teacher_id']){

	$t_id=$_GET['teacher_id'];
	$sql2="DELETE FROM teacher WHERE id='$t_id'";
	$result2=mysqli_query($data,$sql2);
	if($result2)

	{
	   header('location:admin_view_teacher.php');
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
    
  <?php
  include 'admin_css.php';

  ?>

  <style type="text/css">
  	
  	.table_th{

  		padding: 20px;
  		font-size: 20px;

  	}

  	.table_td
  	{
  		padding: 20px;
  		background-color: skyblue;
  	}

  </style>

</head>
<body>

	<?php
	include 'admin_sidebar.php';
	?>
  

  
  <div class="content">
  	<center>
  	
  	<h1> view all teacher data</h1>
  	<table border="1px">
  		<tr>
  			<th class="table_th">Teacher Name </th>
  			<th class="table_th">About Teacher </th>
  			<th class="table_th">Image</th>
  			<th class="table_th">Delete</th>
  			<th class="table_th">Update</th>
  		</tr>

  		<?php

  		while($info=$result->fetch_assoc()){



  		?>
  		<tr>
  			<td class="table_td"><?php echo "{$info['Name']}"?></td>
  			<td class="table_td"><?php echo "{$info['description']}"?></td>
  			<td class="table_td"><img height="100px" width="100px" src="<?php echo "{$info['image']}"?>"></td>

  			<td class="table_td">
  				<?php

  				echo "
  				<a  onClick=\"javascript:return confirm('Are you sure to Delete This');\"class='btn btn-danger' href='admin_view_teacher.php?teacher_id={$info['id']}'>Delete</a>";

  				?>
  			</td>

  			<td class="table_td">

  				<?php
  				echo "
  				<a href='admin_update_teacher.php?teacher_id={$info['id']}' class='btn btn-primary'>Update</a>";
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