<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Add a FD account</title>
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
        <a class="nav-link" href="admin.php" >Home <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item active">
        <a class="nav-link" href="all_fd.php" >View All FD accounts <span class="sr-only">(current)</span></a>
</li>
    
    

      
     
    </ul>
  </div>
 
</nav>
  

    <div class="container my-4">
     <h1 class="text-center">Add FD account</h1>
     <form action=""  method="post">
        <div class="form-group">
        <div class="form-group">
            <label for="username">Enter Member ID</label>
            <input type="text" maxlength="11" class="form-control" id="username" name="userid" aria-describedby="emailHelp" placeholder="user id">
            <br>
            
       
            <label for="username">Enter FD Account Number</label>
            <input type="text" maxlength="11" class="form-control" id="ac_no" name="acno" aria-describedby="emailHelp" placeholder="FD Account Number">
            <br>
            
      
            <label for="username">Initial Amount</label>
            <input type="text" maxlength="11" class="form-control" id="username" name="amount" aria-describedby="emailHelp" placeholder="amount">
           <br>
            <label for="username">Enter FD period</label>
            <input type="text" maxlength="11" class="form-control" id="period" name="period" aria-describedby="emailHelp" placeholder="FD period in months">
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



  if(empty(trim($_POST["userid"]))&& empty(trim($_POST["ac_no"]))&& empty(trim($_POST["amount"]))&& empty(trim($_POST["period"])) && empty(trim($_POST["date"]))){
    function_alert("all fields are required");

  }
  else{
 
    $uid=$_POST["userid"];
    $fid = $_POST["acno"];
    $amount= $_POST["amount"];
    $period=$_POST["period"];
    $date=$_POST["date"];
    // Check whether this username exists
    $existSql = "SELECT m_name , f_set  FROM members m WHERE  m_id=$uid";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        $row=mysqli_fetch_assoc($result);
        if($row['f_set']==1){
            function_alert("user already has account");

        }          
        else{
                 $intrstrate=0;

                if($period>3 && $period <=6){
                  $intrstrate=4;
                }
                elseif($period>6 && $period<=12){
                  $intrstrate=5;
                }
                elseif($period>12 && $period <=24){
                  $intrstrate=6;
                }
                elseif($period>24 && $period <=36){
                  $intrstrate=7;
                }
                elseif($period>36 && $period <=60){
                  $intrstrate=8;
                }
                else{
                     $intrstrate=7;
                }
                $gained=$intrstrate/100/12*($amount)*$period+$amount;
                $dat=date('Y-m-d');

                $day=$period*30;
                // echo $day."<br>";
                // echo $date;
                // $findate=date('Y-m-d', strtotime($date. ' + $day days'));
                // //date('Y-m-d', strtotime($Date. ' + 1 days'));
                // echo "<br>".$findate;


                $date=date_create($dat); // or your date string
              date_add($date,date_interval_create_from_date_string("$day days"));// add number of days 
              $findate= date_format($date,"Y-m-d");


          $interest=0;
            $result1=$conn->query("INSERT INTO FD ( f_id,m_id,start, period,amount,interest, c_date,g_amt) VALUES( $fid,$uid,CURRENT_TIMESTAMP,$period, $amount,$intrstrate,'$findate',$gained)");

            $result2=$conn->query("UPDATE members SET f_set=1 WHERE m_id=$uid");
      
           echo var_dump($result1);
            if ($result1){
                function_alert("user successfully registered");

                echo "<h1>Fixed Deposit Account</h1>";
                        
                $sql="SELECT * FROM fd WHERE m_id=$uid";
                $result=$conn->query($sql);
                $row=mysqli_fetch_assoc($result);

                

                echo " <table border='4' >
                <tr>

                <th>Fixed deposit ID</th>
                <th>Memeber ID</th>
                <th>Starting Date</th>
                <th>Period</th>
                <th>Amount Deposited</th>
                <th>Interest rate</th>
                <th>Fd mature Date</th>
                <th>Gaining Amount</th>
                 </tr>
            
                <tr>
                <td>$row[f_id]</td>
                <td>$row[m_id]</td>
                <td>$row[start]</td>
                <td>$row[period]</td>
                <td>$row[amount]</td>
                <td>$row[interest]</td>
                <td>$row[c_date]</td>
                <td>$row[g_amt]</td>
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



