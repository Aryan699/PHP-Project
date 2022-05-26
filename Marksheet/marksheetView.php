<?php
session_start();
if(!isset($_SESSION["full_name"])){
  header("location:registration/register.php");
}


require_once "config.php";
$sql = "SELECT * FROM marksheet";
$result=mysqli_query($conn,$sql)
?>



 




<html>

    <head><title>Marksheet : View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="registration/form.css?v=<?php echo time(); ?>">

</head>
    <body>
    <div class="nav-bar">


<ul class="nav-links">
    <li> <a href="/index.php"> Home </a></li>
    <li> <a href="registration/logout.php"> Logout </a></li>


</ul>


</div>


        
        
    <table class="table  table-dark"" border="1">
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Physics</th>
            <th>Programming</th>
            <th>Mathematics</th>
            
            
        </tr>
        
        <?php foreach ($result as $row){ ?>
            <tr>
                
            
                <td><?php echo$row['id']?></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['physics']?></td>
                <td><?php echo $row['programming']?></td>
                <td><?php echo $row['maths']?></td>
               
                
                
                
            </tr>
            

<?php 

 


} 


?>