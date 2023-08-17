
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thanks for filling out the survey form!</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="shortcut icon" type="image/jpg" href="favicon.jpeg"/>
</head>
<body>
  
</body>
</html>
<?php require "config/config.php"; ?>
<?php
session_start();

if(isset($_SESSION['is_login'])){ 
  $username=$_SESSION['username'] ;
   $query="SELECT * FROM customer WHERE username='$username'";
   $fire=mysqli_query($con,$query) or die("cant fetch data from database.".mysqli_error($con));
    
     // associative array h isiliye key name likhna h [''] aise
                      // agr array hota toh [0] or [1] aise dete

?>
   <!--if user is logged in and has filled the survey form-->
        <table>
     <?php
     
     
if(mysqli_num_rows($fire)>0){
  //  $users=mysqli_fetch_assoc($fire);

    while( $users=mysqli_fetch_assoc($fire)){  ?>
    <tr>

        <td><?php echo "according to your response to our survey form, ".$users['action']?></td>        
    </tr>
        </table>
    <?php
    }
    }
    
    echo "<p>Thankyou for filling out the survey form , ". $_SESSION['username'] ."... Take Care!&#x1F60a;</p>";
     ?><br><hr>
     <a href="http://localhost/PHP/dashboard.php" ><button class="fas fa-backward"type="button" class="btn btn-success"> Go back to Dashboard</button></a>
<?php }

 else
  {?>
     
     You need to be logged in to fill this survey form!
        <a href="login.php">Login</a>
    
      <?php } ?>



      
