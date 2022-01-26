<?php

    if(!isset($_SESSION))
    {
    include "./back_session.php";
    }

    $query = "SELECT  * FROM food_quentity WHERE food_quentity_id = '$food_quantity_id' ";
    $result = mysqli_query($connect,$query);
    $row = mysqli_fetch_assoc($result);
?>
<div class="input_value_div" >
    <form action="./food.php" method="POST">
        <div class="input-group mb-3">
            <input type="hidden" name="food_quantity_id" value="<?php echo $row['food_quentity_id'];  ?>">
            <input type="text" name="food_quantity" class="form-control" value="<?php echo $row['food_quentity'] ; ?>" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-success" type="submit" id="button-addon2" name="update_food_quantity">Submit</button>
        </div>
    </form> 
</div>