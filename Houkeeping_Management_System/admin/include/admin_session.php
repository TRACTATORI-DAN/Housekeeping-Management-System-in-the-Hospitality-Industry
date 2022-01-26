<?php
if(!isset($_SESSION['admin_user']))
{
    session_destroy();
    echo "<script> location.href = '../login.php' ; </script>";
}

?>