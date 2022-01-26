<?php
session_start();
if(!isset($_SESSION['admin_login']))
{
    echo "<script> location.href = '../login.php' ; </script>";
}





?>