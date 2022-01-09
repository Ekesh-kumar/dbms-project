<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>update Pigmy</title>
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


</body>

</html>

   

<?php


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

        
        $id = trim($_POST['ac_no']);

        $credit=trim($_POST['add']);
    }


if(empty($err))
{
    $sql = "SELECT m.m_name, s.* FROM members m, pigmy s WHERE m.m_id=s.m_id AND p_id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ac);
    $ac= $id;
   
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $m_name, $p_id, $m_id, $start, $last_deposited,$p_balance, $interest);
                    if(mysqli_stmt_fetch($stmt))
                    {
                      
                      
                        // update pigmy account details 
                        $p_balance=$p_balance+$credit;
                        $interest=(4/100/365)*$credit+$interest;
                        

                       $result=$conn->query("UPDATE pigmy SET p_balance=$p_balance, interest=$interest, last_deposited=CURRENT_TIMESTAMP WHERE p_id=$id");

                       $result=$conn->query("SELECT * FROM pigmy WHERE p_id=$id ");
                       $row=mysqli_fetch_assoc($result);
                    
                    
                     
                    
                     ?>

                     <table class="table">
                       <?php
                       echo"
                    <tr>
                    
                    <th>Member ID</th>
                    <th>Pigmy Account Number</th>
                    <th>Member name</th>
                    <th>Balance</th>
                    <th>Date Started</th>
                    <th>Last Transaction</th>
                
                    <th>Interest Paid</th>
                    </tr>
                    <tr>
                   
                    <td>$row[m_id]</td>
                    <td>$row[p_id]</td>
                    <td>$m_name</td>
                    <td>$row[p_balance]</td>
                    <td>$row[start]</td>
                    <td>$row[last_deposited]</td>
                    <td>$row[interest]</td>
                    </tr>
                    </table>
                    ";                   
                       }             
                    }
                  

                
                else{
                  function_alert("Invalid Pigmy Accounter Number");
                }
 
      }    
    }
}
?>
