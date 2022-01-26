<?php
    
    include "./include/header.php";
    include "./include/admin_session.php";
    if(isset($_POST['submit_floor']))
    {
        $floor_name = strings($_POST['floor_name']);
        $query = "INSERT INTO floor(floor_name) VALUES ('$floor_name')";
        $result = mysqli_query($connect,$query);
        if($result)
        {
            echo "<script>
                    alert('Floor add successfully');
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
    if(isset($_POST['submit_room']))
    {
        $flood_id = strings($_POST['floor_id']);
        $room_name = strings($_POST['room_name']);
        $room_type_id = strings($_POST['room_type_id']);

        $query = "INSERT INTO room(floor_id,room_name,room_type_id) VALUES ('$flood_id','$room_name','$room_type_id')";
        $result = mysqli_query($connect,$query);

        $room_query = "SELECT * FROM room WHERE room_name = '$room_name'";
        $room_result = mysqli_query($connect,$room_query);
        $room_row = mysqli_fetch_assoc($room_result);
        $room_id = $room_row['id'];

        $update_by = $_SESSION['username'];
        
        $room_status_query = "INSERT INTO room_status(room_id,room_type_id,update_by,update_date) VALUES ('$room_id','$room_type_id','$update_by',now())";
        $room_status_result = mysqli_query($connect,$room_status_query);

        if($result)
        {
            echo "<script>
                    alert('Room add successfully');
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
    if(isset($_POST['submit_room_type']))
    {
        $room_type = strings($_POST['room_type']);

        $query = "INSERT INTO room_type(room_type) VALUES ('$room_type')";
        $result = mysqli_query($connect,$query);
        if($result)
        {
            echo "<script>
                    alert('Room Type add successfully');
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
    if(isset($_POST['update_floor']))
    {
        
        $floor_name = strings($_POST['floor_name']);
        $floor_id = strings($_POST['floor_id']);
        $query = "UPDATE floor SET floor_name = '$floor_name' WHERE id = '$floor_id'";
        $result = mysqli_query($connect,$query);
        if($result)
        {
            echo "<script>
                    alert('Floor Update successfully');
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
    if(isset($_POST['update_room_type']))
    {
        
        $room_type = strings($_POST['room_type']);
        $room_type_id = strings($_POST['room_type_id']);
        $query = "UPDATE room_type SET room_type = '$room_type' WHERE id = '$room_type_id'";
        $result = mysqli_query($connect,$query);
        if($result)
        {
            echo "<script>
                    alert('Room Type Update successfully');
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
    if(isset($_POST['update_room']))
    {   
        $room_id = strings($_POST['room_id']);
        $floor_id = strings($_POST['floor_id']);
        $room_name = strings($_POST['room_name']);
        $room_type_id = strings($_POST['room_type_id']);
        $query = "UPDATE room SET floor_id='$floor_id' , room_name = '$room_name' , room_type_id='$room_type_id' WHERE id = '$room_id'";
        $result = mysqli_query($connect,$query);
        if($result)
        {
            echo "<script>
                    alert('Room Update successfully');
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

?>

<?php

    
    if (isset($_POST['action']))
    {
        $action = strings($_POST['action']);
    }
    else
    {
        $action = "";
    }
    switch($action)
    {
        case "add_floor":
            include "./include/add_floor.php";
            break;
        case "add_room":
            include "./include/add_room.php";
            break;
        case "add_room_type":
                include "./include/add_room_type.php";
                break;
        case "update_floor":
                    $floor_id = strings($_POST['floor_id']);
                    include "./include/update_floor.php";
                    break;
        case "delete_floor":
                    $floor_id = strings($_POST['floor_id']);
                    $query = "DELETE FROM floor WHERE id = '$floor_id'";
                    $result = mysqli_query($connect,$query);
                    echo "<script>
                    location.href = './manage_room.php';
                    </script>";
                    break;
        case "update_room_type":
                    $room_type_id = strings($_POST['room_type_id']);
                    include "./include/update_room_type.php";
                    break;
        case "delete_room_type":
                    $room_type_id = strings($_POST['room_type_id']);
                    $query = "DELETE FROM room_type WHERE id = '$room_type_id'";
                    $result = mysqli_query($connect,$query);
                    echo "<script>
                    location.href = './manage_room.php';
                    </script>";
                    break;
        
        case "room_update":
                    $room_id = strings($_POST['room_id']);
                    include "./include/update_room.php";
                    break;

        case "room_delete":
                    $room_id = strings($_POST['room_id']);
                    $query = "DELETE FROM room WHERE id = '$room_id'";
                    $result = mysqli_query($connect,$query);
                    echo "<script>
                    location.href = './manage_room.php';
                    </script>";
                    break;
        
        default :
            include "./include/manage_room.php";
            break;
    }

?>
