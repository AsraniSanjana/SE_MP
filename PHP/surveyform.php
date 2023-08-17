<?php
session_start();
if($_SESSION['is_login']){
    // keep the user on the page 
    $username=$_SESSION['username'];
}else {
    //else redirect on loginpage
    header("Location:login.php");
}
    $query_initial_part = "update customer set";
    $query_final_part = " where email='";
    $sum = 0;
    $con=mysqli_connect("localhost","root","","phpapp2")  or die("cannot connect to the database!");
    // if($con)
    // { echo "you are successfully connected!";
    //     }
    
    
    if(isset($_POST['submit'])){

        $fullname=$_POST['full_name'];
        $query_initial_part = $query_initial_part." full_name='".$fullname."',";


        $email=$_POST['email'];

        $gender = $_POST["gender"];
        $query_initial_part = $query_initial_part."gender='".$gender."',";


        $age = $_POST['age'];
        $query_initial_part = $query_initial_part." age=".$age;

        // TODO: change name of MyRadio to appropraite form name.
        $vaccinationStaus = $_POST["color"];
        $query_initial_part = $query_initial_part.", vaccination_status='".$vaccinationStaus."'";

        // TODO: change name of MyRadio to appropraite form name.
        $positiveBefore = $_POST["positive_before"];
        $query_initial_part = $query_initial_part.", positive_before='".$positiveBefore."'";

        // TODO: change name of MyRadio to appropraite form name.
        $familtyBG = $_POST["color1"];
        $query_initial_part = $query_initial_part.", family_bg='".$familtyBG."'";

        // TODO: change name of MyRadio to appropraite form name.
        $contactWithPatient = $_POST["color2"];
        $query_initial_part = $query_initial_part.", contact_with_patient='".$contactWithPatient."'";

        if ($contactWithPatient = "yes") {
            $sum += 1;
        }

        // TODO: change name of MyRadio to appropraite form name.
        $postVaccinationSymptoms = $_POST["color3"];
        $query_initial_part = $query_initial_part.", post_vaccination_symtoms='".$postVaccinationSymptoms."'";

        // TODO: change name of MyRadio to appropraite form name.
        $travelHistory = $_POST["travelhis"];
        $query_initial_part = $query_initial_part.", travel_history='".$travelHistory."'";

        if ($travelHistory = "yes") {
            $sum += 2;
        }

         // TODO: change name of MyRadio to appropraite form name.
         $noOfPeopleInContact = $_POST["name"];
         $query_initial_part = $query_initial_part.", no_of_people_in_contact=".$noOfPeopleInContact;

         // TODO: change name of MyRadio to appropraite form name.
         $symptoms = $_POST["fruit"];
        $commaSeparatedSymptoms = "";

         if(count($symptoms) > 0) {
            $sum += count($symptoms);

            // foreach($symptoms as $symptom) {
            //     $commaSeparatedSymptoms = $commaSeparatedSymptoms.$symptom.", ";
            // }

            for($i=0; $i<sizeof($symptoms);$i++){
                $commaSeparatedSymptoms = $commaSeparatedSymptoms.$symptoms[$i].", ";
            }

            $query_initial_part = $query_initial_part.", symptoms='".$commaSeparatedSymptoms."'";
        }

        if ($sum <=5) {
            $query_initial_part = $query_initial_part.", action='Please follow Covid  Gidelines and stay safe!'";
        }
        else if ($sum < 10) {
            $query_initial_part = $query_initial_part.", action='Consult a doctor.'";
        }
        else if ($sum >=10) {
          $query_initial_part = $query_initial_part.", action='You should get tested since you have alot of symptoms!'";
      }
        $final_query = $query_initial_part.$query_final_part.$email."'";

        echo $final_query;
        
        $fire=mysqli_query($con,$final_query) or die("cannot feed/update the data into database.".mysqli_error($con));
        // if($fire){
        //     echo $final_query;
        // }
        if($fire){
          header("Location:thankyou.php");
        }
        else{
          echo("you arent registered yet!You cant fill this survey form!!");
        }
    }


?>


<script src="https://cdn.freecodecamp.org/testable-projects-fcc/v1/bundle.js"></script>

<!DOCTYPE html>
<html>

<head>
<link rel="shortcut icon" type="image/jpg" href="favicon.jpeg"/>
<title>Covid Survey Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
 <!-- bootstrap cdn link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
  </head> 
<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:200i,400&display=swap');


body {
  font-family: 'Poppins';
  line-height: 1.4;
  background-color: #D7DCDD;
  width: 500px;
  margin: auto; 
}


form {
  background: rgba(7, 5, 147, 0.2);
  padding: 2.5rem 2.5rem;
  border-radius: 2rem;
  width: 673px;
  margin: auto; 
  position:relative;
  left:-200px;

}


.form-inputs {
  display: block; 
  width: 90%;
  height: 2rem;
  padding: 0.25rem 0.75rem;
  background-color: #fff;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
}



#dropdown {
  display: block; 
  width: 95.5%;
  height: 2rem;
  padding: 0.25rem 0.75rem;
  background-color: #fff;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
}


.input-headings {
  margin: 0 auto 1.25rem auto;
  padding: -4.75rem;
}


.submit-button {
  width: 95%;
  padding: 0.75rem;
  background: blueviolet;
  color: white;
  border-radius: 2px;
  cursor: pointer;
}

#textarea {
  width: 93%;
}

@media only screen and (max-width: 800px) 
{
  form {
  width: 100vw; 
  height: auto;}
}
</style>
<Body> 
  <h1>COVID SURVEY FORM</h1>
<p id="description">
 Fill The Following Details 
</p>

<form id="survey-form" action ="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

<div class="input-headings">
  
  <b><label for="name" id="name-label"> Fullname</label></b>

  <input id="full_name"  type="text" name="full_name" placeholder="enter your fullname" class="form-inputs" required> </input>   
<br>        
 <b> <label for="email" id="email-label"> Email </label></b>
  <input id="email" type="email" name="email" placeholder="enter a valid email" class="form-inputs" required> </input>
<br>
 <b> <label for="number" id="number-label"> Age </label></b>
  <input id="number" type="number" name="age" min="enter your age" max="100" placeholder="18" class="form-inputs" required> </input>
<br>
<b><label for="gender">Gender</label></b>
<input id="gender" type="radio" name="gender" value="female" >Female
<input id="gender" type="radio" name="gender" value="male">Male
<input id="gender"  type="radio" name="gender" value="others">Others
<br><br>
<!-- 
<label for="dropdown" id="model" style="width: 90vw;">Vaccination Status</label>
  <select id="dropdown">
    <option value = "Model_S">Dose 1 Completed</option>
    <option value = "Model_3">Dose 2 Completed</option>
    <option value = "Model_X">Not Vaccinated Yet</option>
   
  </select> -->
 <b> <label for="dropdown" id="model" style="width: 90vw;" >Vaccination Status</label></b>
 
    <input id="model_color" type="radio" name="color" value="no1">Dose 1 Completed
    <input id="model_color" type="radio" name="color" value="no2">Dose 2 completed
    <input id="model_color" type="radio" name="color" value="no">Not Vaccinated Yet
   
  <br><br>
<b><label for="model_color">Have u been tested positive for covid before?</label></b>
<input id="model_color" type="radio" name="positive_before" value="yes" >yes
<input id="model_color" type="radio" name="positive_before" value="no">no
<br><br>
<b><label for="model_color1">Is/Was anyone in your family Covid positive?</label></b>
<input id="model_color1" type="radio" name="color1" value="yes">yes
<input id="model_color" type="radio" name="color1" value="no">no
<br> <br>
<b><label for="model_color2">Have You experienced severe symptoms after taking the dose 1 or 2?</label></b>
<input id="model_color2" type="radio" name="color3" value="yes">yes
<input id="model_color" type="radio" name="color3" value="no" >no
<br> 

<br>

<b><label for="model_color2">Have you been in contact with anyone who has or had covid ?</label></b>
<input id="model_color2" type="radio" name="color2" value="yes">yes
<input id="model_color" type="radio" name="color2" value="no" >no
<br> 

<br>
<br>
                           



  <b><label for="model_color2">Did You travel recently somewhere ?</label></b>
  <input id="travelhis" type="radio" name="travelhis" value="yes" >yes
  <input id="travelhis" type="radio" name="travelhis" value="no" >no
  <br> 
  
  <br>
 

        <b> <label for="dropdown" id="model" style="width: 90vw;">Approximately, how many people have you come in contact with in past 15 days?</label></b>
 
        <input id="name" type="text" name="name" placeholder="enter the number of people uve been in contact with" class="form-inputs" required> </input>   
        <br>
      <br><br>


 <label for="features"> <b>Your Symptoms Recently -></b></label>

  <br /><br>
  <input type="checkbox" name="fruit[]" value="fever" />fever <br>
  <input type="checkbox" name="fruit[]" value="bodyache" />bodyache<br>
  <input type="checkbox" name="fruit[]" value="headache" />headache<br>
  <input type="checkbox" name="fruit[]" value="diarrhoea" />diarrhoea<br>
  <input type="checkbox" name="fruit[]" value="sore throat" />sore throat<br>
  <input type="checkbox" name="fruit[]" value="difficulty breathing" />difficulty breathing<br>
  <input type="checkbox" name="fruit[]" value="tiredness" />tiredness<br>
  <input type="checkbox" name="fruit[]" value="cough" />cough<br>
  <input type="checkbox" name="fruit[]" value="cold" />cold<br>
  <input type="checkbox" name="fruit[]" value="muscle pain" />muscle pain<br>
  <input type="checkbox" name="fruit[]" value="Olfactory disorders" />Olfactory disorders<br>

 
 

<!-- <input id="submit" type="submit" value="Validate The Details Filled in." class="submit-button"> -->

  </div>
  

  <!-- <form method="post" name="form" action="registerpage.html"> -->
    <div class="w3-row-padding">
      <div class="w3-col w3-center w3-rest">
       <br>
        <input type="submit" 
            value="submit" id="submit" name="submit" class="submit-button" >
      </div>
    </div>
  </form>
<!-- </form> -->

<a href="http://localhost/PHP/dashboard.php">  <button type="button" class="btn btn-secondary fas fa-backward">   go back to your dashboard</button></a>

</body>


</html>