<?php
    
    include "./include/header.php";
    include "./include/admin_session.php";

    if(isset($_POST['submit_staff_type']))
    {
        $staff_type = strings($_POST['staff_type']);
        $query = "INSERT INTO staff_type(staff_type) VALUES ('$staff_type')";
        $result = mysqli_query($connect,$query);
        if($result)
        {
            echo "<script>
                    alert('Staff Type Add successfully');
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
    elseif(isset($_POST['update_staff_type']))
    {
        $staff_type_id = strings($_POST['staff_type_id']);
        $staff_type = strings($_POST['staff_type']);
        $query = "UPDATE staff_type SET staff_type='$staff_type' WHERE staff_type_id = '$staff_type_id' ";
        $result = mysqli_query($connect,$query);
        if($result)
        {
            echo "<script>
                    alert('Staff Type Update successfully');
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
        case 'add_staff_type':
            include "./include/add_staff_type.php";
            break;

        case 'update_staff_type':
            $staff_type_id = strings($_POST['staff_type_id']);
            include "./include/update_staff_type.php";
            break;

        case 'delete_staff_type':
            $staff_type_id = strings($_POST['staff_type_id']);
            $query = "DELETE FROM staff_type WHERE staff_type_id = '$staff_type_id'";
            $result = mysqli_query($connect,$query);
            echo "<script>
                    location.href = './staff_type.php';
                </script>";
            break;
        default:
            include "./include/view_staff_type.php";
    }



?>