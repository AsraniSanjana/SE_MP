<?php
session_start();
echo "Logging you out. Please wait...";

session_destroy();
header("Location: http://localhost/forum_project/index.php")
?>