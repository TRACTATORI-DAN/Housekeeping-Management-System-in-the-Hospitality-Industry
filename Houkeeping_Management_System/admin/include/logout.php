<?php

session_start();
session_destroy();
if (!isset($_SERVER['admin_login'])) {
    echo "<script> location.href = '../../login.php' ; </script>";
}


?>