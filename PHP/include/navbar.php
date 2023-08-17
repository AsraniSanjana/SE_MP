<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
<body>
	 -->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Covid Patient Tracker </title>
        <link rel="shortcut icon" type="image/jpg" href="favicon.jpeg"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/duotone.css" integrity="sha384-R3QzTxyukP03CMqKFe0ssp5wUvBPEyy9ZspCB+Y01fEjhMwcXixTyeot+S40+AjZ" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css" integrity="sha384-eHoocPgXsiuZh+Yy6+7DsKAerLXyJmu2Hadh4QYyt+8v86geixVYwFqUvMU8X90l" crossorigin="anonymous"/>
    </head>
    <body>
    
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <div class="container">
         <div class="navbar-header">
  <a class="navbar-brand fas fa-hands-helping" href="#" > CoviHelp <br><br><p class="text-primary">Covid Patient Tracker</p></a> </div>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <!-- <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> -->
     
      <li class="nav-item active">
   <pre>
        <a class="nav-link fas fa-home" href="  landingpage.html">  Landing page<span class="sr-only">(current)</span></a>
</pre>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="indexdemo.php">Signup</a>
      </li>
      <!-- <li class="nav-item dropdown">
      <div class="dropdown">
	  <a class="nav-link  dropdown-toggle"  id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
		Graphs
</a>
	  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
		<li><a class="dropdown-item" href="Home.html">CountryWise Graph</a></li>
		<li><a class="dropdown-item" href="igraphs.html">India StateWise Graph</a></li>
        </ul>
      
	</div>
   
      </li> -->
      
      <?php
      if(isset($_SESSION['is_login'])){
          ?>
     <li class="nav-item"> <a class="nav-link fas fa-user" href="login.php" > <?php echo $_SESSION['username'];?></a></li>
<?php } else {?>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li> 
      <?php } ?>
     
    </ul>
  </div>
     </div>
</nav>
<hr>
    </body>
    </html>