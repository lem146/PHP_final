<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Construction Inc.</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<style>
.responsive {
  width: 100%;
  height: auto;
}
</style>
<img src="crew/construction-banner.jpg" alt="Nature" class="responsive">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="welcome.php">Home
             <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="addemployee.php">Employee list</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="addprojects.php">Project list
             
              </a>
          </li>
             <li class="nav-item">
            <a class="nav-link" href="readcomments.php">View Contacts</a>
          </li>
          </li>
             <li class="nav-item">
            <a class="nav-link" href="logout.php">LogOut</a>
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
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <style>
  #projects {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#projects td, #projects th {
  border: 1px solid #ddd;
  padding: 8px;
}

#projects tr:nth-child(even){background-color: #f2f2f2;}

#projects tr:hover {background-color: #ddd;}

#projects th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #1E90FF;
  color: white;
}
</style>


<?php
session_start();

include ("config.php");
 
if (!isset($_SESSION['f_username']))
{
    header("Location: signin.php");
    die();
}
$username = $_SESSION['f_username'];



 
// Attempt select query execution
$sql = "SELECT customer_id, fname, lname, cus_email, cus_phone, cus_address, request, date_contact FROM customers";
if($project = mysqli_query($con, $sql)){
    if(mysqli_num_rows($project) > 0){
        echo '<table border="1" align="center" id="projects">';
        echo "<tr>";
            echo "<th>Customer #</th>";
            echo "<th>First Name</th>";
            echo "<th>Last Name</th>";  
            echo "<th>Email </th>"; 
            echo "<th>Phone #</th>"; 
            echo "<th>Address</th>"; 
            echo "<th>Request</th>"; 
            echo "<th>Contact Date</th>"; 
         
            echo "</tr>";
        while($row = mysqli_fetch_array($project)){
            echo "<tr>";
                echo "<td>" . $row['customer_id'] . "</td>";
                echo "<td>" . $row['fname'] . "</td>";
            
                echo "<td>" . $row['lname'] . "</td>";

                echo "<td>" . $row['cus_email'] .  "</td>";
                echo "<td>" . $row['cus_phone'] .  "</td>";
                echo "<td>" . $row['cus_address'] .  "</td>";
                echo "<td>" . $row['request'] .  "</td>";
                echo "<td>" . $row['date_contact'] .  "</td>";
            echo "</tr>";
       
        }
echo "</table>";
        // Free result set
        mysqli_free_result($project);
    } else{
        echo "No records matching your query were found.";
    }
  } else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($con);
}
?>

</body>

</html>