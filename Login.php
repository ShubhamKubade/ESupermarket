<?php   
session_start();   
   $conn = mysqli_connect("localhost", "root", "", "supermarket");
          
   // Check connection
   if($conn === false){
       die("ERROR: Could not connect. " 
           . mysqli_connect_error());
   }

    $Email = $_REQUEST['Email'];  
    $Password = $_REQUEST['Password'];  
      
        $sql = "select * from register where Email = '$Email' and Password = '$Password' ";  
        $result = mysqli_query($conn, $sql);  

        $sql2 = "select distinct Role from register where Email = '$Email'";  
        $data = mysqli_query($conn, $sql2); 

        if($result->num_rows>0){ 
            $_SESSION["Email1"] = $Email;

            while($row = $data->fetch_assoc()) {
                //echo "<br> id: ". $row["Role"];
                if($row["Role"] == 'Customer'){
                    echo ("<script LANGUAGE='JavaScript'>
                    window.location.href='Customer_login.php';
                    </script>");
                }
                elseif($row["Role"] == 'Manager'){
                    echo ("<script LANGUAGE='JavaScript'>
                    window.location.href='Manager_login.php';
                    </script>");
                }
                elseif($row["Role"] == 'Owner'){
                    echo ("<script LANGUAGE='JavaScript'>
                    window.location.href='Owner_login.php';
                    </script>");
                }
                else{
                    echo ("<script LANGUAGE='JavaScript'>
                    window.location.href='Salesman_login.php';
                    </script>");
                }
            }
           
        }  
        else{  
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Invalid Email or Password...');
            window.location.href='Login.html';
            </script>");
        }     
?>  