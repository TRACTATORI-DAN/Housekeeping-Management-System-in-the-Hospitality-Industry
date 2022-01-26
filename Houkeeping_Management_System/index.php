<?php
session_start();
if(isset($_SESSION['admin_login']))
{

    header("Location: ./admin/index.php");

}
else
{
    header("Location: ./login.php");
}

?>