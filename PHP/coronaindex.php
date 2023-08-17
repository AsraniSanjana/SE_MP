<!DOCTYPE html>
<!-- main dataset(corona.php) in the table -->
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="shortcut icon" type="image/jpg" href="favicon.jpeg"/>
  <title>Covid Data</title>
  <?php include 'links.php';?>
  <?php include 'coronastyle.css';?>
  <style>
body{
  background-color: lightpink;
}

    </style>
</head>
<body onload="fetch()">

<pre>
  <br>
       <a href="http://localhost/PHP/dashboard.php">  <button type="button" class="btn btn-secondary fas fa-backward">   go back to your dashboard</button></a>
</pre>

<br>
<hr>
<br>

<div class="main_header">
  <div class="row w-100 h-150">
      <div class="col-lg-12 col-md-5 col-12 order-lg-2 pl-5 p-4">
          <center><h1 class="img">Let's Stay Safe & Fight Against COVID-19 Together</h1></center>          
  </div>
  </div>
</div>

<!--******corona latest update****** -->
<section class="corona_update">
  <div class="mb-3">
    <center><h3>COVID-19 UPDATES</h3></center>
</div>

  <div class="table-responsive">
    <table class="table-bordered table striped text-center" id="tbval">
    <thead class="thead-dark">
      <tr>
        <th>Country</th>
         <th>Total Confirmed</th>
          <th>Total Recovered</th>
           <th>Total Deaths</th>
            <th>New Recovered</th>
             <th>New Deaths</th>
</thead>
      </tr>

    </table>
  </div>
</div>
</section>

<!--- *****symptoms****---->

<div class="container-fluid sub_section pt-5 pb-5" id="aboutid">
  <div class="section_header text_center mb-5 mt-4">
<script>
function fetch(){
    $.get("https://api.covid19api.com/summary",

    function (data){
      //console.log(data['Countries'].length);
      var tabval = document.getElementById('tbval');
      for(var i=1; i<(data['Countries'].length);i++){
        var x = tbval.insertRow();
        x.insertCell(0);

        tbval.rows[i].cells[0].innerHTML = data['Countries'][i-1]['Country'];
        tbval.rows[i].cells[0].style.background = '#7a4a91';
        tbval.rows[i].cells[0].style.color = '#fff';

      x.insertCell(1);
        tbval.rows[i].cells[1].innerHTML = data['Countries'][i-1]['TotalConfirmed'];
        tbval.rows[i].cells[1].style.background = '#f36e23';
        tbval.rows[i].cells[1].style.color = '#fff';

x.insertCell(2);
        tbval.rows[i].cells[2].innerHTML = data['Countries'][i-1]['TotalRecovered'];
        tbval.rows[i].cells[2].style.background = '#4bb7d8';
        tbval.rows[i].cells[2].style.color = '#fff';

       x.insertCell(3);
        tbval.rows[i].cells[3].innerHTML = data['Countries'][i-1]['TotalDeaths'];
        tbval.rows[i].cells[3].style.background = '#7a4a91';
        tbval.rows[i].cells[3].style.color = '#fff';

         x.insertCell(4);
        tbval.rows[i].cells[4].innerHTML = data['Countries'][i-1]['NewRecovered'];
        tbval.rows[i].cells[4].style.background = '#9cc850';
        tbval.rows[i].cells[4].style.color = '#fff';

         x.insertCell(5);
        tbval.rows[i].cells[5].innerHTML = data['Countries'][i-1]['NewDeaths'];
        tbval.rows[i].cells[5].style.background = '#f36e23';
        tbval.rows[i].cells[5].style.color = '#fff';
      }
    }
    )
    }
  </script>
 </div>
</div>
</body>
</html>