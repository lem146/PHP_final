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
<img src="crew/construction-banner.jpg" alt="Nature" class="responsive" >

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
            <a class="nav-link" href="addprojects.php">Project list</a>
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

    <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Construction Inc.</h1>
        <p class="lead">Welcome Admin</p>



  
  
  
  <?php

  include ("config.php"); 


//make sure user is logged in before they can post
if (!isset($_SESSION['f_username']))
{
    header("Location: signin.php");
    die();
}
?>