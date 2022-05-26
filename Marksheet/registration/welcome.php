<?php 
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.Php");
}

if($_SESSION["roles"]=="Student"){
    header("location:marksheetView.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="welcome.css">
    

    <title>Welcome</title>
</head>

<body>
    <style>
        .nav-bar{
            display:flex;
            flex-direction:row;
        width: 20px;
        }
    </style>
    <nav id="main-menu">
     <ul class="nav-bar">
          <li class="nav-button-home"><a href="logout.php">logout</a></li>
          
          <li class="nav-button-products"><a href="../marksheet.php">marksheet</a></li>
     </ul>
</nav>
    


    
</body>
</html>