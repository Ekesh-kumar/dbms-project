


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Welcome</title>
    


  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Member details</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      
      
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Facilities
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="loan1.php">Loans</a></li>
            <li><a class="dropdown-item" href="account1.php">Accounts</a></li>
            <li><a class="dropdown-item" href="agee.php">Facilities</a></li>
            <li><a class="dropdown-item" href="all_fac1.php">Facilities and stocks</a></li>
            
          </ul>
        </li>
      
      </ul>
     
    </div>
    <div>
   <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <a style="color:white"> <?php   session_start(); echo "Hi Welcome  ".$_SESSION['username']; echo "  ";?></a>
   <a href="objgoa1.php" style="color:white; margin-left:10px">   
    Logout</a></div>

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


    <div class="image">
<img src="https://cdn-icons-png.flaticon.com/512/610/610120.png" alt="Avatar" style="width:200px">


</div>
<div>
    <?php
    require_once "config.php";
    $username=$_SESSION['username'];
     $sql = "SELECT m_id,m_name,adhaar,r_card,adress,email_id,ph_no,a_set,p_set,f_set,ln_set FROM members WHERE m_name=?";
     $stmt = mysqli_prepare($conn, $sql);
     mysqli_stmt_bind_param($stmt, "s", $param_username);
     $param_username = $username;
     
     
     
     // Try to execute this statement
     if(mysqli_stmt_execute($stmt)){
         mysqli_stmt_store_result($stmt);
         if(mysqli_stmt_num_rows($stmt) == 1)
                 {
                     mysqli_stmt_bind_result($stmt, $id,$name,$ano,$rno,$address,$email,$ph,$a_set,$p_set,$f_set,$loan_set);
                     if(mysqli_stmt_fetch($stmt))
                     {
                        
                             // this means the password is corrct. Allow user to login
                            
                          ?>
                         
                            <?php
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
 
                         echo "<h1>Savings Account</h1>";
                         
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
 
                         echo "<h1>Savings Account</h1>";
                         
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
                             <td>$row[pbalance]</td>
                             <td>$row[interest]</td>
                           
                             </tr>";
 
                   echo "</table>";
                       }
 
 
                       if($f_set==1){
 
                         echo "<h1>Fixed Deposit Account</h1>";
                         
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
 
                         echo "<h1>Loan Account</h1>";
                         
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
 
                 }
 ?>
 </div>
  </body>
</html>