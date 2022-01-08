<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Saving Accounts</title>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="admin.php"><h5>Home</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="update_savings.php">Update Account</a>
        </li>
    
        
      
      </ul>
     
    </div>
  </div>
  </nav>
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



<table border=4>
    
    
        <th>m_id</th>
        <th>Account Number</th>
        <th>Member name</th>
        <th>Balance</th>
        <th>Date Started</th>
        <th>Last Transaction</th>
      
        <th>Last Interest Paid</th>

<?php 
  require_once "config.php";

         $sql = "SELECT * FROM savings s , members m where s.m_id=m.m_id "; 
         $result = mysqli_query($conn, $sql);
         $rows=mysqli_num_rows($result);
         echo "<n><strong>Number of members are : $rows</strong></n> <br>";
         echo "<br>";
        
         while($row = mysqli_fetch_assoc($result)){
             echo "<tr>
                    <td>$row[m_id]</td>
                    <td>$row[ac_no]</td>
                    <td>$row[m_name]</td>
                    <td>$row[abalance]</td>
                    <td>$row[date_start]</td>
                    <td>$row[c_date]</td>
                    <td>$row[last_spaid]</td>
                    </tr>";
         }
         echo "</table>";

                    ?>
        
    
</body>
</html>