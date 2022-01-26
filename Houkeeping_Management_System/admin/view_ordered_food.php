<?php
include "./include/header.php";

?>
<div class="housekeeper_main_div">
    <div class="table_heading">
            <h5>ORDERED FOOD SECTION</h5>
    </div>
    <table class="table table-dark table-striped">
    <thead>
        <tr>
            <th scope="col">Order Id</th>
            <th scope="col">Room Name</th>
            <th scope="col">Order Status</th>
            <th scope="col">Order Taken By</th>
            <th scope="col">Time</th>
        </tr>
    </thead>
    <tbody>
        <?php   
            $query = "SELECT * FROM food_order INNER JOIN room ON food_order.room_id = room.id ";
            $result = mysqli_query($connect,$query);
            while($row = mysqli_fetch_assoc($result))
            {
        ?>
        <tr>
            <th scope="row"><?php  echo $row['order_id'] ;?></th>
            <td><?php  echo $row['room_name'] ;?></td>
            <td><p class="<?php  echo $row['order_status'] ;?>"><?php  echo $row['order_status'] ;?></p></td>
            <td><?php  echo $row['order_taken_by'] ;?></td>
            <td><?php  echo $row['date'] ;?></td>
        </tr><?php } ?>
    </tbody>
    </table>

</div>