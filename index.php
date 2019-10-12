<?php
include('users/includes/config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
	$fullname=$_POST['fullname'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$contactno=$_POST['contactno'];
	$status=1;
	$query=mysqli_query($con,"insert into users(fullName,userEmail,password,contactNo,status) values('$fullname','$email','$password','$contactno','$status')");
  header('Location:users/index.php');
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/frontstyle.css">
    <title>SCMS | Home
    </title>
    <script>
      function userAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
        url: "check_availability.php",
        data:'email='+$("#email").val(),
        type: "POST",
        success:function(data){
        $("#user-availability-status1").html(data);
        $("#loaderIcon").hide();
      },
        error:function (){}
    });
  }
    </script>
</head>
<body  class="bggrad ">
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <a class="navbar-brand" href="#">SCMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link navber-light" href="#">How it Works</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin/index.php">Administrative Portal</a>
            </li>
          
          </ul>
        </div>
      </nav>

      <section class="container-fluid">
        <div class="row mt-3">
          <div class="col-lg-6">
            <h1 class="display-4 text-warning">Student Complaint Management System</h1>
            <h3 class="text-center text-light  display-4">BY</h3>
            <p class="text-center  text-light display-4">Talabi Blessing Oluwadamilola</p>
            <p class="text-center display-4 text-light">HC201703522</p>
            <p class="lead text-right text-light">Rev. Faleye E.O</p>
            <p class="lead text-right text-light">Supervisor</p>
          </div>
          <div class="col-lg-6 bg-light">
                <div class="card mb-2 rounded-0 shadow mt-3">
                  <p class="text-center lead mt-3">Students Registration</p><hr>
                  <div class="card-body">
                    
                    <form action="" method='POST' class="form-group">
                      <label for="fullname"><small>Full-Name *</small></label>
                      <input type="text" class="form-control rounded-0 mb-2 " required placeholder="Full Name" name="fullname">
                      <label for="email"><small class="mb-2 mt-4">E-mail *</small></label>
                      <input type="email" class="form-control rounded-0 " required id="email" onBlur="userAvailability()" placeholder="Valid E-mail" name="email">
                      <span id="user-availability-status1" style="font-size:12px;"></span>
                      <label for="password"><small class=" mt-4">Password *</small></label>
                      <input type="password" class="form-control rounded-0 " required name="password" placeholder="Password" id="">
                      <label for="mobile"><small class="mb-2 mt-4">Mobile Number *</small></label>
                      <input type="text" maxlength=10 class="form-control rounded-0" required placeholder="Mobile Number" name="contactno">
                      <div>
                        <button type="submit" name="submit" id="submit" class="btn btn-warning mt-3 rounded-0 btn-block">Submit</button>
                      </div>
                      <hr>
                      <p class="lead text-center">Already Registered <a href="users/index.php">SignIn</a></p>
                    </form>
                  </div>
                </div>
          </div>
        </div>
      </section>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>