<?php require "config/config.php"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user dashboard from search page </title>
    <link rel="shortcut icon" type="image/jpg" href="favicon.jpeg"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous");>
    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet"> -->
    <link href='https://fonts.googleapis.com/css?family=Raleway:600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>

body { 
  margin: 0;
  background-color: #eee;
}

.jumbotron { 
  padding: 30px; /* fills out the jumbotron */
  background-color: #111;
}

.container {
  width: 1170px; /* specify a width */
  margin: 0 auto;  /* centers the container */
  padding: 0 15px; /* adds some padding to the left and right*/
}

.jumbotron .container { 
  max-width: 100%; /* allows the jumbotron to adjust on smaller widths */
  background-color: #222;
}

.jumbotron h1 { 
  text-align: center; /* centers the heading */
  color: #DDD;
  font-family: 'Raleway', Helvetica, Arial, sans-serif;
  font-weight: 600;
  text-transform: uppercase;
}
        </style>
</head>
<body>
   <?php
   $data=$_GET['data'];
   //echo $data;
   $sql="SELECT * FROM `customer` WHERE id=$data";
$result=mysqli_query($con,$sql);
if($result){
    $row=mysqli_fetch_assoc($result);
     //echo $row['full_name'];
    echo '<div class="jumbotron">
    <div class="container">
    
    <h1 class="display-4 text-center text-success">Welcome '.$row['full_name'].'</h1>
    <center>  <h3 class="text-danger">Your Email Address is : '.$row['email'].'</h3></center>
    </div>
   
  </div>
  <hr>
  <div class="container">
    <p>Hello '.$row['full_name'].'  (This is the admin accessing the user`s profile ) </p>
  <hr class="my-4">
  <p class="lead">
      <a class="btn btn-primary btn-lg btn-dark" href="search.php" role="button" > Back to the search page</a>
      
  </p>
 </div>
  ' ;

}
   ?>
   <center>
   <a href="http://localhost/PHP/dashboard.php"> <button type="button" class="btn btn-dark fas fa-backward"> Go to your Dashboard</button></a>
<a href="http://localhost/PHP/search.php">  <button type="button" class="btn btn-dark">Search From the data </button></a>
<a href="http://localhost/PHP/pagination.php">  <button type="button" class="btn btn-dark">View All data in pages</button></a>
<a href="http://localhost/PHP/adminCRUD.php"> <button type="button" class="btn btn-dark">Perform Operations on the data entries</button></a>
   </center>
</body>
</html>