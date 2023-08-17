

<?php require "config.php"; 
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


  // INSERT DATA
  if((isset($_POST['submit']))){

    //echo "it is set.";
    $msg="";
    $fullname=mysqli_real_escape_string($con,trim($_POST['full_name'])); 
    $email=mysqli_real_escape_string($con,trim($_POST['email'])); 
    $username=mysqli_real_escape_string($con,trim($_POST['username'])); 
    $password=mysqli_real_escape_string($con,trim($_POST['password'])); 


    // generating a unique token for every user for email activation
    $token=bin2hex(random_bytes(15));
  

$fullname_valid=$email_valid=$password_valid=$username_valid=false;

// check fullname


    if(!empty(trim($fullname))){

        if (strlen($fullname)>2 && strlen($fullname)<30){
            if (!preg_match('/[^a-zA-Z\s]/',$fullname)){
                
                $fullname_valid=true;
                //fullname is valid now 
            }
            else { $msg.= "Fullname cant have invalid characters .<br>"; }
        } else {  $msg.= "fullname must be 2-30 characters long .<br>";}
    } 
    else {  $msg.= "fullname cant be empty.<br>";}


  // check email 

    if(!empty(trim($email))){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
          

        $query= "SELECT email FROM customer WHERE email='$email' ";
        $fire=mysqli_query($con,$query) or die("cannot fire query to select email from db table customer");
        
        
        if(mysqli_num_rows($fire)>0){
          $msg.="This email is already taken. Try Another!<br>";

        }
        else {
            // all test passed -> valid email
            $email_valid=true;
        } }
        else {  $msg.=  $email. "is an invalid email address.<br>";}

    }else {  $msg.= "email cant be blank.<br>";}

       
      // check username 

    if(!empty(trim($username))){
        if (strlen($username)>=4 && strlen($username)<=15){
            if (!preg_match('/[^a-zA-Z\d]/',$username)){
        


        $query= "SELECT username FROM customer WHERE username='$username' ";
        $fire=mysqli_query($con,$query) or die("cannot fire query to select username from db table customer");
        
        
        if(mysqli_num_rows($fire)>0){
          $msg.="This username is already taken. Try Another!<br>";

        }
        else {
// all test passed -> valid username
$username_valid=true;
        }

            }else {  $msg.= "username can only contain alphabets.<br>";}
        }else {  $msg.= "username must be 2-30 characters long.<br>";}

      } else { $msg.= "username cant be blank. <br>";}


      // check password 
      if(!empty(trim($password))){
        if (strlen($password)>=5 && strlen($password)<=15){
// all test passed
$password_valid=true;
$password=md5($password);
        }
        else {  $msg.= " password must be between 5-15 characters length.<br>";}
    }else  {  $msg.= " password cannot be blank. <br>";}


       if($fullname_valid && $email_valid && $password_valid && $username_valid){

        $query="INSERT INTO customer(full_name,email,username,password,token,status) VALUES('$fullname','$email','$username','$password','$token','inactive')";
        $fire=mysqli_query($con,$query) or die("cant insert data into db!" . mysqli_error($con));








        if($fire) {
        //echo "data submitted to database!";
        //echo '<script>alert("Thanks for Registering ,". $fullname "!!")</script>'; 
      //  echo '<script>alert("Thanks for Registering !")</script>';
          $msg= '<script>alert("Thanks for Registering!!" )</script>';
         
    //  header('Location: ../indexdemo.php?msg='.$msg);
    // header('Location: ../login.php?msg='.$msg);
     //header('Location:http://localhost/PHP/login.php');


    
    
     $subject = "CoviHelp Account Email Activation  ";
     $body = "Hello $username , Click on this link to activate your account
     http://localhost/PHP/config/activate.php?token=$token.";
     $sender_email = "From: sanjanavasrani@gmail.com";
     
     if (mail($email, $subject, $body, $sender_email)) {
       
        $_SESSION['msg']=`click on the link in the email $email. we sent to you...`;
        $_GET['token']=$token;
        header('Location: ../login.php'); //redirect to dashboard once verification done.
     } else {
         echo "Email sending failed...";
         // for some reason email isnt being sent anymore
        //  echo $subject;
         echo $body;
        //  echo "sending from :";
        //  echo $sender_email;
        //  echo "sending to :";
        //  echo $email;
     }
     


     }

       }
       else {
      
        header('Location: ../indexdemo.php?msg='.$msg);
       }

 
}
?>

