<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>All members</title>
    <style>
        table{
            border:11px;
            border-collapse: collapse;
            border-color:black;

        }
        th{
            color:red;

        }
        n {
            background-color:rgb(248, 242, 62);
        }
       
        </style>
</head>
<body>
<!-- Fetch all the categories and use a loop to iterate through categories -->



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="objgoa1.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.php">Back</a>
        </li>
       
      
      </ul>
   
    </div>
  </div>
</nav>

<table class="table">
    
    
        <th>Member ID</th>
        <th>Member name</th>
        <th>Adhaar Number</th>
        <th>Ration card number</th>
        <th> Address</th>
        <th>Email ID</th>
        <th>Phone Number</th>

<?php 
  require_once "config.php";

         $sql = "SELECT * FROM members"; 
         $result = mysqli_query($conn, $sql);
         $rows=mysqli_num_rows($result);
         echo "<n><strong>Number of members are : $rows</strong></n> <br>";
         echo "<br>";
        
         while($row = mysqli_fetch_assoc($result)){

          if($row['m_name']=="admin"){
            echo "";

          }
          else{  
          echo "<tr>
                    <td>$row[m_id]</td>
                    <td>$row[m_name]</td>
                    <td>$row[adhaar]</td>
                    <td>$row[r_card]</td>
                    <td>$row[adress]</td>
                    <td>$row[email_id]</td>
                    <td>$row[ph_no]</td>
                    </tr>";
         }
        }
         echo "</table>";

                    ?>
        
    
</body>
</html>