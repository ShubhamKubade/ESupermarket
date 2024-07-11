<?php
session_start();
unset($_SESSION["Email"]);
unset($_SESSION["cart"]);
header("Location:login.html");
?>