<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Add FD Account</title>
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
        <a class="nav-link" href="admin.php" >Back<span class="sr-only">(current)</span></a>
</li>
<li class="nav-item active">
        <a class="nav-link" href="all_pigmy.php" >View All Pigmy Accounts <span class="sr-only">(current)</span></a>
</li>
    
   

      
     
    </ul>
  </div>
 
</nav>
  

    <div class="container my-4">
     <h1 class="text-center">Add Pigmy Account:</h1>
     <form action=""  method="post">
        <div class="form-group">
        <div class="form-group">
            <label for="username">Enter Member ID</label>
            <input type="text" maxlength="11" class="form-control" id="username" name="userid" aria-describedby="emailHelp" placeholder="user id">
            
       
            <label for="username">Enter pigmy Account Number</label>
            <input type="text" maxlength="11" class="form-control" id="username" name="acno" aria-describedby="emailHelp" placeholder="Account Number">
            
      
            <label for="username">Initial Amount</label>
            <input type="text" maxlength="11" class="form-control" id="username" name="amount" aria-describedby="emailHelp" placeholder="amount">
            
            <label for="username">Enter todays date</label>
            <input type="date" class="form-control" id="username" name="date" aria-describedby="emailHelp" placeholder="to days date">
            
        
    



       <br>
         
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
function function_alert($msg){
  echo "<script>alert('$msg')</script>";
  
}

if($_SERVER["REQUEST_METHOD"] == "POST"){


  if(empty(trim($_POST["userid"]))&&empty(trim($_POST["acno"]))&&empty(trim($_POST["amount"]))&& empty(trim($_POST["date"]))){
    function_alert("enter all the fields");

  }
  else{
 
    $uid=$_POST["userid"];
    $account = $_POST["acno"];
    $amount= $_POST["amount"];
    $date=$_POST["date"];
  
   

 
    // $exists=false;


     


    // Check whether this username exists
    $existSql = "SELECT p_set,m_name FROM `members` WHERE m_id = $uid";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        $row=mysqli_fetch_assoc($result);
        if($row['p_set']==1){
            function_alert("user already has account");

        }
                      
        

                 
        else{
            $sql= $conn->query("INSERT INTO pigmy ( p_id, m_id,start,last_deposited,p_balance,interest) VALUES ($account,$uid,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,$amount ,0)");
            $sql=$conn->query("UPDATE members SET p_set=1 WHERE m_id=$uid");
          
            if ($sql){
                function_alert("user successfully registered");
                $sql="SELECT * FROM pigmy WHERE p_id=$account";
                $result=$conn->query($sql);
                $row=mysqli_fetch_assoc($result);

                

                echo " <table border='4''>
                   <tr>
                <th>Pigmy ID</th>
                <th>Member ID</th>
                <th>Starting Date</th>
                <th>Last-deposited</th>
                <th>Pigmy Account Balance</th>
                <th>Interest Gained</th>
                
                 </tr>
            
                <tr>
                <td>$row[p_id]</td>
                <td>$row[m_id]</td>
                <td>$row[start]</td>
                <td>$row[last_deposited]</td>
                <td>$row[p_balance]</td>
                <td>$row[interest]</td>
              
                </tr>";

      echo "</table>";
            
        
        }
    }
  }
        else{
            function_alert("user not registered");
        }
    
}
}
    
?>

