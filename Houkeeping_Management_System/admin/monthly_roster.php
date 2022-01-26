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

if(isset($_POST['add_monthly_roster']))
{
    $staff_type_id = strings($_POST['staff_type_id']);
    $staff_id = strings($_POST['staff_id']);
    $date_from = strings($_POST['date_from']);
    $date_to = strings($_POST['date_to']);
    $time_from = strings($_POST['time_from']);
    $time_to = strings($_POST['time_to']);
  

    $query = "INSERT INTO monthly_roster(staff_type_id,staff_id,date_from,date_to,time_from,time_to) VALUES ('$staff_type_id','$staff_id','$date_from', '$date_to','$time_from' ,'$time_to')";
    $result = mysqli_query($connect,$query);
    if ($result) {
        echo "<script>
                    alert('Monthly Roster Create successfully');
                </script>";
    } else {

        echo "<script>
                    alert('Something went wrong');
                </script>";
        die();
    }
    
}
if (isset($_POST['update_monthly_roster'])) {
    $monthly_roster_id = strings($_POST['monthly_roster_id']);
    $staff_type_id = strings($_POST['staff_type_id']);
    $staff_id = strings($_POST['staff_id']);
    $date_from = strings($_POST['date_from']);
    $date_to = strings($_POST['date_to']);
    $time_from = strings($_POST['time_from']);
    $time_to = strings($_POST['time_to']);


    $query = "UPDATE monthly_roster SET staff_id = '$staff_id', staff_type_id = '$staff_type_id', date_from = '$date_from' , date_to = '$date_to ' , time_from = '$time_from' , time_to = '$time_to' WHERE monthly_roster_id  = '$monthly_roster_id'  ";
    $result = mysqli_query($connect, $query);
    if ($result) {
        echo "<script>
                    alert('Monthly Roster Update successfully');
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
    case "add_monthly_roster":
        include "./include/add_monthly_roster.php";
        break;
    case "update_monthly_roster":
        $monthly_roster_id  = strings($_POST['monthly_roster_id']);
        include "./include/update_monthly_roster.php";
        break;
    case "delete_monthly_roster":
        $monthly_roster_id  = strings($_POST['monthly_roster_id']);
        $query = "DELETE FROM monthly_roster WHERE monthly_roster_id = '$monthly_roster_id'";
        $result = mysqli_query($connect,$query);
        echo "<script>
        location.href = './monthly_roster.php';
            </script>";

        break;
    default:
        include "./include/view_monthly_roster.php";
        break;
}




?>