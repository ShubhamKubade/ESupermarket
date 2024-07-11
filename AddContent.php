
<?php
        $conn = mysqli_connect("localhost", "root", "", "supermarket");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
          
        // Taking all  values from the form data(input)
        $Name =  $_REQUEST['ContentName'];
        $Price = $_REQUEST['Price'];
        $Quantity =  $_REQUEST['Quantity'];
        $Details = $_REQUEST['Details'];
          
        // Performing insert query execution
        $sql = "INSERT INTO contents (CName, Price, Quantity, Details)  VALUES ('$Name', 
            '$Price','$Quantity','$Details')";
          
        if(mysqli_query($conn, $sql)){
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('You have successfully added the content ');
            window.location.href='AddContent.html';
            </script>");
                
        } else{
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Error');
            window.location.href='AddContent.html';
            </script>");
        }
          
        // Close connection
        mysqli_close($conn);
        ?>
  