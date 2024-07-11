
        <?php
        $conn = mysqli_connect("localhost", "root", "", "supermarket");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
          
        // Taking all 4 values from the form data(input)
        $Emailid =  $_REQUEST['Email'];
        $QualityOfProduct = $_REQUEST['QualityOfProduct'];
        $QualityOfService =  $_REQUEST['QualityOfService'];
        $AnySuggestion = $_REQUEST['Suggestion'];
          
        // Performing insert query execution
        $sql = "INSERT INTO feedback  VALUES ('$Emailid', 
            '$QualityOfProduct','$QualityOfService','$AnySuggestion')";
          
        if(mysqli_query($conn, $sql)){
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Thank You For Your Feedback');
            window.location.href='index.html';
            </script>");
                
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
        // Close connection
        mysqli_close($conn);
        ?>
  