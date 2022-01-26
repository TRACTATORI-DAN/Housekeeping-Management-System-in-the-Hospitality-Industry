<?php
 if(!isset($_SESSION))
    {
    include "./back_session.php";
    }

$query = "SELECT * FROM food INNER JOIN food_type ON food.food_type_id = food_type.food_type_id WHERE food_id = '$food_id'";
$result = mysqli_query($connect,$query);
$rows = mysqli_fetch_assoc($result);
?>
<div class="input_value_div" style="width: 40% !important ;">
    <form action="./food.php" method="POST">
        <select name="food_type_id" class="form-select" aria-label="Default select example">
            <option value="<?php  echo $rows['food_type_id']; ?>"><?php  echo $rows['food_type']; ?></option>
            <?php  
            
                $query = "SELECT * FROM food_type";
                $result = mysqli_query($connect,$query);
                while($row = mysqli_fetch_assoc($result))
                {
            ?>
            <option value="<?php echo $row['food_type_id']; ?>"><?php  echo $row['food_type']; ?></option>
            <?php } ?>
        </select>
        <div class="input-group mb-3" style="margin: 2rem 0px;">
            <input type="text" class="form-control" value="<?php echo $rows['food']  ?>" name="food_name" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <input type="hidden" name="food_id" value="<?php  echo $rows['food_id']; ?>">
        <button type="submit" class="btn btn-success" name="upadte_food">Submit</button>
    </form>
</div>