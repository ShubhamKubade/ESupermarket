<link rel="stylesheet" href="TableStyle.css">

<?php
 $conn = mysqli_connect("localhost", "root", "", "supermarket");
          
 // Check connection
 if($conn === false){
     die("ERROR: Could not connect. " 
         . mysqli_connect_error());
 }
 $result = mysqli_query($conn,"SELECT * FROM contents");
?>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<table class='table table-bordered table-striped'>
<tr>
<th>Content Id</th>
<th>Content Name</th>
<th>Price</th>
<th>Quantity</th>
<th>Details</th>
<th>Update Content</th>
</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
<td><?php echo $row["contentId"]; ?></td>
<td><?php echo $row["CName"]; ?></td>
<td><?php echo $row["Price"]; ?></td>
<td><?php echo $row["Quantity"]; ?></td>
<td><?php echo $row["Details"]; ?></td>
<td><a class="update" href="UpdatePhp.php?contentId=<?php echo $row["contentId"]; ?>">UPDATE</a></td>
</tr>
<?php
$i++;
}
?>
</table>
<?php
}
else{
echo "No result found";
}
?>
