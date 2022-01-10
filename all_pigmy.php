<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>All pigmy Accounts</title>
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


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       <li class="nav_item">
           <a class="nav-link" href="update_pigmy.php">Update pigmy</a>
    </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.php">Back</a>
        </li>
        
       
      
      </ul>
   
    </div>
  </div>
</nav>


<table border=4>
    
    
        <th>p_id</th>
        <th>m_id</th>
        <th>start</th>
        <th>last_deposited</th>
        <th>pbalance</th>
        <th>interest</th>
        

<?php 
  require_once "config.php";

         $sql = "SELECT * FROM pigmy"; 
         $result = mysqli_query($conn, $sql);
         $rows=mysqli_num_rows($result);
         echo "<n><strong>Number of members are : $rows</strong></n> <br>";
         echo "<br>";
        
         while($row = mysqli_fetch_assoc($result)){
             echo "<tr>
                    <td>$row[p_id]</td>
                    <td>$row[m_id]</td>
                    <td>$row[start]</td>
                    <td>$row[last_deposited]</td>
                    <td>$row[p_balance]</td>
                    <td>$row[interest]</td>
                    
                    </tr>";
         }
         echo "</table>";

                    ?>
        
    
</body>
</html>