<?php require "config/config.php"; ?>

<?php

session_start();
if($_SESSION['is_login']){
    // keep the user on the page 
    $username=$_SESSION['username'];
    if($username!='Sanjana1673'){
      // user isnt an admin, so wont be able to access this site..
        header("Location:login.php");
    }
}else {
    //else redirect on loginpage
    header("Location:login.php");
}
?>
 <?php
        require "include/navbar.php"
        ?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page ...pagination of all the database entries</title>
    <link rel="shortcut icon" type="image/jpg" href="favicon.jpeg"/>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/4.0.0/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous");> -->
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <style>
/*  for vertical divider */
table, th, td {
  text-align: center;
  border-right: 5px solid black;
  border-bottom: 5px solid black;
  background-color:lightsteelblue;
  }
  

</style>
</head>
<body>
   <div class="container my-5">
   <table class="table table-striped table-hover center" border="2" margin="2" cellspacing="3" >
     <thead>
         <th class="table-dark">ID no.</th>
         <th class="table-dark">Fullname.</th>
         <th class="table-dark">Username</th>
         <th class="table-dark">Email</th>
     </thead>
      <tbody>
       <?php
$sql="SELECT * FROM `customer`  ";
$result=mysqli_query($con,$sql);
$num=mysqli_num_rows($result);
$numberPages=5; // number of rows in each page 
$totalPages=ceil($num/$numberPages);

// echo $totalPages;
// echo $num;  -> to count the number of rows in database
// CREATING PAGINATION BUTTONS
for($btn=1;$btn<=$totalPages;$btn++){
echo '<button class="btn btn-dark mx-2 my-2"><a href="pagination.php?page='.$btn.'" class="text-light">'.$btn.'</a></button>';

}
if(isset($_GET['page'])){
    $page=$_GET['page'];
    //echo $page;
}
else {
  $page=1;
}
//numberPages=3
// page no. 1----->0,3   ----> (3-1)*3=6
// page no. 2----->3,3   ----> (2-1)*3=3
// page no. 3----->6,3   ----> (3-1)*3=6
// (pnum-1)*$numberPages
$startinglimit=($page-1)*$numberPages;
$sql="SELECT * FROM `customer` limit ".$startinglimit.','.$numberPages;
$result=mysqli_query($con,$sql);

while($row=mysqli_fetch_assoc($result)){
    echo ' <tr>
    <th>'.$row['id'].'</th>
    <th>'.$row['full_name'].'</th>
    <th>'.$row['username'].'</th>
    <th>'.$row['email'].'</th>

  </tr>';
}
       ?>

</tbody>
</table>
   </div> 
   <center>
   <a href="http://localhost/PHP/search.php">  <button type="button" class="btn btn-dark">Search From the data </button></a>
<a href="http://localhost/PHP/pagination.php">  <button type="button" class="btn btn-dark">View All data in pages</button></a>
<a href="http://localhost/PHP/adminCRUD.php"> <button type="button" class="btn btn-dark">Perform Operations on the data entries</button></a>
<a href="http://localhost/PHP/dashboard.php"> <button type="button" class="btn btn-dark">Go to your Dashboard</button></a>
   </center>
</body>
</html>