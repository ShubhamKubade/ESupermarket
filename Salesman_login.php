<?php
session_start();
if(isset($_SESSION['Email1'])) {
  $_SESSION['Email1'];
}
?>
<html>

<head>
    <title>Supermarket Management System</title>
    <link rel="stylesheet" href="index.css">

</head>

<body>
    <h1 class="center">Supermarket Management System</h1>
    <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="AboutUs.html">About Us</a></li>
        <li><a href="Register.html">Register</a></li>
        <li><a href="Login.html">Logout</a></li>
        <li><a href="Feedback.html">Feedback</a></li>

    </ul>
    <nav>
        <br>
        <b>Welcome <?php echo $_SESSION["Email1"]; ?></b>
          <br><br>
        <br>
        <a target="iframe" class="c1" onclick="funcView()">View Content</a><br><br>
        <a target="iframe" class="c1" onclick="funcAdd()">Add Content</a></br></br>
        <a target="iframe" class="c1" onclick="funcUpdate()">Update Content</a></br></br>
        <a target="iframe" class="c1" onclick="funcDelete()">Delete Content</a></br></br>
        <a target="iframe" class="c1" onclick="funcRemove()">View Orders</a><br><br>
    </nav>

    <section>
        <iframe id="iframe"></iframe>
    </section>
    <br>

    <script>
        function funcView() {
            document.getElementById("iframe").src = "ViewContent.php";
        }
        function funcAdd() {
            document.getElementById("iframe").src = "AddContent.html";
        }
        function funcUpdate() {
            document.getElementById("iframe").src = "UpdateContent.php";
        }
        function funcDelete() {
            document.getElementById("iframe").src = "DeleteContent.php";
        }
        function funcRemove() {
            document.getElementById("iframe").src = "StaffViewOrder.php";
        }

    </script>
    <p class="footer">
        CONNECT WITH US <br><br>
        Sindhudurg Shikshan Prasarak Mandal's College of Engineering, Kankavli.</br>

        A/P-Harkul Budruk, Tal- Kankavli. Dist-Sindhudurg.Maharashtra. 416602</br>

        PHONE: 91-2367-299214(office)/ 299442(Principal)</br>

        Email :sspmcoe@gmail.com Web: https://www.sspmcoe.ac.in Exam section : sspmcoeexam@gmail.com</br>

        Name & Address of the Principal- Dr.Aneesh Gangal, A/P-Harkul Budruk, Tal- Kankavli.
        Dist-Sindhudurg.Maharashtra. 416602</br>
        Email:principal@sspmcoe.ac.in.</br>
        PHONE: 91-2367-299214/299442/299112<br><br>


        Copyright © 2022 All rights reserved</p>

</body>

</html>