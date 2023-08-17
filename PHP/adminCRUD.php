
<?php require "config/config.php"; ?>


<?php

session_start();
if($_SESSION['is_login']){
    // keep the user on the page 
    $username=$_SESSION['username'];
    if($username!='Sanjana1673'){
        // password is sanju123
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous");>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/sweetalert.js"></script>
    <link rel="shortcut icon" type="image/jpg" href="favicon.jpeg"/>
    <title>Admin Page .. database entries</title>
    <script>
function myfunc(){
    alert("You're about to delete an entry that cant be recovered ,click on ok if you confirm on deletion ?");


}
       </script>

       
<?php
// DELETE DATA
if(isset($_GET['del'])){
    //echo "it is set.";
    $id=$_GET['del'];
    // $query="DELETE FROM users WHERE id=$id";
    echo "<script>myfunc();</script>";
    $query="DELETE FROM customer WHERE id=$id";
    $fire=mysqli_query($con,$query) or die("cannot delete the data from database.".mysqli_error($con));
    if($fire)
     {
         echo " data of user id no.  ".$id=$_GET['del']." deleted from database.";
      
}
}
?>
    <style>
.myclass{
  position:relative;
  left:1000px;
    width:200px;
    top:50px;
    height:50px;
   background-color:white;
   color:black;

}
.h3SIGNUP{
    position:relative;
  left:1000px; 
}
.H3USERDATA{
    position: relative;
    left:50px;
    top:50px;
}

        </style>
</head>
<body>
    <div id="wrapper">
        <!-- nav bar -->
        <?php
        require "include/navbar.php"
        ?>
   <div class="container " >
       <div class="row">
           <div>
               <div >
           
               <br>
               <center><h3 class="h3USERDATA"> User Data : </h3><br></center>
           
            

            <!-- PRINTING THE USER DATA -->
            <table class="table table-striped table-hover table-bordered" >
                <thead class="blue white-text">
                    <tr>
                        <th>Fullname</th>
                        <th>Username</th>
                        <th>Email</th>
                       
                        <th colspan="2"><center>Operations</th></center>
                    </tr>
                </thead>
                <tbody>
<?php

// $query="SELECT * FROM users";
$query="SELECT * FROM customer";
$fire=mysqli_query($con,$query) or die("cant fetch data from database.".mysqli_error($con));

//if($fire) echo "We got inside the Database boisss!"

//echo mysqli_num_rows($fire);

if(mysqli_num_rows($fire)>0){
//    $users=mysqli_fetch_assoc($fire);

    while( $users=mysqli_fetch_assoc($fire)){  ?>
    <tr>
        <td><?php echo $users['full_name']?></td>
        <td><?php echo $users['username']?></td>
        <td><?php echo $users['email']?></td>
        
       <td > <a class="btn btn-sm btn-danger fas fa-trash-alt"  href="<?php $_SERVER['PHP_SELF']?>?del=<?php echo $users['id']?>" > Delete</a> </td></button>
        
        <td> <a class="btn btn-sm btn-warning fas fa-pen" href="update.php?upd=<?php echo $users['id'] ?>" > Update</a></td>
    </tr>

    <?php
    }
    }
     // associative array h isiliye key name likhna h [''] aise
                      // agr array hota toh [0] or [1] aise dete

                      else { ?>
                      <tr>
                          <td colspan="3" class="text-center">
                              <h2 class="text-muted">There is no data yet.</h2>
                          </td>
                      </tr>
                      <?php 
                    } ?>

</tbody>
</table>

       <hr>
       <br>
          <center>
<a href="http://localhost/PHP/search.php">  <button type="button" class="btn btn-dark">Search From the data </button></a>
<a href="http://localhost/PHP/pagination.php">  <button type="button" class="btn btn-dark">View All data in pages</button></a>
<a href="http://localhost/PHP/adminCRUD.php"> <button type="button" class="btn btn-dark">Perform Operations on the data entries</button></a>
<a href="http://localhost/PHP/dashboard.php"> <button type="button" class="btn btn-dark">Go to your Dashboard</button></a>
   </center>
   <hr>
   <br>
</body>
</html>

