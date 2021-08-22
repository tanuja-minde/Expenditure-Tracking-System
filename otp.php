<?php
session_start();


if(isset($_POST["button"]))
{
    include('connection.php');
    $user = $_SESSION["username"];

    $email = $_SESSION["email"];

    $password = $_SESSION["pass"];
    $password = password_hash($password, PASSWORD_DEFAULT);  
    $number = $_SESSION["contact"];

    $otp = $_POST["otp2"];
    $otp = (int)$otp;
    
    $otp1 = $_SESSION["otp3"];

    if($otp==$otp1)
    {
        $query = "insert into registration values('".$user."','".$email."','".$password."','".$number."')";
        $result = mysqli_query($connection,$query) or die("Not working");   

        header('Location:login.php');
        session_destroy();
    }
    else
    {
        header('Location:otp.php');
    }
}
?>

<!DOCTYPE html>
<html>
    <form method = "post">
        <table>
            <tr>
                <td> OTP </td>
                <td><input type = "text" name = "otp2"></td>
                <td><button type = "submit" name = "button">Check</button>
            </tr>
        </table>
    </form>
</html>