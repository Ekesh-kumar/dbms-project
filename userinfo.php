<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
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
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
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

img {
  border-radius: 50%;
}

.image{
  padding-top:40px ;
}

.back {
  background-image: url("https://agcensus.nic.in/images/slider-01.jpg"); /* The image used */
  height: 410px; /* You must set a specified height */
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
  width: 700px;
  padding-left:100px;
  border:none;
  box-sizing: border-box;
  color:black;
}
</style>
</head>
<body>

<div class="navbar">
  <a href="#home">Home</a>
  <div class="dropdown">
    <button class="dropbtn">Used Facility
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="loan.php">Loan</a>
      <a href="account.php">Account Details</a>
      <a href="agee1.php">Agriculture facility</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Available Facility
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="loan.html">Loan</a>
      <a href="account.html">Account Details</a>
      <a href="agee1.html">Agriculture facility</a>
    </div>
  </div> 
</div>
<div class="image">
<img src="https://cdn-icons-png.flaticon.com/512/610/610120.png" alt="Avatar" style="width:200px">
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
