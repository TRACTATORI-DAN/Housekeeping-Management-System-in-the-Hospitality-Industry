<?php
include "./include/header.php";
if(isset($_POST['room_status_update']))
{
    $room_status_id = strings($_POST['room_status_id']);
    $admin_note = strings($_POST['admin_note']);
    $staff_id = strings($_POST['staff_id']);
    $room_inspection = strings($_POST['room_inspection']);
    $room_status = strings($_POST['room_status']);
    $admin_name = $_SESSION['username'];
    $query = "UPDATE room_status SET housekeeper_id = '$staff_id', room_status = '$room_status', room_admin_note = '$admin_note',inspection_status = '$room_inspection',update_by = '$admin_name', update_date = '$date2' WHERE room_status_id = '$room_status_id'";
    $result = mysqli_query($connect,$query);
    $query = "UPDATE housekeeper_status SET housekeeper_status = 'Occupied' WHERE housekeeper_id = '$staff_id'";
    $housekeeper_status = mysqli_query($connect,$query);
    if($result)
        {
            echo "<script>
                    alert('Room Status Update Successfully');
                </script>";
            
        }
        else
        {
               
                echo "<script>
                    alert('Something went wrong');
                </script>";
                die();
        }

}




if(isset($_POST['action']))
{
    $action = strings($_POST['action']);
}
else
{
    $action = "";
}

switch($action)
{
    case 'view_room_status':
        $room_status_id = strings($_POST['room_status_id']);
        include "./include/update_room_status.php";
        break;
    default:
        include "./include/room_status.php";
        break;
}


?>


