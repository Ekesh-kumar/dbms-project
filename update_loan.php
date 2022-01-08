<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
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
          <a class="nav-link active" aria-current="page" href="admin.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="all_loan.php">Back</a>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->




    <div class="container mt-4">
<h3>Update Here:</h3>
<hr>

<form action="" method="post">
 
  <div class="form-group">
    <label for="exampleInputPassword1">Enter the Loan Account Number</label>
    <input type="text" name="ac_no" class="form-control" id="exampleInputPassword1" placeholder="Enter Account Number">
  </div>
  <br>

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



</div>
<table class="table">

  </body>



</html>
<?php

require_once "config.php";
function function_alert($msg){
    echo "<script>alert('$msg')</script>";
    
  }


if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['ac_no'])))
      {
        $err = "Please enter loan Account number";
        function_alert("Please enter loan Account number");
      }
    else{

           
        $id = trim($_POST['ac_no']);
    }


if(empty($err))
{
    $sql = "SELECT   ln_id,next_date,m_name,paid,to_be_paid,sts,ln_amount,emi FROM loans ,members WHERE ln_id=? AND loans.m_id=members.m_id";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $ac);
    $ac= $id;
   
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $l_id,$next,$mname,$paid,$bal,$status,$lnamount,$emi);
                    if(mysqli_stmt_fetch($stmt))
                    {
                      $paid=$paid+$emi;

                      echo $bal;
                      $bal=$bal-$emi;
                      if($bal<=0){
                          $status="complete";
                      }

                      $date1=date($next);
                      $day=30;
                      $date=date_create($date1); // or your date string
                      date_add($date,date_interval_create_from_date_string("$day days"));// add number of days 
                      $next= date_format($date,"Y-m-d");


                      $result1=$conn->query("UPDATE loans SET paid=$paid,last_paid=CURRENT_TIMESTAMP, to_be_paid=$bal, sts='$status',next_date='$next' WHERE ln_id=$id");
                      if($result1){
                          $result=$conn->query("SELECT m.m_name, ln.* FROM members m,loans ln where ln_id=$id AND m.m_id=ln.m_id");

                          $row=mysqli_fetch_assoc($result);
                    
                     echo "
                    <tr>
                    <th>Loan ID</th>
                    <th>m_id</th>
                    <th>Member name</th>
                    <th>Starting Date</th>
                    
                    <th>Last Loan Paid</th>
                    <th>Paid</th>
                    <th>Balance</th>

                    <th>Amount</th>
                    <th>Amount+interest</th>
                    <th>Loan End Date</th>
                    <th>Next Date</th>
                    <th>Loan Type</th>
                    <th> EMI</th>
                    <th>Status</th>
                    </tr>
                    <tr>
                    <td>$row[ln_id]</td>
                    <td>$row[m_id]</td>
                    <td>$row[m_name]</td>
                    <td>$row[s_date]</td>
                    <td>$row[last_paid]</td>
                    <td>$row[paid]</td>
                    <td>$row[to_be_paid]</td>
                    <td>$row[amount]</td>
                    <td>$row[ln_amount]</td>
                    <td>$row[loan_end]</td>
                    <td>$row[next_date]</td>
                    <td>$row[loan_type]</td>
                    <td>$row[emi]</td>
                    <td>$row[sts]</td>
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