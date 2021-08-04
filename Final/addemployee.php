<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Employee">
  <meta name="author" content="Leah">

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
  #employees {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#employees td, #employees th {
  border: 1px solid #ddd;
  padding: 8px;
}

#employees tr:nth-child(even){background-color: #f2f2f2;}

#employees tr:hover {background-color: #ddd;}

#employees th {
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
$sql = "SELECT employee_id, efname, elname, hiredate, enddate, ephone FROM employees";
if($employee = mysqli_query($con, $sql)){
    if(mysqli_num_rows($employee) > 0){
        echo '<table border="1" align="center" id="employees">';
        echo "<tr>";
            echo "<th>Employee #</th>";
            echo "<th>First Name</th>";
            echo "<th>Last Name</th>";  
            echo "<th>Hire Date (year-month-date)</th>"; 
            echo "<th>Leave Date (year-month-date)</th>"; 
            echo "<th>Employee Phone Number</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($employee)){
            echo "<tr>";
                echo "<td>" . $row['employee_id'] . "</td>";
               
                echo "<td>" . $row['efname'] . "</td>";
            
                echo "<td>" . $row['elname'] . "</td>";

                echo "<td>" . $row['hiredate'] .  "</td>";

                echo "<td>" . $row['enddate'] .  "</td>";
             
                echo "<td>" . $row['ephone'] .  "</td>";
            echo "</tr>";
       
        }
echo "</table>";
        // Free result set
        mysqli_free_result($employee);
    } else{
        echo "No records matching your query were found.";
    }
  } else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($con);
}


if($_POST){
$fname = mysqli_real_escape_string($con, $_POST['efname']);
$lname = mysqli_real_escape_string($con, $_POST['elname']);
$hiredate = mysqli_real_escape_string($con, $_POST['hiredate']);
$endate = mysqli_real_escape_string($con, $_POST['enddate']);
$phone = mysqli_real_escape_string($con, $_POST['ephone']);



   
   //insert user input 
   $sql = "INSERT INTO employees (efname, elname, hiredate, enddate, ephone) 
   VALUES ( '$fname', '$lname', '$hiredate', '$endate', '$phone')";
   
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



<h1 align="center">Add Employee Info</h1>
<form role="form" enctype='multipart/form-data' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <fieldset>
            

            <div class="form-group">
                <label for="employees">First Name</label>
                <input type="text" name="efname" placeholder="First Name" class="form-control" required/>
            </div>

            <div class="form-group">
                <label for="employees">Last Name:</label>
                <input type="text" name="elname" placeholder="Last Name" class="form-control" required/>
            </div>

            <div>
                <lable for="employees">Hire Date</lable>
                <input type="number" name="hiredate" placeholder="Hire Date (year month day no dashes or slashes)" class="form-control" required/>                
            </div>

            <div>
                <lable for="employees">End Date</lable>
                <input type="number" name="enddate"  class="form-control" />                
            </div>

            <div>
                <lable for="employees">Phone Number</lable>
                <input type="number" name="ephone" placeholder="Phone Number" class="form-control" required/>
            </div>

                    <div class="form-group">
                <input type="submit" name="upload" value="upload" class="btn btn-primary" required/>
            </div>

    </fieldset>
</form>
  
  </div>
  </from>
  </div>
</body>
</html>

