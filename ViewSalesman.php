<link rel="stylesheet" href="TableStyle.css">
<?php
$con=mysqli_connect("localhost", "root", "", "supermarket");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "select Name, Gender, Mobile, Address, Email from register where Role='Salesman'";  
$result = mysqli_query($con, $sql); 

echo "<table border='1'>
<caption>Salesman Details</caption>
<tr>
<th>Customer Name</th>
<th>Gender</th>
<th>Mobile</th>
<th>Address</th>
<th>Email</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['Name'] . "</td>";
echo "<td>" . $row['Gender'] . "</td>";
echo "<td>" . $row['Mobile'] . "</td>";
echo "<td>" . $row['Address'] . "</td>";
echo "<td>" . $row['Email'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>