<?php
require_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    $uid=$_POST["userid"];
    $username = $_POST["username"];
    $adhaar= $_POST["ano"];
    $ration=$_POST["rno"];
    $address=$_POST["adress"];
    $phone=$_POST["ph"];
    $email=$_POST["mail"];

    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // $exists=false;

     function function_alert($msg){
        echo "<script>alert('$msg')</script>";
        
     }

     function mobile_no($phone){

        return(preg_match("/^[8976]{1}[0-9]{9}$/", $phone));
     }


    // Check whether this username exists
    $existSql = "SELECT * FROM `members` WHERE m_id = '$uid'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        funtion_alert("User already Exists");
    }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        funtion_alert("invalid email");
        }
        elseif(mobile_no($phone)==0){
            function_alert("invalid phone");
        }
        elseif(strlen(trim($_POST['password'])) < 5){
            function_alert("short password");
        }

        elseif(($password == $cpassword)){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `members` ( m_id, m_name, password,adhaar,r_card, adress,email_id, ph_no, a_set, p_set,f_set,ln_set) VALUES ($uid,'$username', '$hash', '$adhaar','$ration','$address','$email','$phone',0,0,0,0)";
            $result = mysqli_query($conn, $sql);
            if ($result){
                function_alert("user successfully registered");
            }
        }
        else{
            $showError = "Passwords do not match";
        }
    
}
    
?>

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
        <a class="nav-link" href="objgoa.php" >Home <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item active">
        <a class="nav-link" href="admin.php" >Back <span class="sr-only">(current)</span></a>
</li>
    
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
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
            
       
            <label for="username">Username</label>
            <input type="text" maxlength="25" class="form-control" id="username" name="username" aria-describedby="emailHelp"  placeholder="user name">
            
      
        <div class="form-group">
            <label for="username">Adhaar Number</label>
            <input type="text" maxlength="12" class="form-control" id="username" name="ano" aria-describedby="emailHelp"  placeholder="Adhaar number">
            
        </div>
        <div class="form-group">
            <label for="username">Ration Card Number</label>
            <input type="text" maxlength="10" class="form-control" id="username" name="rno" aria-describedby="emailHelp"  placeholder="Ration card number">
            
        </div>
        <div class="form-group">
            <label for="username">Adress</label>
            <input type="text" maxlength="100" class="form-control" id="username" name="adress" aria-describedby="emailHelp"  placeholder="Adress">
            
        </div>
        <div class="form-group">
            <label for="username">Phone Number</label>
            <input type="text" maxlength="10" class="form-control" id="username" name="ph" aria-describedby="emailHelp"  placeholder="Phone Number">
            
        </div>
        <div class="form-group">
            <label for="username">Enter Email ID</label>
            <input type="text" maxlength="50" class="form-control" id="username" name="mail" aria-describedby="emailHelp"  placeholder="email id">
            
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" maxlength="23" class="form-control" id="password" name="password"  placeholder="password">
        </div>
        <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword"  placeholder="Retype the password">
            <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
        </div>
         
        <button type="submit" class="btn btn-primary">SignUp</button>
     </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>