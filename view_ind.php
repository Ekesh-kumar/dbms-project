

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>View Individual members</title>
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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Admin System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav">
     
    
     
      <li class="nav-item">
        <a class="nav-link" href="admin.php">Back</a>
      </li>

      
     
    </ul>
  </div>
</nav>

<div class="container mt-4">
<h3>Search A Member Here:</h3>
<hr>

<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Member ID</label>
    <input type="text" name="m_id" class="form-control" id="exampleInputPassword1" placeholder="Enter m_id">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php
//This script will handle login
session_start();

// check if the user is already logged in

require_once "config.php";

$username = $mid = "";
$err = "";
function function_alert($msg){
    echo "<script>alert('$msg')</script>";
    
 }

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username']))&&empty(trim($_POST['m_id'])))
    {
        $err = "Please enter username + password";
        function_alert("please enter username or id");
        echo "hello";
    }
    else{
        $username = trim($_POST['username']);
        $mid = trim($_POST['m_id']);
    }


if(empty($err))
{
    $sql = "SELECT m_id,m_name,adhaar,r_card,adress,email_id,ph_no,a_set,p_set,f_set,ln_set FROM members WHERE m_name=? OR m_id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "si", $param_username,$m_id);
    $param_username = $username;
    $m_id=$mid;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id,$name,$ano,$rno,$address,$email,$ph,$a_set,$p_set,$f_set,$loan_set);
                    if(mysqli_stmt_fetch($stmt))
                    {
                       
                            // this means the password is corrct. Allow user to login
                           echo "<br><h2>Member Account details</h2>";
                          

                           echo " <table border='4'>
                            <tr>
    
                            <th>Member ID</th>
                            <th>Member name</th>
                            <th>Adhaar Number</th>
                            <th>Ration card number</th>
                            <th> Address</th>
                            <th>Email ID</th>
                            <th>Phone Number</th>
                            </tr>
                            <tr>
                            <td>$id</td>
                            <td>$name</td>
                            <td>$ano</td>
                            <td>$rno</td>
                            <td>$address</td>
                            <td>$email</td>
                            <td>$ph</td>
                            </tr>
                  </table>";

                      if($a_set==1){

                        echo "<br><h2>Savings Account</h2>";
                        
                            $sql="SELECT * FROM savings WHERE m_id=$id";
                            $result=$conn->query($sql);
                            $row=mysqli_fetch_assoc($result);

                            

                            echo "<table border='4'>
                              <tr>
                              <th>Account Number</th>
                             <th>Member ID</th>
                             <th>Balance</th>
                             <th>interest Gainedj</th>
                             <th>Starting Date/th>
                             <th>last_transaction</th>
                             </tr>
                             <tr>
                            <td>$row[ac_no]</td>
                            <td>$row[m_id]</td>
                            <td>$row[abalance]</td>
                            <td>$row[interest]</td>
                            <td>$row[date_start]</td>
                            <td>$row[c_date]</td>
                            </tr>";

                            echo "</table>";
                      }

                      if($p_set==1){

                        echo "<br><h2>Pigmy Account</h2>";
                        
                            $sql="SELECT * FROM pigmy WHERE m_id=$id";
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


                      if($f_set==1){

                        echo "<br><h2>Fixed Deposit Account</h2>";
                        
                            $sql="SELECT * FROM fd WHERE m_id=$id";
                            $result=$conn->query($sql);
                            $row=mysqli_fetch_assoc(result);

                            

                            echo " <table border='4' >
                            <tr>
    
                            <th>Fixed deposit ID</th>
                            <th>Memeber ID</th>
                            <th>Starting Date</th>
                            <th>Period</th>
                            <th>Amount Deposited</th>
                            <th>Interest rate</th>
                            <th>no_of_days_left</th>
                            <th>Gaining Amount</th>
                             </tr>
                        
                            <tr>
                            <td>$row[f_id]</td>
                            <td>$row[m_id]</td>
                            <td>$row[start]</td>
                            <td>$row[period]</td>
                            <td>$row[Amount]</td>
                            <td>$row[interest]</td>
                            <td>$row[no_of_days_left]</td>
                            <td>$row[g_amt]</td>
                            </tr>";

                  echo "</table>";
                      }


                      
                      if($loan_set==1){

                        echo "<br><h2>Loan Account</h2>";
                        
                            $sql="SELECT * FROM loans WHERE m_id=$id";
                            $result=$conn->query($sql);
                            $row=mysqli_fetch_assoc(result);

                            

                            echo "<table border='4'>
                            <tr>
    
                            <th>Loan ID</th>
                            <th>Memeber ID</th>
                            <th>Starting Date</th>
                            <th>last_paid</th>
                            <th>Paid</th>
                            <th>Balance Amount</th>
                            <th>Loan Amount Taken</th>
                            <th>Loan Ending Date</th>
                            <th>Interest_rate</th>
                            <th>Next paying Date</th>
                            <th>Loan Type</th>
                            <th>EMI</th>
                            <th> Status</th> 
                             </tr>
                        
                            <tr>
                            <td>$row[ln_id]</td>
                            <td>$row[m_id]</td>
                            <td>$row[start]</td>
                            <td>$row[last_paid]</td>
                            <td>$row[paid]</td>
                            <td>$row[to_be_paid]</td>
                            <td>$row[amount]</td>
                            <td>$row[loan_end]</td>
                            <td>$row[interest_rate]</td>
                            <td>$row[next_date]</td>
                            <td>$row[ln_type]</td>
                            <td>$row[EMI]</td>
                            <td>$row[sts]</td>
                        
                            </tr>";

                  echo "</table>";
                      }


                      


                           

                     
                            
                        }
                    }
                    else{
                    function_alert("member not exist");
                    }

                }

    }
}    





?>


