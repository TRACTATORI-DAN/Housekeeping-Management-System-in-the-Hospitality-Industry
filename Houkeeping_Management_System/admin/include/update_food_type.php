<?php
   if(!isset($_SESSION))
    {
    include "./back_session.php";
        }
    $query = "SELECT * FROM food_type WHERE food_type_id = '$food_type_id'";
    $result = mysqli_query($connect,$query);
    $row = mysqli_fetch_assoc($result);

?>
<div class="input_value_div" >
    <form action="./food.php" method="POST">
        <div class="input-group mb-3">
            <input type="hidden" name="food_type_id" value="<?php  echo $row['food_type_id']; ?>">
            <input type="text" name="food_type" class="form-control" value="<?php  echo $row['food_type']; ?>" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-success" type="submit" id="button-addon2" name="update_food_type">Update</button>
        </div>
    </form> 
</div>