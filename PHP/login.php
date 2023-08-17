<?php require "config/actions.php"; ?>
<?php
session_start();
?>

<!-- config b import karke dekha -->


<?php

if(!isset($_SESSION['is_login'])){

if(isset($_POST['btn_login'])){
   // echo "processing login...";
  $username=mysqli_real_escape_string($con, trim($_POST['username']));
  $password=mysqli_real_escape_string($con, md5(trim($_POST['password'])));

  echo "processing login of username " .$username . "....";

//   $query="SELECT * FROM users WHERE username='$username' AND password='$password'";
// $query="SELECT * FROM customer WHERE username='$username' AND password='$password'";
$query="SELECT * FROM customer WHERE username='$username' AND password='$password' and status='active'";
  $fire=mysqli_query($con,$query);
  if($fire){
  if(mysqli_num_rows($fire)==1){
     
     $_SESSION['is_login']=true;
     $_SESSION['username']=$username;
    echo "Welcome ".$_SESSION['username'];
    header("Location:dashboard.php");
  }
     // username : SANA , password : 12345
     // amrita , 23456

  else {
      echo "Invalid Username or Password.";
      echo "<br> you need to register first!";
      
  
  } 
}
} }
else {
    header("Location:dashboard.php");
}
?>

<?php
// DELETE DATA
if(isset($_GET['del'])){
    //echo "it is set.";
    $id=$_GET['del'];
    // $query="DELETE FROM users WHERE id=$id";
    $query="DELETE FROM customer WHERE id=$id";
    $fire=mysqli_query($con,$query) or die("cannot delete the data from database.".mysqli_error($con));
    if($fire) echo " data of user id no.  ".$id=$_GET['del']." deleted from database.";
}
// else{
//     echo "it is not set.";
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous");>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="shortcut icon" type="image/jpg" href="favicon.jpeg"/>
    <style>

        </style>
</head>
<body>
<?php require "include/navbar.php" ?>
    <div>
   <div class="container " >
       <div class="row">
           <div class="col-lg-4 col-lg-offset-4col-xs-12">
           <h3 >Login : </h3>
           <hr>

<div>
    <p class="bg-success text-white px-4">
        <?php
        if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];}
        else{
            $_SESSION['msg']='You are logged out.';
        }
        ?>
    </p>
</div>

           <hr>
           <?php
           if(isset($_GET['msg'])) echo $_GET['msg'];
           ?>

            <form name="signup" id="signup" action ="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
           
            <div class="form-group" >

                <div class="form-group myclass" >
                <label for="Username"></label>
                <span class="input-group-text"><i class="fa fa-user "></i>
                <input name="username" id="username" type="text" class="form-control" placeholder="Enter your username" required>
                 </div><br></span>


            <div class="form-group myclass" >
                <label for="Password"></label>
                <span class="input-group-text"><i class="fa fa-lock "></i>
                <input name="password" id="password" type="password" class=" form-control" placeholder="Enter your password" required > 
            </div><br></span>



            <div class="form-group myclass" >
                <label for="RememberMe"></label>
                <input name="RememberMe" id="RememberMe" type="checkbox" > Remember me
            </div><br>

            <div class="form-group myclass">
                <button name="btn_login" id="btn_login" class="btn btn-primary btn-block">Login</button>
            </div>
            </div>
            <br>
            <hr>
              Not Registered yet ?
               <a href="indexdemo.php"> Register Now </a>
               
            </form>
           </div>
       </div>
   </div>
   </div>
</body>
</html>