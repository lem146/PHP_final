<?php
session_start();
$host = "localhost"; /* Host name */
$user = "lem146"; /* User */
$password = "Student_4247737"; /* Password */
$dbname = "lem146"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
?>



    
    
    
    


