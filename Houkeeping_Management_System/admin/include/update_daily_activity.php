<?php

if(!isset($_SESSION))
{
include "./back_session.php";
}


$query = "SELECT * FROM daily_activity WHERE daily_activity_id = '$daily_activity_id'";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);

?>



<div class="input_value_div">
    <form action="./daily_activity.php" method="POST">
        <div class="input-group mb-3">
            <input type="hidden" name="daily_activity_id" value="<?php echo $row['daily_activity_id']; ?>">
            <input type="text" value="<?php echo $row['daily_activity']; ?>" name="daily_activity" class="form-control" placeholder="Add Staff Type" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="update_activity">Update</button>
        </div>
    </form>
</div>