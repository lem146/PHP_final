

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
$sql = "SELECT project_id, p_title, p_description, fp_customer, fp_employee FROM f_projects";
if($project = mysqli_query($con, $sql)){
    if(mysqli_num_rows($project) > 0){
        echo '<table border="1" align="center" id="projects">';
        echo "<tr>";
            echo "<th>Project #</th>";
            echo "<th>Title</th>";
            echo "<th>Description</th>";  
            echo "<th>Customer #</th>"; 
            echo "<th>Employee #</th>"; 
         
            echo "</tr>";
        while($row = mysqli_fetch_array($project)){
            echo "<tr>";
                echo "<td>" . $row['project_id'] . "</td>";
                echo "<td>" . $row['p_title'] . "</td>";
            
                echo "<td>" . $row['p_description'] . "</td>";

                echo "<td>" . $row['fp_customer'] .  "</td>";
                echo "<td>" . $row['fp_employee'] .  "</td>";
             
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



if($_POST){
$title = mysqli_real_escape_string($con, $_POST['p_title']);
$description = mysqli_real_escape_string($con, $_POST['p_description']);
$customer = mysqli_real_escape_string($con, $_POST['fp_customer']);
$employee = mysqli_real_escape_string($con, $_POST['fp_employee']);


   
   //insert user input 
   $sql = "INSERT INTO f_projects (p_title, p_description, fp_customer, fp_employee) 
   VALUES ('$title', '$description', '$customer', '$employee')";
   
   if($con->query($sql) === TRUE){
    echo "Record Added Sucessfully";
   }
   else
   {
    echo "Error" . $sql . "<br/>" . $con->error;
   }
   $con->close();
   }
?>



<style>

#content{
    width: 50%;
    margin: 20px auto;
    border: 1px solid #cbcbcb;
}
form{
    width: 50%;
    margin: 20px auto;
}
form div{
    margin-top: 5px;
}
#img_div{
    width: 80%;
    padding: 5px;
    margin: 15px auto;
    border: 1px solid #cbcbcb;
}
#img_div:after{
    content: "";
    display: block;
    clear: both;
}
img{
    float: left;
    margin: 5px;
    width: 300px;
    height: 140px;
}
</style>



<h1 align="center">Add Project Info</h1>
<form role="form" enctype='multipart/form-data' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <fieldset>

            <div class="form-group">
                <label for="f_projects">Project Title</label>
                <input type="text" name="p_title" placeholder="Project Title" class="form-control" />
            </div>

            <div class="form-group">
                <label for="f_projects">Project Description:</label>
                <input type="text" name="p_description" placeholder="Project Description" class="form-control" />
            </div>

            <div>
                <lable for="f_projects">Customer's #</lable>
                <input type="number" name="fp_customer" placeholder="Customer #" class="form-control" />                
            </div>

            <div>
                <lable for="f_projects">Employee's #</lable>
                <input type="number" name="fp_employee" placeholder="Employee's #" class="form-control" />
            </div>


            <div class="form-group">
                <input type="submit" name="upload" value="upload" class="btn btn-primary" />
            </div>

    </fieldset>
</form>
  
  </div>
  </from>
  </div>
</body>
</html>
