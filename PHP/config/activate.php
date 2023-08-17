<?php
include 'config.php';
// echo "hey there";
session_start();

if(isset($_GET['token'])){
    $token=$_GET['token'];
    $updatequery=" update customer set status='active' where token='$token' ";
    $query=mysqli_query($con,$updatequery);
    if($query){
        if(isset($_SESSION['msg'])){
            $_SESSION['msg']='Account updated.';
            header("Location: http://localhost/PHP/login.php");
    }
    else{
        $_SESSION['msg']='You are logged out.';
        header("Location: http://localhost/PHP/login.php");
    }
} else{
    $_SESSION['msg']='Account updation unsuccessful.';
    // header("Location: http://localhost/PHP/indexdemo.php");
    header("Location: http://localhost/PHP/login.php");
}
}
?>