<link rel="stylesheet" href="TableStyle.css">

<?php
session_start();
if(isset($_SESSION['Email1'])) {
    $_SESSION['Email1'];
  }
   $conn = mysqli_connect("localhost", "root", "", "supermarket");
          
   // Check connection
   if($conn === false){
       die("ERROR: Could not connect. " 
           . mysqli_connect_error());
   }
             
        $sql1 ="select orders.Email,orders.OrderId, contents.CName, contents.Price from contents inner join orders on contents.contentId=orders.contentId" ;
        $result1 = mysqli_query($conn, $sql1);

        echo "<table border='1'>
<caption>Order Details</caption>
<tr>
<th>Email Id</th>
<th>Order Id</th>
<th>Content Name</th>
<th>Content Price</th>
</tr>";
        while($row = mysqli_fetch_array($result1))
        {
        echo "<tr>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['OrderId'] . "</td>";
        echo "<td>" . $row['CName'] . "</td>";
        echo "<td>" . $row['Price'] . "</td>";
    
        echo "</tr>";
        
    }
        
?>  