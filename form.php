<?php
require('connection.php');
session_start();
if(isset($_REQUEST['fname']))
{
  $fname = $_REQUEST['fname'];
  $lname = $_REQUEST['lname'];
  $email = $_REQUEST['email'];
  $mobile = $_REQUEST['mobile'];
  $country = $_REQUEST['country'];

$insert_query = mysqli_query($connection,"insert into contact_form set Firstname='$fname',  Lastname='$lname', Email='$email', Mobile='$mobile', Country='$country'");

if($insert_query)
{
 
$msg = '<div>
<p>'.ucfirst($fname)." ".($lname).' has submitted contact form.</p>
<p><b>First Name:</b> '.($fname).'</p>
<p><b>Last Name:</b> '.($lname).'</p>
<p><b>Email:</b> '.($email).'</p>
<p><b>Mobile:</b> '.($mobile).'</p>
<p><b>Country:</b> '.($country).'</p>
</div>';

include_once("smtpmail/class.phpmailer.php");
require ('smtpmail/PHPMailerAutoload.php');
$email = "praveenshiva916@gmail.com"; 
$mail = new PHPMailer;
$mail->IsSMTP();
$mail->SMTPAuth = true;                 
$mail->SMTPSecure = "tls";      
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587; 
$mail->Username = "praveenshiva916@gmail.com";       
$mail->Password = ""; //App password Here
$mail->FromName = "PRAVEEN B";
$mail->AddAddress($email);
$mail->Subject = "Enquiry";
$mail->isHTML( TRUE );
$mail->Body =$msg;
$now = time();
if($mail->send())
   {
    $success =  "Feedback submitted successfully";
   
   }if($insert_query==1){
  

$_SESSION['fname'] = $fname;
$_SESSION['lname'] = $lname;
header("location: submit.php");  }
else{
echo "<div class='form'><h3>Username/password is incorrect</h3><br>Click here to <a href='login.php'>login</a></div>";
}

 }
}
else{
  ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" type="text/css" rel="stylesheet">
    <title>Contact form</title>
</head>
<body>
<div class="container">
  <div class="header"> 
    <h1>Contact Us</h1>
  </div>
    <form class="form" action="" method="POST">
  <div class="form-control">      
    <label for="fname">First Name</label>
    <input type="text" name="fname" placeholder="Your Name" required>
  </div> 
  <div class="form-control">
    <label for="lname">Last Name</label>
    <input type="text" name="lname" placeholder="Your Name" required>
  </div> 
  <div class="form-control">
    <label for="email">Email</label>
    <input type="text" name="email" placeholder="Your Email" required>
  </div>
  <div class="form-control">
    <label for="mobile">Mobile Number</label>
    <input type="number" name="mobile" placeholder="Your Number" required>
  </div> 
  <div class="form-control">
    <label for="country">Country</label>
    <select class="select" name="country" id="country">
        <option value="india">India</option>
        <option value="china">pakistan</option>
        <option value="america">Australia</option>
        <option value="england">South Africa</option>
        <option value="russia">England</option>
    </select>
    
  </div>
   <div>
        <input class="submit" type="submit" value="submit">
   </div>

</form>



</div> 
<?php } ?>   
</body>
</html>