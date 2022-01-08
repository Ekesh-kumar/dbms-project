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

  </body>



</html>
<?php


if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['ac_no'])) && (empty($_POST['add'])||empty($_POST['buy'])))
      {
        $err = "Please enter username + password";
        function_alert("please enter debit or credit inputs");
      }
    else{

      $buy=0;
      $add=0;
        
        $id = trim($_POST['ac_no'];
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
                      $date1=date('Y-m-d');
                      $date2=$c_date;
              
                      $sql="call finddiff('$date1','$date2',@diff);";
                    

                      $result=$conn->query($sql);
                      $res=$conn->query("SELECT @diff");
                      $row=mysqli_fetch_assoc($res);
                      $df=$row['@diff'];
                      $intrst=$balance*(4/100/365)*$df;
                      $interest=$intrst+$interest;
                      $balance=$balance+$intrst;
                  


                
                      

                      $balance1=0;
                      if(!empty($credit)){
                       $balance=$balance+$credit;
                      }

                      if(!empty($debit)){
                        $balance1=$balance-$debit;
                    
                      }


                       if($balance1<0){
                           function_alert("low balance cannot process debit");
                       }
                       else{
                         $balance+=$balance1;
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