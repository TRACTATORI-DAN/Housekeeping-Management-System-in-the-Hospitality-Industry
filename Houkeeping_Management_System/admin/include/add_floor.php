<?php
if(!isset($_SESSION))
{
include "./back_session.php";
}
?>
<div class="input_value_div" >
    <form action="./manage_room.php" method="POST">
        <div class="input-group mb-3">
            <input type="text" name="floor_name" class="form-control" placeholder="add floor name" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="submit_floor">Submit</button>
        </div>
    </form> 
</div>

