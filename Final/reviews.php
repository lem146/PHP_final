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

<meta name="viewport" content="width=device-width, initial-scale=1">


<style>
.tcontainer {
  border: 2px solid #ccc;
  background-color: #eee;
  border-radius: 5px;
  padding: 16px;
  margin: 16px 0;
}

.tcontainer::after {
  content: "";
  clear: both;
  display: table;
}


.tcontainer span {
  font-size: 20px;
  margin-right: 15px;
}

@media (max-width: 200px) {
    .tcontainer {
        text-align: center;
    }
}

</style>

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


  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Reviews from past clients</h1>
    </div>
  </div>
  
</div>




<?php

include ("config.php"); 

$sql = "SELECT * FROM reviews";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
          
            //qurery through to input new data
        while($row = mysqli_fetch_array($result)){

echo "<div class='tcontainer'>"; 
    echo "<p> <span> <b>" . $row['cus_name'] . "</b> </span> </p>"; 
    echo "<p align='center'> <span>" . $row['cus_review'] . "</span> </p>";
 echo "</div>";
        }
 // error message
 mysqli_free_result($result);
} else{
    echo "No records matching your query were found.";
}
} else{
echo "ERROR: Could not execute $sql. " . mysqli_error($con);
}

//display user's name send them to login if they are not logged in 

// Close connection
mysqli_close($con);
?>

<div align="center">
  <button  onclick="window.location='post.php'">Write a review</button>
</div>
<br><br><br>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
               


</body>
</html>