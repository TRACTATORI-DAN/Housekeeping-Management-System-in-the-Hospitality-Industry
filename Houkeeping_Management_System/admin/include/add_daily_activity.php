<?php
if (!isset($_SESSION)) {
    include "./back_session.php";
}
?>

<div class="input_value_div">
    <form action="./daily_activity.php" method="POST">
        <div class="input-group mb-3">
            <input type="text" name="daily_activity" class="form-control" placeholder="Add Daily Activity" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="submit_daily_activity">Submit</button>
        </div>
    </form>
</div>