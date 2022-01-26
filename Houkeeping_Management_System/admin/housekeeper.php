<?php
include "./include/header.php";

?>
<div class="housekeeper_main_div">
    <div class="table_heading">
            <h5>HOUSEKEEPER SECTION</h5>
    </div>
    <table class="table table-dark table-striped">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php   
            $query = "SELECT * FROM housekeeper_status INNER JOIN staff ON housekeeper_status.housekeeper_id = staff.staff_id ";
            $result = mysqli_query($connect,$query);
            while($row = mysqli_fetch_assoc($result))
            {
        ?>
        <tr>
            <th scope="row"><?php  echo $row['staff_name'] ;?></th>
            <td><?php  echo $row['staff_email'] ;?></td>
            <td><?php  echo $row['staff_contact_no'] ;?></td>
            <td><p class="<?php  echo $row['housekeeper_status'] ;?>"><?php  echo $row['housekeeper_status'] ;?></p></td>
        </tr><?php } ?>
    </tbody>
    </table>

</div>