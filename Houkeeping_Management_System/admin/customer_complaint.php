<?php

include "./include/header.php";

if(isset($_POST['action']))
{
    $action = strings($_POST['action']) ;
}
else
{
    $action = "";
}

if(isset($_POST['submit_complaint']))
{

    $room_id = strings($_POST['room_id']) ;
    $customer_name = strings($_POST['customer_name']);
    $complaints = strings($_POST['complaint']);
    $taken_by = $_SESSION['username'];

    $query = "INSERT INTO customer_complaint(complaint,taken_by,complaint_by,time,room_no) VALUES ('$complaints','$taken_by','$customer_name','$date2','$room_id')";
    $result = mysqli_query($connect,$query);
    if ($result) {
        echo "<script>
                    alert('Complaint Add successfully');
                </script>";
    } else {

        echo "<script>
                    alert('Something went wrong');
                </script>";
        die();
    }
}

if(isset($_POST['complaint_update']))
{
    $complaint_id = strings($_POST['complaint_id']);
    $complaint_status =strings($_POST['complaint_status']);
    $query = "UPDATE customer_complaint SET cumtomer_complaint_status = '$complaint_status' WHERE cumtomer_complaint_id = '$complaint_id'";
    $result = mysqli_query($connect,$query);
        if ($result) {
            echo "<script>
                    alert('Complaint Status Update successfully');
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
    case "add_complaint":
        include "./include/add_complaint.php";
        break;
    case "update_complaint":
        $complaint_id = strings($_POST['complaint_id']);
        include "./include/update_complaint.php";
        break;
    default:
        include "./include/view_customer_complaints.php";
        break;
}






?>