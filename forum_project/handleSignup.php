<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    </head>

<body>

<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    $user_email = $_POST['signupEmail'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];


    // Check whether this email exists
    $existSql = "select * from `users` where user_email = '$user_email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        $showError = "email already in use";
    }
    else{
        if($pass == $cpass){
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_email`, `user_pass`, `timestamp`) VALUES ( '$user_email', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            // $headers="From: sanjanavasrani@gmail.com";
            if($result){
            //     $subject="Email Activation";
            //     $body="Hi,$user_email.Click here to activate your account.
            //     http://localhost/forum_project/activate.php?token=$token";

            //     // $sender_email="from:sanjanavasrani@gmail.com";
                   
                  
            //     if(mail($user_email,$subject,$body,$headers)){
            //         echo "mail sent successfully";}
            //         // $_SESSION['msg']="check your mails to activate your account $email."; }
            //         else {
            //             echo "email sending failed.";
            //         }

                $showAlert = true;
                header("Location: /forum_project/index.php?signupsuccess=true");
                exit();
            }

        }
        else{
            $showError = "Passwords do not match"; 
            
        }
    }
    // header("Location: /forum/index.php?signupsuccess=false&error=$showError");

    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error!</strong> Your Signup was unsuccessfull!<br>'.$showError.'.<br>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <a href=" http://localhost/forum_project/"><button type="button" class="btn btn-secondary">Retry</button></a>
</div>';

}

?>

</body>
</html>