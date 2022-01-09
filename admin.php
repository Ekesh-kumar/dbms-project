<?php
session_start();

// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
//     header("location: login.php");
//     exit;
// }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>admin system</title>
    <style>
        body{
            background-image:url("https://t4.ftcdn.net/jpg/02/86/02/67/360_F_286026740_xWkobcEk5g38qrH7cpfeImAnlUUSIrc5.jpg");
            background-size: cover;
            background-position:fixed;
        }
        a{
            color:rgb(34, 218, 34);
        }
        li{
            color:rgb(31, 209, 31);
        }
    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Admin System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="objgoa1.php" >Home <span class="sr-only">(current)</span></a>
    
      <li class="nav-item">
        <a class="nav-link" href="objgoa1.php">Logout</a>
      </li>

      
     
    </ul>
  </div>
  <div > <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <a style="color:white">Hi Welcome Admin</a></div>
</nav>

<div class="body1">
    <strong><ul  style="color:rgb(43, 204, 75); font-size:30px">
        <li><a href="view_all.php">See all the members</a></li>
        <li> <a href="view_ind.php">Search a member by is ID</a></li>
        <li><a href="register.php">Create a new Member Account</a></li>
        <li><a href="all_fac.php">View and update all stocks</a></li>
        <li><a href="add_savings.php">Create a new Savings Accout</a></li>
        <li><a href="add_pigmy.php">Create a new pigmy Account</a></li>
        <li><a href="add_fd.php">Create a new FD Account</a></li>
        <li><a href="all_fd.php">View all FD Account</a></li>
        <li><a href="all_savings.php">View all Saving  Account</a></li>
        <li><a href="all_loan.php">View all Loan account</a></li>
        <li><a href="all_pigmy.php">Veiw all pigmy Account</a></li> 
        <li><a href="delete_member.php">Delete a member Account</a></li>
        <li><a href="delete_saving.php">Delete a pigmy Account</a></li>
        <li><a href="delete_pigmy.php">Delete a FD Account</a></li>
        <li><a href="delete_fd.php">Delete a Saving  Account</a></li>
        <li><a href="add_loan.php">Create Loan account</a></li>
        <li><a href="delete_loan.php">Delete Loan Account</a></li> 
     
    </strong>


</div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>