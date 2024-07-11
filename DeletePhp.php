<?php      
   $conn = mysqli_connect("localhost", "root", "", "supermarket");
          
   // Check connection
   if($conn === false){
       die("ERROR: Could not connect. " 
           . mysqli_connect_error());
   }

        $sql = "DELETE FROM contents WHERE contentId='" . $_GET["contentId"] . "'";
        $result = mysqli_query($conn, $sql);  

        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Content deleted successfully.');
            window.location.href='DeleteContent.php';
            </script>");

           
        
?>  