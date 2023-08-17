<?php

define("HOSTNAME","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DBNAME","phpapp2");
$con=mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME)  or die("cannot connect to the database!");
if($con)
 //echo "you are successfully connected!";

?>

