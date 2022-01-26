<?php

include "./include/header.php";
include "./include/admin_session.php";


if(isset($_POST['action']))
{
    $action = strings($_POST['action']);
}
else
{
    $action = "";
}

if(isset($_POST['submit_daily_activity']))
{
    $activity = strings($_POST['daily_activity']);
    $query = "INSERT INTO daily_activity (daily_activity) VALUES ('$activity')";
    $result = mysqli_query($connect,$query);
    if ($result) {
        echo "<script>
                    alert('Daily Activity add successfully');
                </script>";
    } else {

        echo "<script>
                    alert('Something went wrong');
                </script>";
        die();
    }
}
if (isset($_POST['update_activity'])) {
    $activity = strings($_POST['daily_activity']);
    $daily_activity_id = strings($_POST['daily_activity_id']);
    $query = "UPDATE daily_activity SET daily_activity = '$activity' WHERE daily_activity_id = '$daily_activity_id'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        echo "<script>
                    alert('Daily Activity Update successfully');
                </script>";
    } else {

        echo "<script>
                    alert('Something went wrong');
                </script>";
        die();
    }
}






switch($action)
{
    case 'add_daily_activity':
        include "./include/add_daily_activity.php";
        break;

    case 'update_activity':
        $daily_activity_id = strings($_POST['daily_activity_id']);
        include "./include/update_daily_activity.php";
        break;

    case 'delete_activity':
        $daily_activity_id = strings($_POST['daily_activity_id']);
        $query = "DELETE FROM daily_activity WHERE daily_activity_id = '$daily_activity_id'";
        $result = mysqli_query($connect,$query);
        echo "<script>
        location.href = './daily_activity.php';
        </script>";
        break;

    default:
        include "./include/view_daily_activity.php";
        break;
}




?>