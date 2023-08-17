
<?php
session_start();

echo '
<head>
<link rel="shortcut icon" type="image/jpg" href="favicon.jpeg"/></head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">CoviHelp</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" class="bi bi-house-fill"class="fa-solid fa-house-chimney" href="http://localhost/PHP/landingpage.html"> Landing page<span class="sr-only">(current)</span></a>
    
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/PHP/dashboard.php">Dashboard</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="http://localhost/forum_project/">Forum Home Page</a>
    </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          More
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         
          <a class="dropdown-item" href="http://localhost/PHP/page2.html">Covid Variants info</a>
          <a class="dropdown-item" href="http://localhost/PHP/surveyform.php">Survey Form</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="http://localhost/PHP/igraphs.html">Covid India Graphs</a>
          <a class="dropdown-item" href="http://localhost/PHP/Home.html">Covid World Graphs</a>


        </div>
      </li>
    
    </ul>
    <div class="row mx-2">';
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
      echo '<form class="form-inline my-2 my-lg-0" method="get" action="search.php">
        <input class="form-control mr-sm-2" name="search" type="search" action="search.php" placeholder="Search" aria-label="Search">
        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
          <p class="text-light my-0 mx-2">Welcome '. $_SESSION['useremail']. ' </p>
          <a href="http://localhost/forum_project/logout.php" class="btn btn-outline-success ml-2">Logout</a>
          </form>';
    }
    else{ 
    //  if(true){
    //         echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    //                     <strong>Failed!</strong> Error logging in.
    //                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //                         <span aria-hidden="true">&times;</span>
    //                     </button>
    //               </div>';
    //     } 
      echo '<form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <button class="btn btn-outline-info ml-2" data-toggle="modal" data-target="#loginModal">Login</button>
        <button class="btn btn-outline-primary mx-2" data-toggle="modal" data-target="#signupModal">Signup</button>';
      }
    
    echo '</div>   
</div>
</nav>';

include 'loginModal.php'; 
include 'signupModal.php';  
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Your Signup for iDiscuss was Successfull!</strong> You can now login to post.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>';
}



// 
?>
