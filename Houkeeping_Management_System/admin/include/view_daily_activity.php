<?php
if (!isset($_SESSION)) {
    include "./back_session.php";
}
?>
<div class="staff_type_main_div">
    <div class="main_add_div">
        <div class="sub_staff_type_div">
            <form action="./daily_activity.php" method="POST">
                <input type="hidden" name="action" value="add_daily_activity">
                <button class="btn btn-primary" type="submit">Add Daily Activity</button>
            </form>
        </div>
    </div>
    <div>
        <div class="table_heading">
            <h5>DAILY ACTIVITY</h5>
        </div>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Daily Activity</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM daily_activity";
                $result = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $row['daily_activity_id']; ?></th>
                        <td><?php echo $row['daily_activity']; ?></td>
                        <td>
                            <form action="./daily_activity.php" method="POST">
                                <input type="hidden" name="daily_activity_id" value="<?php echo $row['daily_activity_id']; ?>">
                                <input type="hidden" name="action" value="update_activity">
                                <button class=" btn btn-primary ">&#x1F441;</button>
                            </form>
                        </td>
                        <td>
                            <form action="./daily_activity.php" method="POST">
                                <input type="hidden" name="daily_activity_id" value="<?php echo $row['daily_activity_id']; ?>">
                                <input type="hidden" name="action" value="delete_activity">
                                <button class="btn btn-danger">&cross;</button>

                            </form>

                        </td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
</div>