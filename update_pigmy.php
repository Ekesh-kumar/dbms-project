<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>update_saving</title>
    <style>
      
      th{
          color:red;

      }
  
   
      </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="admin.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="all_savings.php">back</a>
        </li>
        
        
      
      </ul>
     
    </div>
  </div>
  </nav>
  

    <!-- Bootstrap CSS -->
    

  
 

<div class="container mt-4">
<h3>Update Here:</h3>
<hr>

<form action="" method="post">
 
  <div class="form-group">
    <label for="exampleInputPassword1">Enter the Account Number</label>
    <input type="text" name="ac_no" class="form-control" id="exampleInputPassword1" placeholder="Enter pigmy ID">
  </div>
  <br>

  <div class="form-group">
    <label for="exampleInputPassword1">Amount to credited</label>
    <input type="number" name="add" class="form-control" id="exampleInputPassword1" placeholder="to be credited">
  </div>
<br>
 
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



</div>

   

<?php
//This script will handle login

// check if the user is already logged in

require_once "config.php";


$err = "";
function function_alert($msg){
    echo "<script>alert('$msg')</script>";
    
 }

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['ac_no'])) && (empty($_POST['add'])))
      {
        $err = "Please enter username + password";
        function_alert("please all the fields");
      }
    else{

      $buy=0;
      $add=0;
        
        $id = trim($_POST['ac_no']);

        $credit=trim($_POST['add']);
    }


if(empty($err))
{
    $sql = "SELECT m_id,abalance,interest,date_start,c_date,ac_no FROM savings WHERE ac_no=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $ac);
    $ac= $id;
   
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $m_id,$balance,$interest,$data_start,$c_date,$ac_no);
                    if(mysqli_stmt_fetch($stmt))
                    {
                      
                      
                        // this means the password is corrct. Allow user to login

                       $result=$conn->query("UPDATE savings SET abalance=$balance, interest=$interest, c_date=CURRENT_TIMESTAMP WHERE ac_no=$id");

                       $result=$conn->query("SELECT m.m_id, ac_no,m_name,abalance,date_start,c_date,last_spaid FROM savings s, members m WHERE s.m_id=m.m_id AND ac_no=$id GROUP BY m.m_id, ac_no,m_name,abalance,date_start,c_date,last_spaid ");
                       $row=mysqli_fetch_assoc($result);
                    
                    
                     
                     echo "
                     <table border='4'>
                    <tr>
                    
                    <th>m_id</th>
                    <th>Account Number</th>
                    <th>Member name</th>
                    <th>Balance</th>
                    <th>Date Started</th>
                    <th>Last Transaction</th>
                    <th>Last Interest Paid</th>
                    <th>Interest Paid</th>
                    </tr>
                    <tr>
                    <td>$row[m_id]</td>
                    <td>$row[ac_no]</td>
                    <td>$row[m_name]</td>
                    <td>$row[abalance]</td>
                    <td>$row[date_start]</td>
                    <td>$row[c_date]</td>
                    <td>$row[c_date]</td>
                    <td>$interest</td>
                    </tr>
                    </table>
                    ";
                
                    

                      

                       

                       }             
                    }

                }
                else{
                  function_alert("Invalid facility ID");
                }


    
}    
}
}




?>













</body>

</html>