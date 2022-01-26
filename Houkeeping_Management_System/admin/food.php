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

if(isset($_POST["submit_food_type"]))
{
    $food_type = strings($_POST['food_type']);
    $query = "INSERT INTO food_type(food_type) VALUES('$food_type')";
    $result = mysqli_query($connect,$query);
    if($result)
        {
            echo "<script>
                    alert('Add Food Type Successfully');
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

if(isset($_POST['update_food_type']))
{
    $food_type_id = strings($_POST['food_type_id']);
    $food_type = strings($_POST['food_type']);
    $query = "UPDATE food_type SET food_type = '$food_type' WHERE food_type_id = '$food_type_id' ";
    $result = mysqli_query($connect,$query);
    if($result)
    {
        echo "<script>
                alert('Update Food Type Successfully');
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

if(isset($_POST['submit_food_quantity']))
{
    $food_quantity = strings($_POST['food_quantity']);
    $query = "INSERT INTO food_quentity(food_quentity) VALUES('$food_quantity')";
    $result = mysqli_query($connect,$query);
    if($result)
    {
        echo "<script>
                alert('Add Food Quantity Successfully');
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

if(isset($_POST['update_food_quantity']))
{
    $food_quantity_id = strings($_POST['food_quantity_id']);
    $food_quantity = strings($_POST['food_quantity']);
    $query = "UPDATE food_quentity SET food_quentity = '$food_quantity' WHERE food_quentity_id = '$food_quantity_id'";
    $result = mysqli_query($connect,$query);
    if($result)
    {
        echo "<script>
                alert(' Update Quantity Successfully');
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

if(isset($_POST['submit_food']))
{
    $food_type_id = strings($_POST["food_type_id"]);
    $food_name = strings($_POST['food_name']);
    $query = "INSERT INTO food(food_type_id , food) VALUES ('$food_type_id','$food_name')";
    $result = mysqli_query($connect,$query);
    if($result)
    {
        echo "<script>
                alert(' Add Food Successfully');
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
if(isset($_POST['upadte_food']))
{
    $food_id = strings($_POST['food_id']);
    $food_type_id = strings($_POST['food_type_id']);
    $food_name = strings($_POST['food_name']);
    $query = "UPDATE food SET food_type_id = '$food_type_id' , food = '$food_name' WHERE food_id = '$food_id'";
    $result = mysqli_query($connect,$query);
    if($result)
    {
        echo "<script>
                alert(' Update Food Successfully');
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
    case "add_food_type":
        include "./include/add_food_type.php";
        break;
    case "update_food_type":
        $food_type_id = strings($_POST['food_type_id']);
        include "./include/update_food_type.php";
        break;
    case "delete_food_type":
        $food_type_id = strings($_POST['food_type_id']);
        $query = "DELETE FROM food_type WHERE food_type_id ='$food_type_id' ";
        $result = mysqli_query($connect,$query);
        echo "<script>
                    location.href = './food.php';
                </script>";
        break;  
        
    case "add_food_quantity":
        include "./include/add_food_quantity.php";
        break;
    case "update_food_quentity":
        $food_quantity_id = strings($_POST['food_quantity_id']);
        include "./include/update_food_quantity.php";
        break;
    case "delete_food_quantity":
        $food_quantity_id = strings($_POST['food_quantity_id']);
        $query = "DELETE FROM food_quentity WHERE food_quentity_id='$food_quantity_id'";
        $result = mysqli_query($connect,$query);
        echo "<script>
                    location.href = './food.php';
                </script>";
        break;  
    case "add_food":
        include "./include/add_food.php";
        break;
    case "update_food":
        $food_id = strings($_POST['food_id']);
        include "./include/update_food.php";
        break;
    case "delete_food":
        $food_id = strings($_POST['food_id']);
        $query = "DELETE FROM food WHERE food_id = '$food_id'";
        $result = mysqli_query($connect,$query);
        echo "<script>
                    location.href = './food.php';
                </script>";

        break;


    default:
        include "./include/view_food.php";
        break;
}



?>