<link rel="stylesheet" href="TableStyle.css">

<?php
$con=mysqli_connect("localhost", "root", "", "supermarket");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM contents");
echo "<table border='1'>
<caption>Content Details</caption>
<tr>
<th>Content Id</th>
<th>Content Name</th>
<th>Price</th>
<th>Quantity</th>
<th>Details</th>
<th>Delete Content</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['contentId'] . "</td>";
echo "<td>" . $row['CName'] . "</td>";
echo "<td>" . $row['Price'] . "</td>";
echo "<td>" . $row['Quantity'] . "</td>";
echo "<td>" . $row['Details'] . "</td>";
//echo "<td><a href='default.asp'>DELETE</a></td>";

echo "<td><a href='DeletePhp.php?contentId={$row['contentId']}'>DELETE</td>";

echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>