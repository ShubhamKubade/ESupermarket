<?php
 $conn = mysqli_connect("localhost", "root", "", "supermarket");
          
 // Check connection
 if($conn === false){
     die("ERROR: Could not connect. " 
         . mysqli_connect_error());
 }
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE contents set  CName='" . $_POST['CName'] . "' ,Price='" . $_POST['Price'] . "' ,Quantity='" . $_POST['Quantity']. "' ,Details='" . $_POST['Details']. "' WHERE contentId='" . $_POST['contentId'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM contents WHERE contentId='" . $_GET['contentId'] . "'");
$row= mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<head>
<title>Update Content</title>
<link rel="stylesheet" href="index.css">
<style type="text/css">
.wrapper{
width: 500px;
margin: 0 auto;
}
</style>
</head>
<body>
<div class="wrapper">
<div class="row">
<h2>Update Content</h2>
</div>
<form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
<div class="form-group">
<label>Content Id</label>
<input type="text" name="contentId" class="form-control" disabled value="<?php echo $row["contentId"]; ?>">
</div>
<div class="form-group ">
<label>Name</label>
<input type="text" name="CName" class="form-control" value="<?php echo $row["CName"]; ?>">
</div>
<div class="form-group">
<label>Price</label>
<input type="text" name="Price" class="form-control" value="<?php echo $row["Price"]; ?>">
</div>
<div class="form-group">
<label>Quantity</label>
<input type="text" name="Quantity" class="form-control" value="<?php echo $row["Quantity"]; ?>">
</div>
<div class="form-group">
<label>Details</label>
<input type="text" name="Details" class="form-control" value="<?php echo $row["Details"]; ?>">
</div>
<input type="hidden" name="contentId" value="<?php echo $row["contentId"]; ?>"/>
<input type="submit" class="btn btn-primary" value="Submit" onclick="funcUpdate()">

<a href="UpdateContent.php" class="cancel1">Cancel</a>
</form>
</div>
</div>        
</div>
</div>
</body>
</html>

<script>
    function funcUpdate() {
        window.alert('Content Updated successfully.');
    }
</script>