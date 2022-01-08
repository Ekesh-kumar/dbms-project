<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Register A Member</title>
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
</li>
<li class="nav-item active">
        <a class="nav-link" href="admin.php" >Back <span class="sr-only">(current)</span></a>
</li>
    
      <li class="nav-item">
        <a class="nav-link" href="objgoa1.php">Logout</a>
      </li>

      
     
    </ul>
  </div>
 
</nav>
  

    <div class="container my-4">
     <h1 class="text-center">Register a member</h1>
     <form action=""  method="post">
        <div class="form-group">
        <div class="form-group">
            <label for="username">Enter Member ID</label>
            <input type="text" maxlength="11" class="form-control" id="username" name="userid" aria-describedby="emailHelp" placeholder="user id">
            
       
            <label for="username">Enter Account Number</label>
            <input type="text" maxlength="11" class="form-control" id="username" name="acno" aria-describedby="emailHelp" placeholder="Account Number">
            
      
            <label for="username">Initial Amount</label>
            <input type="text" maxlength="11" class="form-control" id="username" name="amount" aria-describedby="emailHelp" placeholder="amount">
            
            <label for="username">Enter todays date</label>
            <input type="date" class="form-control" id="username" name="date" aria-describedby="emailHelp" placeholder="to days date">
            
        
    



       
         
        <button type="submit" class="btn btn-primary">Register</button>
     </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>


<?php
require_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    $uid=$_POST["userid"];
    $account = $_POST["acno"];
    $amount= $_POST["amount"];
    $date=$_POST["date"];
   

 
    // $exists=false;
    function function_alert($msg){
        echo "<script>alert('$msg')</script>";
        
     }

     


    // Check whether this username exists
    $existSql = "SELECT a_set FROM `members` WHERE m_id = $uid";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        $row=mysqli_fetch_assoc($result);
        if($row['a_set']==1){
            function_alert("user already has account");

        }
                      
 

                 
        else{
          $interest=0;
            $sql=$conn->query("INSERT INTO savings ( m_id, abalance,interest,date_start, c_date,last_spaid,ac_no) VALUES( $uid, $amount, $interest,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,'$account')");

            $sql=$conn->query("UPDATE members SET a_set=1 WHERE m_id=$uid");
            $result = mysqli_query($conn, $sql);
            if ($result){
                function_alert("user successfully registered");
            }
          }
        
        }
        else{
             


        
            function_alert("user not registered");
        
        
        }

  
    
}
    
?>

