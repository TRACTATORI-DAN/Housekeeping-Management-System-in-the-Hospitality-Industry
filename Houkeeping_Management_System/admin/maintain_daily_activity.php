<?php

include "./include/header.php";


if (isset($_POST['submit_activity'])) {
    $daily_activity_id = $_POST['daily_activity_id'];
    $query = "UPDATE daily_activity SET daily_activity_date = '$date1' WHERE daily_activity_id = '$daily_activity_id' ";
    $result = mysqli_query($connect, $query);
    if ($result) {
        echo "<script>
                    alert('Daily Activity Submit successfully');
                </script>";
    } else {

        echo "<script>
                    alert('Something went wrong');
                </script>";
        die();
    }
    $query = "INSERT INTO submit_daily_activity (daily_activity_id,date) VALUES ('$daily_activity_id' ,'$date2')";
    $result = mysqli_query($connect, $query);
}



?>

<div class="submit_activity">
    <div class="table_heading">
        <h5>DAILY ACTIVITY</h5>
    </div>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Daily Activity</th>
                <th scope="col">Check</th>
                <th scope="col">Submit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $id = 1;
            $query = "SELECT * FROM daily_activity WHERE daily_activity_date NOT IN('$date1')";
            $result = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $id; $id = $id + 1;  ?></td>
                    <td scope="row"><?php echo $row['daily_activity']; ?></td>
                    <form action="./maintain_daily_activity.php" method="POST">
                        <td>
                            <input type="hidden" name="daily_activity_id" value="<?php echo $row['daily_activity_id']; ?>">
                            <div>
                                <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="..." required>
                            </div>
                        </td>
                        <td>
                            <input type="hidden" name="submit_activity" value="submit_activity">
                            <button class=" btn btn-success ">&#x1F441;</button>
                    </form>
                    </td>
                </tr>
            <?php  } ?>
        </tbody>
    </table>
</div>
</div>
</div>