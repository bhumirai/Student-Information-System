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

  if($_GET['teacher_id'])
  {
        $t_id=$_GET['teacher_id'];
        $sql="SELECT * FROM teacher WHERE id='$t_id'";
        $result=mysqli_query($data,$sql);
        $info=$result->fetch_assoc();

        if(isset($_POST['update_teacher']))
        {
        	 $id=$_POST['id'];
           
           $t_name=$_POST['Name'];

           $t_des=$_POST['description'];

           $file=$_FILES['image']['name'];

           $dst="./image/".$file;

           $dst_db="image/".$file;

           move_uploaded_file($_FILES['image']['tmp_name'],$dst);

           if($file)
           {

           $sql2="UPDATE teacher SET name='$t_name',description='$t_des',image='$dst_db' WHERE id='$id'";


           }

           else{

           $sql2="UPDATE teacher SET name='$t_name',description='$t_des' WHERE id='$id'";

           }

           $result2=mysqli_query($data,$sql2);

           if($result2){

           	 header('location:admin_view_teacher.php');
           }
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
  	
  	label

  	{
  		display:inline-block;
  		width: 150px;
  		text-align: right;
  		padding-top: 10px;
  		padding-bottom: 10px;
  	}

  	.form_deg
  	{
  		background-color: skyblue;
  		width: 600px;
  		padding-top: 70px;
  		padding-bottom: 70px;
  	}
  </style>

</head>
<body>

	<?php
	include 'admin_sidebar.php';
	?>
  

  <header class="header">

  	<a href="">Admin Dashboard </a>
   <div class="logout">

   	<a href="logout" class="btn btn-primary">Logout</a>

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
			
			<a href="view_student.php">view student</a>
		</li>
		<li>
			
			<a href="admin_add_teacher.php">Add teacher</a>
		</li>
		<li>
			
			<a href="admin_view_teacher.php">view teacher</a>
		</li>
		<li>
			
			<a href="">Add courses</a>
		</li>
		<li>
			
			<a href="">View Courses</a>
		</li>


	</ul>
</aside>
  <div class="content">

  	 <center>
  	
  	<h1>update teacher data</h1>
  	<form  class="form_deg" action="admin_update_teacher.php" method="POST" enctype="multipart/form-data">
  	<input type="text" name="id" value="<?php echo "{$info['id']}" ?>" hidden>

  			<div>
  				<label>Teacher name</label>
  				<input type="text" name="Name" value="<?php echo "{$info['Name']}" ?>">
  			</div>
  			<div>
  				<label>About Teacher</label>
  				<textarea name="description" rows="4"><?php echo "{$info['description']}" ?></textarea>
  			</div>
  			<div>
  				<label>Teacher old Image</label>
  				<img  width="100px" height="100px" 
  				src="<?php echo "{$info['image']}" ?>">
  			</div>
  			<div>
  				<label>Choose Teacher New Image</label>
  				<input type="file" name="image" >
  			</div>
  		
         <div>
  			
  				<input type="submit" class="btn btn-success" name="update_teacher" >
  			</div>

  		</form>
  	
  	</center>
  </div>
</body>
</html>