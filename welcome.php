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

    <title>Welcome - <?php $_SESSION['username']?></title>
    <style>
        
#navbar {
  overflow: hidden;
  background-color: #333;
  width:100%;
}



.back {
  background-image: url("https://agcensus.nic.in/images/slider-01.jpg"); /* The image used */
  height: 500px; /* You must set a specified height */
  background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */
}

footer {
  padding-left: 10px;
  background-color: black;
  color:yellow;
  text-align: center;
}

.bub{
  float:left;
  width: 500px;
  padding-left:100px;
  border:none;
  box-sizing: border-box;
  color:black;
}

#navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

#navbar a:hover {
  background-color: #ddd;
  color: black;
}

#navbar a.active {
  background-color: #04AA6D;
  color: white;
}


.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 60px;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}


.dropdown-content {
  display: none;
  position: absolute;
  background-color: brown;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: whitesmoke;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
  </head>
  <body>

  <div class="bab">
          <div id="navbar">
          
               <div> <a href="objgoa1.php"> HOME</a> </di>
              <div><a href="objgoa1.php"> logout</a> </div>
          </div>
        </div>
   
    
    <div class="container my-3">
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Welcome - <?php echo $_SESSION['username']?></h4>
      <p>Hey how are you doing? Welcome to iSecure. You are logged in as <?php echo $_SESSION['username']?>. Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
      <hr>
    
    </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 
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








 <div class="back">
  <div class="bub">
    <div style="text-align: center;">
    <h2 style="color:red">Executive Board Members</h2>
     <p style="font-weight: bold">J.B Nandhish<br>
        (President)<br>
       C.R Giridhar<br>
       (vice President)
     </p>
      <h3 style="color: royalblue;">Directs</h3>
      <p style="font-weight: bold">P.S javare Gowda<br>
        M Putte Gowda<br>
        K.S Natraju<br>
        M.S Gangaya<br>
        M.V Punchakshari<br>
        M.S Lokesh<br>
        M.T Ahok Kumar<br>
        Vasu<br>
        K.R Jayamma<br>
        S.B Shyamala<br>
        Dhayasagar</p>
    </div>
    </div>
     <div class="bub">
       <div style="text-align: center">
      <h2 style="color:red">Staff Category</h2>
      <p style="font-weight: bold">
      K.M Giddaya (Chief executive officer)<br>
      H.S Mamatha (Account)<br>
      K.T Darshan (Sales Clerk)<br>
      M.S Sannananjayya (Sales Clerk)<br>
      Kavya (Computer Operater)<br>
      Javarya (Sahayakaru)<br>
      Varadharaju (Sahayakaru)<br>
      B Prakash (Watchman)<br>
      S.K Padma (Deposit Collector)<br>
      Sharath M.A (Deposit Collector)<br>
      D.S Venu Gopala (Jewelry Validator)<br>
      </p>
       </div>
      </div>
  
  </div>
  <hr>
  <footer>
    <p>
      Primary Agricultural Cooperative Socity Ltd.,<br>
        Mayasandra-572221, Turuvekere[T], Tumakuru[D]<br>
        Financial Assistance: Tumkur District Co-operative Central Bank Ltd.,Tumkur
      </p>
          </footer>

</body>
</html>