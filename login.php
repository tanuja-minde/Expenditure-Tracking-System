<?php
if(isset($_POST["submit"])){
  
    session_start();

    $_SESSION["username"] = $_POST["Username"];
    $password = $_POST["Pass"];

    include('connection.php');

    $query1 = "select * from registration where username = '".$_SESSION["username"]."'";
    $result1 = mysqli_query($connection,$query1) or die("not working");

    $data = mysqli_fetch_assoc($result1);


    $ans = mysqli_num_rows($result1);
    
    if($ans!=0)
    {
      if(password_verify($password, $data["password"]))
      {
        echo "<script> window.location = 'userDataTracking.php'; </script>";
    
      }
    }
    else
    {
        echo "<script> alert('wrong input username or password'); </script>";
        header("Location : login.php");
    }
    
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="login.css">
  </head>
  <body>

    <form autocomplete = "off" class="box" action="login.php" method="post">
      <h1>Login</h1>
      <input type="text" name="Username" placeholder="Username">
      <input type="password" name="Pass" placeholder="Password">
      <input type="submit" name="submit" value="Login"><p><b>Not a user ?</b> <a href = "register.html">Register here</a></p>
      <!-- <p><a href = "e_mail (1).php">Forgot Password ?</a><p> -->
    </form>


  </body>
</html>
