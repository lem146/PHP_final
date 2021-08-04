
<!DOCTYPE html>
<html>
<head>
<title>Construction Inc. Signin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-img {
  /* The image used */
  background-image: url("crew/construction-banner.jpg");

  min-height: 380px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

/* Add styles to the form div */
.div {
  position: absolute;
  right: 0;
  margin: 20px;
  max-width: 300px;
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit button */
.btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
</style>
</head>
<body>
<h2>Admin Login</h2>

<div class="bg-img">
    <form method="post" action="signin.php" class="div">
        <div id="div_login">
            <h1>Login</h1>
            <div>
                <input type="text" class="textbox" id="f_username" name="f_username" placeholder="Username" />
            </div>
            <div>
                <input type="password" class="textbox" id="f_password" name="f_password" placeholder="Password"/>
            </div>
            <div>
                <input class="btn" type="submit" value="Submit" name="but_submit" id="but_submit" />
            </div>
        </div>
    </form>
</div>


</body>
</html>


<?php
include "config.php";


if(isset($_POST['but_submit'])){

    $username = mysqli_real_escape_string($con,$_POST['f_username']);
    $password = mysqli_real_escape_string($con,$_POST['f_password']);


    if ($username != "" && $password != ""){

        $sql_query = "SELECT count(*) as cntUser from f_users where f_username='" . $username ."' and f_password='" . $password . "'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['f_username'] = $username;
            header('Location: welcome.php');
        }else{
            echo "Invalid username and password";
        }

    }

}
?>