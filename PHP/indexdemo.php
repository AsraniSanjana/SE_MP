 <!-- indexdemo is the signup page -->
<?php require "config/config.php"; ?>
<?php require "include/navbar.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="favicon.jpeg"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous");>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/sweetalert.js"></script>
    <title>Registration Page</title>
    
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
<h3 class="h3SIGNUP">Signup : </h3>
<hr>
<?php
if(isset($_GET['msg'])) echo $_GET['msg'];
?>
            <form name="signup" id="signup" action ="config/actions.php" method="POST">
            <!-- <form name="signup" id="signup" action ="indexdemo.php" method="POST"> -->
            
            <div class="form-group myclass" >
                <label for="fullname"></label>
                <input name="full_name" id="full_name" type="text" class="form-control" placeholder="Enter your fullname" >
            </div><br>
            <div class="form-group myclass">
                <label for="Email"></label>
                <input name="email" id="email" type="text" class="form-control" placeholder="Enter your email" >
            </div><br>
            <div class="form-group myclass">
                <label for="Username"></label>
                <input name="username" id="username" type="text" class="form-control" placeholder="Create a username" >
            </div><br>
            <div class="form-group myclass" >
                <label for="Password"></label>
                <input name="password" id="password" type="password" class="form-control" placeholder="Create a password"  > 
            </div><br><br>
            <div class="form-group myclass">
                <!-- <button name="submit" id="submit" class="btn btn-primary btn-block">Sign up</button> -->
                <button class="btn btn-primary btn-lg col-12 "  name="submit" id="submit" >Sign up</button>
            </div>
              

            </form>
           </div>
       </div>
   </div>
   </div>
   <script>
function myfunc(){
    alert("You're about to delete an entry that cant be recovered ,click on ok if you confirm on deletion ?");


}
       </script>
</body>
</html>



