
        <?php
        $conn = mysqli_connect("localhost", "root", "", "supermarket");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
          
        // Taking all 7 values from the form data(input)
        $Role =  $_REQUEST['Role'];
        $Name = $_REQUEST['Name'];
        $Gender =  $_REQUEST['Gender'];
        $Mobno = $_REQUEST['Mobno'];
        $Address = $_REQUEST['Address'];
        $Email = $_REQUEST['Email'];
        $Password = $_REQUEST['Password'];
          
        // Performing insert query execution
        $sql = "INSERT INTO register  VALUES ('$Role', 
            '$Name','$Gender','$Mobno','$Address','$Email','$Password')";
          
        if(mysqli_query($conn, $sql)){
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('You have successfully registered');
            window.location.href='index.html';
            </script>");
                
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
        // Close connection
        mysqli_close($conn);
        ?>
  