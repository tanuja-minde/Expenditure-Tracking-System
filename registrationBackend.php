<?php
session_start();
    $_SESSION["username"] = $_POST["username"];

    $_SESSION["email"] = $_POST["email"];
    require 'email.php';

    $_SESSION["pass"] = $_POST["pass"];
    $password = password_hash($password, PASSWORD_DEFAULT);  
    $_SESSION["contact"] = $_POST["contact"];

    include('connection.php');


    $query = "select username from registration where username = '".$user."'";

    $result = mysqli_query($connection,$query);
    $ans = mysqli_num_rows($result);

    if($ans>0)
    {
        echo "<script>alert('Username already exists')</script>";
        header("Location: register.html");
    }
    else
    {        
        // $query = "insert into registration values('".$user."','".$email."','".$password."','".$number."')";
        // $result = mysqli_query($connection,$query) or die("Not working");   

        header("Location: otp.php");
    }


?>