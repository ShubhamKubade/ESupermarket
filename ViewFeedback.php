<link rel="stylesheet" href="TableStyle.css">
<?php
$con=mysqli_connect("localhost", "root", "", "supermarket");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM feedback");
echo "<table border='1'>
<caption>Feedback Details</caption>
<tr>
<th>Email Id</th>
<th>Quality Of Product</th>
<th>Quality Of Service</th>
<th>Suggestion</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['Email'] . "</td>";
echo "<td>" . $row['QualityOfProduct'] . "</td>";
echo "<td>" . $row['QualityOfService'] . "</td>";
echo "<td>" . $row['AnySuggestion'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>