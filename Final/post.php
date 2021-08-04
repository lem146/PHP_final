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
            <a class="nav-link" href="reviews.php">Reviews <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact
                   
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



 
 
  <?php
session_start();
//Connect to server
include ("config.php"); 
 


if($_POST){
 //query title and content
$cus_name = mysqli_real_escape_string($con, $_POST['cus_name']);
$cus_review = mysqli_real_escape_string($con, $_POST['cus_review']);

//insert user input 
$sql = "INSERT INTO reviews (cus_name, cus_review) VALUES ('$cus_name', '$cus_review')";

if($con->query($sql) === TRUE){
  echo "<p><center>Your Review Has Been Submitted</center></p>";
}
else
{
 echo "Error" . $sql . "<br/>" . $con->error;
 exit(0); //missing info
}

if (isset($_POST['submit'])) {
    //checking name
    if(empty($_POST['cus_name']))
    $msg_name = "You must supply your name";
    $name_subject = $_POST['cus_name'];
    $name_pattern = '/^[a-zA-Z ]*$/';
    preg_match($name_pattern, $name_subject, $name_matches);
    if(!$name_matches[0])
    $msg2_name = "Only alphabets and white space allowed";
    }

    // validation complete 
if(isset($_POST['submit'])){
    if($msg_name=="" && $msg2_name=="" && $msg_email=="" && $msg2_email=="" && $msg_package=="" && $msg_dt=="" && $msg2_dt==""&& $msg3_dt=="" && $msg_persons=="" && $msg2_persons=="" && $msg_facilities=="" && $msg2_facilities=="" && $msg_dis=="" && $msg2_dis=="" && $msg_agree=="" && $msg2_agree=="")
    $msg_success = "You filled this form up correctly";
    }
    
$con->close();
}
?>






<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<style type="text/css">
h1 {margin-bottom:20px}
input, label {margin-top:7px; margin-bottom:7px; color:
#000066; font-size: 18px; padding-right: 7px}
input[type='checkbox'] {margin-left: 5px}
.note {color: 
#ff0000}
.success_msg{color:
#006600}
</style>
</head>
<html>
<body>
<div class="container">
    <h3 align="center">Submit a Review</h3>

<form action="post.php" method=POST align="center" class="form-control">
    <label>Name:<span class="note">*</span>:</label><br>
  <input type="text" name="cus_name" placeholder="Name" size=40 maxlength=150 required>
  <?php echo "<p class='note'>".$msg_name."</p>";?>
  <?php echo "<p class='note'>".$msg2_name."</p>";?>
 
  <P><strong>Write a Review</strong><br>
  <textarea name="cus_review" placeholder="Review" rows=8 cols=40 wrap=virtual required></textarea>
  <P><input type="submit" name="submit" value="Submit"></input></p>
  <br><br><br>
  </from>
  </body>
  </html>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>