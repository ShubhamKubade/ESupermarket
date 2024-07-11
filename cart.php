<?php


session_start();
if(isset($_SESSION['Email1'])) {
    $_SESSION['Email1'];
  }
  ?>
  
<?PHP  
$conn = mysqli_connect("localhost", "root", "", "supermarket");
          
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " 
        . mysqli_connect_error());
}

require_once ("CreateDb.php");
require_once ("component.php");

$db = new CreateDb("supermarket", "contents");

if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["contentId"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }
}
if (isset($_POST['place'])){
   
    if ($_GET['action'] == 'place'){
        foreach ($_SESSION['cart'] as $key => $value){
            if($value["contentId"] == $_GET['id']){
                
            }
             $sql = "INSERT INTO orders(Email, contentId)  VALUES ('".$_SESSION['Email1']."','".$value['contentId']."')";
                
             if(mysqli_query($conn, $sql)){
                 echo ("<script LANGUAGE='JavaScript'>
                alert('Your has been placed successfully...!');
                 window.location.href='VBill.php';
                 </script>");
                     
             } else{
                 echo "ERROR: Hush! Sorry $sql. " 
                     . mysqli_error($conn);
             }
        }
        //print_r( $value["contentId"]);
        // echo ("<script LANGUAGE='JavaScript'>
        // window.location.href='VBill.php';
        // </script>");
    }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

<?php
    require_once ('header.php');
?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>My Cart</h6>
                <hr>

                <?php
                $total = 0;
                    if (isset($_SESSION['cart'])){
                        $contentId = array_column($_SESSION['cart'], 'contentId');
                        
                        $result = $db->getData();
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($contentId as $id){

                                if ($row['contentId'] == $id){
                                    cartElement( $row['contentId'],$row['CName'], $row['Price'],$row['Quantity'],$row['Details']);
                                    $total = $total + (int)$row['Price'];
                                }
                            }
                        }
                    }else{
                        echo "<h5>Cart is Empty</h5>";
                    }

                ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

        <form action="cart.php?action=place&id=$contentId\" method="post" class="cart-items">
            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>₹<?php echo $total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>₹<?php
                            echo $total;
                            ?></h6>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success mx-2" name="place">Place Order</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>