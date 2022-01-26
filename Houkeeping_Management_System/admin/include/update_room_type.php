<?php
 if(!isset($_SESSION))
    {
    include "./back_session.php";
        }
    $query = "SELECT * FROM room_type WHERE id = '$room_type_id'";
    $result = mysqli_query($connect,$query);
    $row = mysqli_fetch_assoc($result);
?>


<div class="input_value_div" >
    <form action="./manage_room.php" method="POST">
        <div class="input-group mb-3">
            <input type="text" name="room_type" value="<?php  echo $row['room_type']  ?>" class="form-control" placeholder="add floor name" aria-label="Recipient's username" aria-describedby="button-addon2">
            <input type="hidden" name="room_type_id" value="<?php echo $row['id']; ?>">
            <button class="btn btn-outline-secondary" type="submit" name="update_room_type" id="button-addon2" name="submit_floor">Update</button>
        </div>
    </form> 
</div>