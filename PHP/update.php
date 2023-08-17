
<?php require "config/config.php"; ?>
<?php


// UPDATE DATA
if(isset($_GET['upd'])){
    $id=$_GET['upd'];
    // $query="SELECT * FROM users WHERE id=$id";
    $query="SELECT * FROM customer WHERE id=$id";
    $fire=mysqli_query($con,$query) or die("cannot fetch data!".mysqli_error($con));
    //if($fire) echo "we got into the database!!!";
    $user=mysqli_fetch_assoc($fire);
    echo "updating records of " .$user['full_name']. "...";
}
?>




<?php
if(isset($_POST['btnupdate'])){// if button update is set
$fullname=$_POST['full_name'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=md5($_POST['password']);




// $query="UPDATE users SET fullname='$fullname',email='$email',username='$username',password='$password' WHERE id=$id";
$query="UPDATE customer SET full_name='$fullname',email='$email',username='$username',password='$password' WHERE id=$id"; 
$fire=mysqli_query($con,$query) or die("cannot update the data!".mysqli_error($con));
if($fire){ echo "data updated successfully!";

    $msg= '<script>alert("Data Updated Successfully!!" )</script>';
  


 }

}

if(isset($_POST['btngoback'])){
    header("Location:adminCRUD.php");
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
    <div>
   <div class="container " >
       <div class="row">
           <div class="col-lg-12">
           <div class="col-lg-4 col-lg-offset-4">
              <hr>
              <br>
<h3 class="h3SIGNUP">Update Data: </h3>
            <form name="signup" id="signup" action ="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <form action="">
            <div class="form-group myclass" >
                <label for="full_name">Fullname</label>
                <input value="<?php echo $user['full_name']  ?>"name="full_name" id="full_name " type="text" class="form-control" placeholder="enter your fullname">
            </div> <br>
            <div class="form-group myclass">
                <label for="Email">Email</label>
                <input value="<?php echo $user['email']  ?>" name="email" id="email" type="text" class="form-control" placeholder="enter your email">
            </div><br>
            <div class="form-group myclass">
                <label for="Username">Username</label>
                <input value="<?php echo $user['username']  ?> "name="username" id="username" type="text" class="form-control" placeholder="enter your username">
            </div><br>
            <div class="form-group myclass" >
                <label for="Password">New Password</label>
                <input value="" name="password" id="password" type="text" class="form-control" placeholder="enter new password">
            </div> <br> <br>
            <div class="form-group myclass">
                <button onclick="updatedone()" name="btnupdate" id="btnupdate" class="btn btn-primary btn-block fas fa-save"> Save</button>
            </div>
               <div class="form-group myclass">
                <button name="btngoback" id="btngoback" class="btn btn-primary btn-block ">Go Back</button>
      
               
            </div>

            </form>
           </div>
       </div>
   </div>
   </div>
    </div>
    <script>
function updatedone(){
   alert("data is updated successfully!");}
        </script>
</body>
</html>