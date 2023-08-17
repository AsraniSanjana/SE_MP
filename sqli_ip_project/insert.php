
<?php

// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "user_registration";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
    // echo "Connection was successful<br>";
}

// Variables to be inserted into the table
// $uname = "Vikrant";
// $pass = "vicky123";


// no sql injections : safe 
$uname=mysqli_real_escape_string($conn,trim($_POST['username'])); 
$pass=mysqli_real_escape_string($conn,trim($_POST['password'])); 

//unsafe
// $uname=$_POST['username']; 
// $pass=$_POST['password']; 



// // Sql query to be executed
// $sql = "INSERT INTO `login` (`username`, `password`) VALUES ('$uname', '$pass')";
// $result = mysqli_query($conn, $sql);

// // Add a new trip to the Trip table in the database
// if($result){
//     echo "The record has been inserted successfully!<br>";
// }
// else{
//     echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
// }
?>


<!-- localhost\sqli_ip_project\form.html -->

<table border="2px">
 
 <tr>
 
 <th> Username </th>
 <th> Password </th>

 </tr >

 <?php

//  $q = "select * from login ";
$q = "select * from login where username='$uname' and password='$pass' ";
echo "QUERY IS ", $q;
 $query = mysqli_query($conn,$q);

 while($res = mysqli_fetch_array($query)){
 ?>
 <tr class="text-center">
 <td> <?php echo $res['username'];  ?> </td>
 <td> <?php echo $res['password'];  ?> </td>
 </tr>

 <?php 
 }

 if( $res==0){
    echo "<b>Login failed. Invalid Username or Password</b>";
 }
  ?>
 
 </table>  

