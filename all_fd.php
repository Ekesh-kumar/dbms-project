<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All FD accounts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .table{
            border:11px;
            border-collapse: collapse;
            border-color:black;
        

        }
        th{
            color:red;

        }
        td{
            color:green;
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
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="admin.php">Back</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="delete_fd.php">Delete FD Account</a>
        </li>
 
       
      </ul>
   
    </div>
  </div>
</nav>


<table class="table">
    
    
        <th>f_id</th>
        <th>member id</th>
        <th>Member name</th>
        <th>start</th>
        <th>period</th>
        <th>amount</th>
        <th>interest</th>
        <th>Ending date</th>
      
        <th>Gaining Amount
        </th>

<?php 
  require_once "config.php";

         $sql = "SELECT m.m_name ,f.* FROM members m, fd f WHERE m.m_id=f.m_id"; 
         
         $result = mysqli_query($conn, $sql);
         $rows=mysqli_num_rows($result);
         echo "<n><strong>Number of members are : $rows</strong></n> <br>";
         echo "<br>";
        
         while($row = mysqli_fetch_assoc($result)){
             echo "<tr>
                    <td>$row[f_id]</td>
                    <td>$row[m_id]</td>
                    <td>$row[m_name]</td>
                    <td>$row[start]</td>
                    <td>$row[period]</td>
                    <td>$row[amount]</td>
                    <td>$row[interest]</td>
                    <td>$row[c_date]</td>
                   
                    <td>$row[g_amt]</td>
                    </tr>";
         }
         echo "</table>";

                    ?>
        
    
</body>
</html>