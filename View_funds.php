<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>All loan accounts</title>

    <style>
        /* .table{
            border:3px;
        
          
            border-color:black;
       
            
            

        } */
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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      
        <li class="nav-item">
          <a class="nav-link" href="admin.php">Home</a>
        </li>
       
    
      </ul>
   
    </div>
  </div>
</nav>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh51eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    
   



<?php 
  require_once "config.php";

         $sql = "SELECT * FROM funds"; 
         $result = mysqli_query($conn, $sql);
         $row=mysqli_fetch_assoc($result);
         echo "<n><strong><h5>Fd account Funds:</h5></strong></n>";
        

             echo "<th>Amount: </th>";
             echo $row['Amount'];
         echo "<br>";
         echo "<br>";

         echo "<h5><strong> Pigmy account Funds:</strong></h5>";

         $row= mysqli_fetch_assoc($result);
         echo "<th>Amount: </th>";
         echo $row['Amount'];

         echo "<br>";
         echo "<br>";
         echo "<h5><strong> Savings account Funds:</strong></h5>";
       


         echo "Amount: ";
         $row= mysqli_fetch_assoc($result);

         echo $row['Amount'];




         

                    ?>


  </body>
</html>