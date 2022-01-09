<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>facilites</title>
    
  <style>
      table{
          border:5px;
          border-style:groove;
          border-radius:20px;
          border-collapse:collapse;
          }
      h1{
        color:red;
      }
      td{
        color:green;
      }
      </style>


  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="welcome.php"><h5>Home</h5></a>
        </li>
       
    
        
      
      </ul>
     
    </div>
  </div>
  </nav>


  <h1>Fertilizers and their stocks</h1>
      <table class="table">
            <tr>
                <th>Facility ID</th>
                <th>Facility name</th>
                <th>company name</th>
                <th>cost</th>
                <th>Stock</th>
</tr>

  <?php


require_once "config.php";

$result=$conn->query("SELECT * FROM facilities where f_type='fertilizer'");



while($row = mysqli_fetch_assoc($result))   {

   echo" <tr>
    <td>$row[f_id]</td>
    <td>$row[F_name]</td>
    <td>$row[c_name]</td>
    <td>$row[Cost]</td>
    <td>$row[Stock]</td>
</tr>";
}
echo "</table>";
?>
<table class="table">
  <?php
echo "<h1>Seeds and their stocks</h1>";


echo "
<tr>
<th>Facility ID</th>
<th>Facility name</th>
<th>company name</th>
<th>cost</th>
<th>Stock</th>
</tr>";





$result=$conn->query("SELECT * FROM `facilities` where f_type='seeds'");



while($row = mysqli_fetch_assoc($result)){

   echo" <tr>
    <td>$row[f_id]</td>
    <td>$row[F_name]</td>
    <td>$row[c_name]</td>
    <td>$row[Cost]</td>
    <td>$row[Stock]</td>
</tr>";
}
echo "</table>";




echo "<h1>Weedicides and their stocks</h1>";


?>
<table class="table">
  <?php
echo "
<tr>
<th>Facility ID</th>
<th>Facility name</th>
<th>company name</th>
<th>cost</th>
<th>Stock</th>
</tr>";





$result=$conn->query("SELECT * FROM `facilities` where f_type='weedicide'");



while($row = mysqli_fetch_assoc($result)){

   echo" <tr>
    <td>$row[f_id]</td>
    <td>$row[F_name]</td>
    <td>$row[c_name]</td>
    <td>$row[Cost]</td>
    <td>$row[Stock]</td>
</tr>";
}
echo "</table>";











?>


   

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>