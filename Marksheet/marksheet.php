<?php
//This script will handle login
session_start();
if($_SESSION["roles"]=="student"){
    header("location:marksheetView.php");
}

require_once "config.php";
$name = $physics =  $maths = $programming = "";
$err = "";
// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){

    if(empty(trim($_POST['name'])) || empty(trim($_POST['programming'])) || empty(trim($_POST['physics'])) || empty(trim($_POST['maths'])))
    {
        $err = "Dont leave any fields empty ! ! !";
        echo $err;
    }
    else{
        $name = trim($_POST['name']);
        $programming = trim($_POST['programming']);
        $physics = trim($_POST['physics']);
        $maths = trim($_POST['maths']);
       
    }


    if (empty($err) ) {
        $sql = "INSERT INTO marksheet (name, physics, programming, maths) VALUES (?,?,?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "siii", $param_name, $param_physics, $param_programming, $param_maths);

            // Set these parameters
            $param_name = $name;
            $param_physics = $physics;
            $param_programming = $programming;
            $param_maths = $maths;
            

            // Try to execute the query
            if (mysqli_stmt_execute($stmt)) {
                header("location:marksheetView.php");
            } else {
                echo "Something went wrong... cannot redirect!";
            }
            
        }
        mysqli_stmt_close($stmt);
        
    }
    mysqli_close($conn);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marksheet Generator</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="registration/form.css">
</head>
<body>
    <form class="form-group" action="" method="post">
    <label for="name">Name</label>
    <input class="form-control" type="text" name="name">
    
    <br> <br>
    
    <label for="physics">Physics</label>
    <input class="form-control" type="number" name="physics">
    <br> <br>

  

  
    <label for="maths">Mathematics</label>
    <input class="form-control" type="number" name="maths">
    
   
<br> <br>

    <label for="programming">Programming</label>
    <input class="form-control" type="number" name="programming">

    <br> <br>
  
    <button class="btn btn-primary" type="submit">Submit</button>
    
    </form>
    
</body>
</html>