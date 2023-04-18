<?php
require("auth.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: #ffffff;
        }
     .container {
        font-family: sans-serif;
        text-align: center;

     }
     .fname {
        font-weight: bold;
        font-size: 3rem;
        margin-block: 0;
     }
     .sub {
      font-size: 1.5rem;
      color: #7d7971;
     }
     .main {
        background-color: #3939a7;
        padding: 1rem;
       }
     .index {
        color: white;
        font-size: 1rem;
        font-weight: bold;
        text-decoration: none;
     }
     
     
    </style>
</head>
<body>
    <div class="container">
     <img class="img" src="image/download.png" alt="correct" width="" height="">
    <p class="fname"><?php echo "Thank You!"." ".$_SESSION['fname'];?></p>
    <p class="sub">Your submission has been received</p>
    <button class="main"><a class="index" href="constra/index.php">Go To Our Website</button>
    </div>
</body>
</html>