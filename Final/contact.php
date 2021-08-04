<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="contact">
  <meta name="author" content="Leah McCoy">

  <title>Construction Inc.</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 

</head>

<body>

<!--Just a little banner to make it a little prettier!-->
<style>
.responsive {
  width: 100%;
  height: auto;
}
</style>
  <img src="otherbanner.jpg" alt="Construction" class="responsive">

  
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.html">Home
       
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ourprojects.html">Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="meetourteam.html">Meet Our Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reviews.php">Reviews</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact
                   <span class="sr-only">(current)</span>
                   </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Construction Inc.</h1>
        <p class="lead">General Contractor in Central Pennsylvania</p>
        <ul class="list-unstyled">
              <li>Open Mon-Fri 8 a.m. to 5 p.m.</li>      
        </ul>
      </div>
    </div>
  </div>
<!--page title!-->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Contact Us</h1>
        <p>Call us at: (717)111-2222 or</p>
        <p class="lead">Send us a message:</p>
      </div>
    </div>
  </div>





  <?php
session_start();

//contact to server
include ("config.php");

if($_POST){
 //query title and content
$fname = mysqli_real_escape_string($con, $_POST['fname']);
$lname = mysqli_real_escape_string($con, $_POST['lname']);
$email = mysqli_real_escape_string($con, $_POST['cus_email']);
$address = mysqli_real_escape_string($con, $_POST['cus_address']);
$phone = mysqli_real_escape_string($con, $_POST['cus_phone']);
$request = mysqli_real_escape_string($con, $_POST['request']);


//insert user input 
$sql = "INSERT INTO customers (fname, lname, cus_email, cus_address, cus_phone, request) VALUES ('$fname', '$lname', '$email', '$address','$phone', '$request')";

//let user know it worked
if($con->query($sql) === TRUE){
  echo "<p><center>Your Request Has Been Submitted</center></p>";
}
else
{
  //something went wrong
 echo "Error" . $sql . "<br/>" . $con->error;
}
$con->close();
}
?>






<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

</style>
</head>
<html>
<body>
<form action="contact.php" method=POST align="center" class="form-control">
    <p><strong>First Name:</strong><br>
  <input type="text" name="fname" placeholder="First Name" size=40 maxlength=150 required>
  <p><strong>Last Name:</strong><br>
  <input type="text" name="lname" placeholder="Last Name" size=40 maxlength=150 required>
  <p><strong>Phone Number: </strong><br>
  <input type="phone" name="cus_phone" placeholder="Phone Number" required>
  <p><strong>Email:</strong><br>
  <input type="email" name="cus_email" placeholder="Email" size=40 maxlength=150 required>
  <p><strong>Address:</strong><br>
  <input type="address" name="cus_address" placeholder="Address" size=40 maxlength=150 required>
  <p><strong>Briefly Describe Your Request:</strong><br>
  <textarea name="request" placeholder="Request" rows=8 cols=40 wrap=virtual required></textarea>
  <p><input type="submit" name="submit" value="Submit"></p>
  <br><br><br>
  </from>
  </body>
  </html>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>