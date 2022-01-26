<?php
if (!isset($_SESSION)) {
    include "./back_session.php";
}
?>

<div class="input_value_div">
    <form action="./food.php" method="POST">
        <div class="input-group mb-3">
            <input type="text" name="food_type" class="form-control" placeholder="Add Food Type" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="submit_food_type">Submit</button>
        </div>
    </form>
</div>