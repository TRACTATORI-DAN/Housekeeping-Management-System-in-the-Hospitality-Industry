<?php
if (!isset($_SESSION)) {
    include "./back_session.php";
}
?>

<div class="staff_main_div">
    <div class="main_add_div">
        <div class="sub_staff_div">
            <form action="./monthly_roster.php" method="POST">
                <input type="hidden" name="action" value="add_monthly_roster">
                <button class="btn btn-primary" type="submit">Add Monthly Roster </button>
            </form>
        </div>
    </div>

    <div>
        <div class="table_heading">
            <h5>MONTHLY ROSTER</h5>
        </div>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Staff Type</th>
                    <th scope="col">Staff Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Working Hours</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM monthly_roster INNER JOIN staff_type ON monthly_roster.staff_type_id = staff_type.staff_type_id INNER JOIN staff ON monthly_roster.staff_id = staff.staff_id ";
                $result = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $row['monthly_roster_id']; ?></th>
                        <td><?php echo $row['staff_type']; ?></td>
                        <td><?php echo $row['staff_name']; ?></td>
                        <td><?php echo $row['date_from']; ?> To <?php echo $row['date_to']; ?></td>
                        <td><?php echo $row['time_from']; ?> To <?php echo $row['time_to']; ?></td>
                        <td>
                            <form action="./monthly_roster.php" method="POST">
                                <input type="hidden" name="monthly_roster_id" value="<?php echo $row['monthly_roster_id']; ?>">
                                <input type="hidden" name="action" value="update_monthly_roster">
                                <button class=" btn btn-primary ">&#x1F441;</button>
                            </form>
                        </td>
                        <td>
                            <form action="./monthly_roster.php" method="POST">
                                <input type="hidden" name="monthly_roster_id" value="<?php echo $row['monthly_roster_id']; ?>">
                                <input type="hidden" name="action" value="delete_monthly_roster">
                                <button class="btn btn-danger">&cross;</button>

                            </form>
                        </td>
                    </tr><?php } ?>
            </tbody>
        </table>
    </div>
</div>