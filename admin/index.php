<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=($_POST['password']);
$ret=mysqli_query($con,"SELECT * FROM admin WHERE username='$username' and password='$password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="change-password.php";//
$_SESSION['alogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SCMS | Admin login</title>
	<link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="css/frontstyle.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body class="bggrad">

	<section class="container">
		<p class="text-center display-4 text-warning mt-4">Student Complaint Management System</p> <hr class="bg-warning">
		<div class="row mt-5">
			<div class="col-lg-4 offset-lg-4">
				<div class="card">
					<div class="card-header bg-warning">
						<p class="text-center lead">Administrator Login</p>
					</div>
					<div class="card-body">

						<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" class="form-group">
							<input type="text" placeholder='Administrator Username' name='username' class="form-control mt-3">
							<input type="password" placeholder='Password' name='password'  class="form-control mt-3">
							<div>
								<input type='submit' name='submit' class="btn mt-3 btn-block btn-warning" value='Submit'>
							</div>
						</form>

					</div>
				</div>


			</div>

		</div>
	</section>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>