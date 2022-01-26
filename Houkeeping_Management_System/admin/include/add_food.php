<?php
if (!isset($_SESSION)) {
    include "./back_session.php";
}
?>
<div class="input_value_div" style="width: 40% !important ;">
    <form action="./food.php" method="POST">
        <select name="food_type_id" class="form-select" aria-label="Default select example">
            <option selected>Select Food Type</option>
            <?php

            $query = "SELECT * FROM food_type";
            $result = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?php echo $row['food_type_id']; ?>"><?php echo $row['food_type']; ?></option>
            <?php } ?>
        </select>
        <div class="input-group mb-3" style="margin: 2rem 0px;">
            <input type="text" class="form-control" placeholder="Enter Food Name" name="food_name" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <button type="submit" class="btn btn-primary" name="submit_food">Submit</button>
    </form>
</div>