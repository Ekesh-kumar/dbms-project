<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<!-- Fetch all the categories and use a loop to iterate through categories -->


<table border=4>
    
    
        <th>Member ID</th>
        <th>Member name</th>
        <th>Adhaar Number</th>
        <th>Ration card number</th>
        <th> Address</th>
        <th>Email ID</th>
        <th>Phone Number</th>

<?php 
  require_once "config.php";

         $sql = "SELECT * FROM members"; 
         $result = mysqli_query($conn, $sql);
         $rows=mysqli_num_rows($result);
         echo "<n><strong>Number of members are : $rows</strong></n> <br>";
         echo "<br>";
        
         while($row = mysqli_fetch_assoc($result)){
             echo "<tr>
                    <td>$row[m_id]</td>
                    <td>$row[m_name]</td>
                    <td>$row[adhaar]</td>
                    <td>$row[r_card]</td>
                    <td>$row[adress]</td>
                    <td>$row[email_id]</td>
                    <td>$row[ph_no]</td>
                    </tr>";
         }
         echo "</table>";

                    ?>
        
    
</body>
</html>