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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search the database entries..</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous");>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="shortcut icon" type="image/jpg" href="favicon.jpeg"/>
</head>
<body>
    <div class="container my-5">
        <form method="POST"><br>
            <input type="text" placeholder="Search Data" name="search">
            <button class="btn btn-dark btn-sm" name="submit">Search</button> 
        </form>  
        <hr><br>
        <div class="containermy-5 " >
            <table class="table">
                <?php
if(isset($_POST['submit'])){
    $search=$_POST['search'];
    // $sql="SELECT * from `customer` WHERE id='$search' or full_name='$search' or username='$search' or email='$search' ";
    $sql="SELECT * from `customer` WHERE id like '%$search%' or full_name like '%$search%' or username like '%$search%' or email like '%$search%' ";
    $result=mysqli_query($con,$sql);
    if($result){
        //$num=mysqli_num_rows($result);
        //echo "There are " .$num. " Entries/rows in the Database Right now!" ;
        
        if(mysqli_num_rows($result)>0){
            echo '<thead>
            <tr>
            <th> ID no. </th>
            <th>FullName </th>
            <th>Username</th>
            <th>Email</th>
            </tr>
            </thead>

              ';
              // if 2 person's fullname is same , only first entry will be searched if not using while
              while($row=mysqli_fetch_assoc($result)){
             echo ' <tbody>
              <tr>
              <td><a href="fromsearchtodashboard.php?data='.$row['id'].'">'.$row['id'].'</a></td>
              <td>'.$row['full_name'].'</td>
              <td>'.$row['username'].'</td>
              <td>'.$row['email'].'</td>

              </tr>
              </tbody>

             '; }

        } else {
            //no of rows less than 1 
            echo '<h2 class=text-danger>Data not Found</h2>';
        }
    }
}

?>


            </table>
        </div>
    </div>
    <center>

 <a href="http://localhost/PHP/search.php">  <button type="button" class="btn btn-dark">Search From the data </button></a>
<a href="http://localhost/PHP/pagination.php">  <button type="button" class="btn btn-dark">View All data in pages</button></a>
<a href="http://localhost/PHP/adminCRUD.php"> <button type="button" class="btn btn-dark">Perform Operations on the data entries</button></a>
<a href="http://localhost/PHP/dashboard.php"> <button type="button" class="btn btn-dark">Go to your Dashboard</button></a>

    </center>
</body>

</html>
