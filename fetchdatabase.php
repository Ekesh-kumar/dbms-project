<!-- Fetch all the categories and use a loop to iterate through categories -->
<?php 
         $sql = "SELECT * FROM `categories`"; 
         $result = mysqli_query($conn, $sql);
         while($row = mysqli_fetch_assoc($result)){
          echo $row['category_id'];
          echo $row['category_name'];