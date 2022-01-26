<?php
if (!isset($_SESSION)) {
    include "./back_session.php";
}
?>
<div class="staff_main_div">
    <div class="main_add_div">
        <div class="sub_staff_div">
            <form action="./staff.php" method="POST">
                <input type="hidden" name="action" value="add_staff">
                <button class="btn btn-primary" type="submit">Add Staff </button>
            </form>
        </div>
    </div>

    <div>
        <div class="table_heading">
            <h5>STAFF SECTION</h5>
        </div>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Staff Position</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM staff INNER JOIN staff_type ON staff.staff_type = staff_type.staff_type_id ";
                $result = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $row['staff_name']; ?></th>
                        <td><?php echo $row['staff_email']; ?></td>
                        <td><?php echo $row['staff_contact_no']; ?></td>
                        <td><?php echo $row['staff_type']; ?></td>
                        <td>
                            <form action="./staff.php" method="POST">
                                <input type="hidden" name="staff_id" value="<?php echo $row['staff_id']; ?>">
                                <input type="hidden" name="action" value="update_staff">
                                <button class=" btn btn-primary ">&#x1F441;</button>
                            </form>
                        </td>
                        <td>
                            <form action="./staff.php" method="POST">
                                <input type="hidden" name="staff_id" value="<?php echo $row['staff_id']; ?>">
                                <input type="hidden" name="action" value="delete_staff">
                                <button class="btn btn-danger">&cross;</button>

                            </form>

                        </td>
                    </tr><?php } ?>
            </tbody>
        </table>
    </div>
</div>