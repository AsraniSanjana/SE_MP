
<style>
.mycss{
	color: black;
    border:1px solid #000;
    background: lightseagreen;
    padding: 10px;
}
.bg-img{
    background-image:url('images/covidimg.png');
    background-size:cover;
    background-repeat:no-repeat;
    color:white;
    font-size: 40px;
    }
 


</style>
<?php require "config/config.php"; ?>
<?php

//echo "<p class='mycss'>This is a text in PHP echo.</p>";
session_start();
if($_SESSION['is_login']){
    // keep the user on the page 
    $username=$_SESSION['username'];
}else {
    //else redirect on loginpage
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous");>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>User Dashboard...</title>
    <link rel="shortcut icon" type="image/jpg" href="favicon.jpeg"/>
    
</head>

<body >
<?php require "include/navbar.php" ?>
  <!-- <li class="nav-item dropdown">
      <div class="dropdown">
	  <a class="nav-link  dropdown-toggle"  id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
		Graphs
</a>
	  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
		<li><a class="dropdown-item" href="Home.html">CountryWise Graph</a></li>
		<li><a class="dropdown-item" href="igraphs.html">India StateWise Graph</a></li>
        </ul>
      
	</div>
   
      </li> -->
<div class="bg-img">
    <h1  class="mycss"> Welcome <?php echo $username  ?> !  .....You can now access all the functionalities of our website!</h1>    
    <!-- <input type="button" onClick="return myfunc();">button text</input>   -->
  
<?php
    if($username=='Sanjana1673'){ ?>
    <!-- password=sanjana123-->
    <center>
        <h1  class="mycss">Looks Like <?php echo $username  ?> is an Admin...<br><hr>
        <h2 class="text-success">  here are some pages only admins can visit!</h2><hr>
        <a href="http://localhost/PHP/adminCRUD.php"><button type="button" class="btn btn-primary">View All Database Entries & CRUD operations</button></a>
        <a href="http://localhost/PHP/search.php"><button type="button" class="btn btn-primary">Search From All Database Entries..with the access to each user's dashboard</button></a>
        <a href="http://localhost/PHP/pagination.php"><button type="button" class="btn btn-primary">View All Database Entries in parts</button></a><hr>
    </h1></center>
        <?php
    } ?>

<?php
// sonu's way to get the action column from database  ->
// if($_SESSION['is_login']){
//     // keep the user on the page 
//     $username=$_SESSION['username'];
//     $query = "SELECT customer.action FROM customer";
//     $fire=mysqli_query($con,$query) or die("cannot select the data from database.".mysqli_error($con));
//     if($fire) echo " data of user id no.  ";

//     $action = mysqli_fetch_assoc($fire)['action'];

//     if (!is_null($action) && !empty($action)) {
//         echo $action;
//     }
// }else {
//     //else redirect on loginpage
//     header("Location:login.php");
// }
    



?>
<center>
<a href="Home.html"><button type="button" class="btn btn-secondary">View World's Covid Data Graphs</button></a>
<a href="igraphs.html"><button type="button" class="btn btn-success">View India's Covid data Graph</button></a>
<a href="http://localhost/PHP/surveyform.php"><button type="button" class="btn btn-info">Fill Out A Survey Form</button></a>
<a href="page2.html"><button type="button" class="btn btn-warning">Read more about covid</button></a>

<a href="http://localhost/PHP/coronaindex.php"><button type="button" class="btn btn-secondary">Covid data in table </button></a>
<a href="http://localhost/forum_project/"><button type="button" class="btn btn-success">Forum </button></a>
</center>








</div>
<hr>

<a href="logout.php">
<button class="fa fa-sign-out" type="button" class="btn btn-secondary" >Logout



   

 
 
</body>
</html>

