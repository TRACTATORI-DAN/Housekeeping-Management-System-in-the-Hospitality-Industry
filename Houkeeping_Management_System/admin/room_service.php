<?php
include "./include/header.php";
if(isset($_POST['action']))
{
    $action = strings($_POST['action']);
}
else
{
    $action = "";
}
if(isset($_POST['search_food']))
{   
    $room_id = strings($_POST['room_id']);
    $food_type_id = strings($_POST['food_type_id']);
    $_SESSION['room_id'] = $room_id;
    $_SESSION['food_type_id'] = $food_type_id;
}

if(isset($_POST['add_to_list']))
{
    $room_id = $_SESSION['room_id'];
    $food_type_id = $_SESSION['food_type_id']; 
    $food_id = strings($_POST['food_id']);
    $food_quantity_id = strings($_POST['food_quantity_id']);
    $query = "INSERT INTO order_list(room_id,food_id,food_quentity_id) VALUES('$room_id','$food_id','$food_quantity_id')";
    $result = mysqli_query($connect,$query);
    $_SESSION['food_type_id'] = NULL;
    $_SESSION['order_id'] = rand(101023,998567);
    echo "<script>
    location.href = './room_service.php';
    </script>";

}
if(isset($_POST['place_order']))
{
    $room_id = $_SESSION['room_id'];
    $order_id = $_SESSION['order_id'];
    $admin_name = $_SESSION['username'];
    $query = "SELECT * FROM order_list WHERE room_id = '$room_id'";
    $results = mysqli_query($connect,$query);
    while($row = mysqli_fetch_assoc($results))
    {
        $room_id = strings($row['room_id']);
        $food_id = strings($row['food_id']);
        $food_quantity_id = strings($row['food_quentity_id']);
        $query = "INSERT INTO room_service(room_id,food_id,food_quentity_id,date,order_id) VALUES('$room_id','$food_id','$food_quantity_id','$date2','$order_id')";
        $result = mysqli_query($connect,$query);
       
    }
    $query = "INSERT INTO food_order(room_id,order_taken_by,order_id,date) VALUES ('$room_id','$admin_name','$order_id','$date2')";
    $result = mysqli_query($connect,$query);
    $query = "DELETE FROM order_list WHERE room_id = '$room_id'";
    $result = mysqli_query($connect,$query);
    $_SESSION['room_id'] = NULL;
    if($result)
    {
        echo "<script>
                alert(' Order Placed');
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

switch($action)
{
    case "delete_order_list":
        $order_list_id = strings($_POST['order_list_id']);
        $query = "DELETE FROM order_list WHERE order_list_id = '$order_list_id'";
        $result = mysqli_query($connect,$query);
        echo "<script>
        location.href = './room_service.php';
        </script>"; 
        break;
    default:
        include "./include/add_room_service.php";
        break;
}


?>