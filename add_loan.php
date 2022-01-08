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
            <br>
            
       
            <label for="username">Enter Loan Account Number</label>
            <input type="text" maxlength="11" class="form-control" id="lid" name="lid" aria-describedby="emailHelp" placeholder="Pimgy Account Number">
            <br>

            <label for="username">Enter Loan ID</label>
            <input type="text" maxlength="11" class="form-control" id="ltype" name="ltype" aria-describedby="emailHelp" placeholder="Enter loan id">
            <br>

            <label for="username">Period</label>
            <input type="text" maxlength="11" class="form-control" id="ltype" name="period" aria-describedby="emailHelp" placeholder="Enter the period">
            <br>
            
      
           
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



  if(empty(trim($_POST["userid"]))&& empty(trim($_POST["lid"]))&& empty(trim($_POST["ltype"]))&& empty(trim($_POST["date"]))){
    function_alert("all fields are required");

  }
  else{
 
    $uid=$_POST["userid"];
    $lid = $_POST["lid"];
    $ltid= $_POST["ltype"];
    $date=$_POST["date"];
    $period=$_POST["period"];
    // Check whether this username exists
    $existSql = "SELECT m_name , ln_set  FROM members m WHERE  m_id=$uid";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        $row=mysqli_fetch_assoc($result);
        if($row['ln_set']==1){
            function_alert("user already has account");

        }          
        else{
                 $intrstrate=0;

                $result=$conn->query("SELECT * FROM loanst WHERE ln_type_id=$ltid");

               $row=mysqli_fetch_assoc($result);

               $type=$row['type'];
               $amount=$row['amount'];
               $itrate=$row['interest_rate'];
               $sts="pending";

               $lnamount=$itrate/100*($period*$amount)+$amount;
               $emi=$lnamount/$period;

               $date1=date('Y-m-d');
               $day=$period*30;
               $date=date_create($date1); // or your date string
               date_add($date,date_interval_create_from_date_string("$day days"));// add number of days 
               $findate= date_format($date,"Y-m-d");

                $day=30;
               $date=date_create($date1); // or your date string
               date_add($date,date_interval_create_from_date_string("$day days"));// add number of days 
               $next= date_format($date,"Y-m-d");


                               
             $tobepaid=$lnamount-$emi;

          $interest=0;
            $result1=$conn->query("INSERT INTO loans ( ln_id,m_id,s_date,last_paid,paid,to_be_paid, sts,amount,ln_amount,loan_end,interest_rate,next_date,loan_type,emi) VALUES( $lid,$uid,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,$emi,$tobepaid,'$sts',$amount,$tobepaid,'$findate',$itrate,'$next','$type',$emi)");

            $result2=$conn->query("UPDATE members SET ln_set=1 WHERE m_id=$uid");
      
           echo var_dump($result1);
            if ($result1){
                function_alert("user successfully registered");

                echo "<h1>Loan Account</h1>";
                        
                $sql="SELECT * FROM loans WHERE m_id=$uid";
                $result=$conn->query($sql);
                $row=mysqli_fetch_assoc($result);

                

                echo " <table border='4' >
                <tr>

                <th>Loan Account Number</th>
                <th>Memeber ID</th>
                <th>Starting Date</th>
                <th>Period</th>
                <th>Last emi paid</th>
                <th>Amout Paid</th>
                <th>Balance Amount</th>
                <th>Satus</th>
                <th>Amount </th>
                <th> Amount + Interest</th>
                <th> Loand Ending date</th>
                <th>Interest Rate (per month></th>
                <th>Next Date</th>
                <th>Loan Type</th>
                <th>EMI</th>
              </tr>
            
                <tr>
                <td>$row[ln_id]</td>
                <td>$row[m_id]</td>
                <td>$row[s_date]</td>
                <td>$period</td>
                <td>$row[last_paid]</td>
                <td>$row[paid]</td>
                <td>$row[to_be_paid]</td>
                <td>$row[sts]</td>
                <td>$row[amount]</td>
                <td>$lnamount</td>
                <td>$row[loan_end]</td>
                <td>$row[interest_rate]</td>
                <td>$row[next_date]</td>
                <td>$row[loan_type]</td>
                <td>$row[emi]</td>
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



