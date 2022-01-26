<?php

include "./include/header.php";
include "./include/admin_session.php";

if(isset($_POST['add_staff']))
{

    $staff_name = strings($_POST['staff_name']);
    $staff_email = strings($_POST['staff_email']);
    $staff_contact = strings($_POST['staff_number']);
    $staff_type_id = strings($_POST['staff_type_id']);
    $staff_password = rand(109567,986745);

    

    $querys = "SELECT * FROM staff_type WHERE staff_type_id = '$staff_type_id'";
    $results = mysqli_query($connect,$querys);
    $staff_types = mysqli_fetch_assoc($results);
    $staff_types_name = $staff_types['staff_type'];
    $query = "INSERT INTO staff(staff_name,staff_email,staff_contact_no,staff_password,staff_type) VALUES ('$staff_name','$staff_email','$staff_contact','$staff_password','$staff_type_id')";
    $result = mysqli_query($connect,$query);
    if($staff_types_name == 'Housekeeper')
    {   
        $query = "SELECT * FROM staff WHERE staff_email = '$staff_email' ";
        $res = mysqli_query($connect,$query);
        $staff_id = mysqli_fetch_assoc($res);
        $staffs_id = $staff_id['staff_id'];
        $querys = "INSERT INTO housekeeper_status(housekeeper_id) VALUES ('$staffs_id')";
        $results = mysqli_query($connect,$querys);
    }
    if($result)
    {
        echo "<script>
                    alert('Staff  Add successfully');
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

if(isset($_POST['update_staff']))
{
    $staff_id = strings($_POST['staff_id']);
    $staff_name = strings($_POST['staff_name']);
    $staff_email = strings($_POST['staff_email']);
    $staff_contact = strings($_POST['staff_number']);
    $staff_type_id = strings($_POST['staff_type_id']);
    

    $query = "UPDATE staff SET staff_name='$staff_name' , staff_email='$staff_email', staff_contact_no ='$staff_contact',staff_type = '$staff_type_id' WHERE staff_id = '$staff_id'";
    $result = mysqli_query($connect,$query);
    if($result)
    {
        echo "<script>
                    alert('Staff  Update successfully');
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
    $_action = strings($_POST['action']);
}
else
{
    $_action="";
}


switch($_action)
{
    case 'add_staff':
        include "./include/add_staff.php";
        break;
    case 'update_staff':
        $staff_id = strings($_POST['staff_id']);
        include "./include/update_staff.php";
        break;
    case 'delete_staff':
        $staff_id = strings($_POST['staff_id']);
        $query = "DELETE FROM staff WHERE staff_id = '$staff_id'";
        $result = mysqli_query($connect,$query);
        echo "<script>
        location.href = './staff.php';
            </script>";
        break;
    default:
        include "./include/view_staff.php";
        break;
}



?>