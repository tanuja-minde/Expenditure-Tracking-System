<?php

$conn=mysqli_connect("localhost","root","","project");
$email=$_POST['email'];
$pass=$_POST['pass'];
$new_pass=$_POST['new_pass'];

$sql="select * from registration where email='$email'";
$new_sql="select * from registration where password='$pass'";

$result = mysqli_query($conn, $sql);
$new_result = mysqli_query($conn, $new_sql);

$row=mysqli_fetch_array($result);

$new_row=mysqli_fetch_array($new_result);
if($row > 0){



echo $row["password"];


require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer();
  
  //Enable SMTP debugging.
  $mail->SMTPDebug = 1;
  //Set PHPMailer to use SMTP.
  $mail->isSMTP();
  //Set SMTP host name
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
  //Set this to true if SMTP host requires authentication to send email
  $mail->SMTPAuth = TRUE;
  //Provide username and password
  $mail->Username = "bonishgarg@gmail.com";
  $mail->Password = "bonish@2637";
  //If SMTP requires TLS encryption then set it
  $mail->SMTPSecure = "false";
  $mail->Port = 587;
  //Set TCP port to connect to
  
  $mail->From = "bonishgarg@gmail.com";
  $mail->FromName = "Bonish";
  
  $mail->addAddress($row["email"]);
  
  $mail->isHTML(true);
 
  $mail->Subject = "test mail";
  $mail->Body = "<i>this is your password:</i>".$row["password"];
  $mail->AltBody = "This is the plain text version of the email content";
  if(!$mail->send())
  {
   echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else
  {
   echo "Message has been sent successfully";
   header("Location:login.php");
  }


}
elseif ($new_row > 0) {

  $update="update registration set password='$new_pass' where password= '".$pass."'";
  $res = mysqli_query($conn,$update);


  
}
else
{
  header("Location:mailforget.html");
}




?>