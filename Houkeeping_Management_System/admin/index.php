<?php

include "./include/header.php";
function row_count($option,$querys)
{
    global $connect;
    $query = "SELECT * FROM room_status WHERE $querys = '$option'";
    $result = mysqli_query($connect,$query);
    $row_num = mysqli_num_rows($result);
    return $row_num;
}

$room_query = "SELECT * FROM room";
$room_result= mysqli_query($connect,$room_query);
$total_room = mysqli_num_rows($room_result);

function room_status($option)
{
    global $connect;
    $available_room_query = "SELECT * FROM room_status WHERE occupancy ='$option'";
    $result = mysqli_query($connect,$available_room_query);
    $num_row = mysqli_num_rows($result);
    return $num_row;

}

$staff_query = "SELECT * FROM staff INNER JOIN staff_type ON staff.staff_type = staff_type.staff_type_id INNER JOIN housekeeper_status ON staff.staff_id = housekeeper_status.housekeeper_id WHERE staff_type.staff_type ='Housekeeper' AND housekeeper_status.housekeeper_status = 'Available'";
$staff_result = mysqli_query($connect,$staff_query);
$housekeeper_no = mysqli_num_rows($staff_result);

?>

<div class="main_index">
    <div class="sub_index">
        <div class="inside_sub">
            <p id="one"><?php  echo $total_room; ?></p>
        </div>
        <div class="inside_sub">
            <h5>TOTAL ROOM</h5>
        </div>

    </div>

    <div class="sub_index">
        <div class="inside_sub">
            <p id="two"><?php  $option = 'Vacant'; echo room_status($option);  ?></p>
        </div>
        <div class="inside_sub">
            <h5>AVAILABLE ROOM</h5>
        </div>

    </div>

    <div class="sub_index">
        <div class="inside_sub">
            <p id="three"><?php  $option = 'Occupied'; echo room_status($option);  ?></p>
        </div>
        <div class="inside_sub">
            <h5>OCCUPIED</h5>
        </div>

    </div>

    <div class="sub_index">
        <div class="inside_sub">
            <p id="four"><?php $option='Clean' ;$querys='inspection_status'; echo row_count($option,$querys)  ;?></p>
        </div>
        <div class="inside_sub">
            <h5>CLEAN</h5>
        </div>

    </div>

    <div class="sub_index">
        <div class="inside_sub">
            <p id="five"><?php $option='Dirty' ; $querys='inspection_status'; echo row_count($option,$querys)  ;?></p>
        </div>
        <div class="inside_sub">
            <h5>DIRTY</h5>
        </div>

    </div>

    <div class="sub_index">
        <div class="inside_sub">
            <p id="six"><?php $option='Out-Of-Service' ; $querys='room_status'; echo row_count($option,$querys)   ;?></p>
        </div>
        <div class="inside_sub">
            <h5>OUT OF SERVICE</h5>
        </div>

    </div>

    <div class="sub_index">
        <div class="inside_sub">
            <p id="seven"><?php $option='Out-Of-Order' ; $querys='room_status'; echo row_count($option,$querys)  ;?></p>
        </div>
        <div class="inside_sub">
            <h5>OUT OF ORDER</h5>
        </div>

    </div>

    <div class="sub_index">
        <div class="inside_sub">
            <p id="eight"><?php  echo $housekeeper_no;  ?></p>
        </div>
        <div class="inside_sub">
            <h5>AVAILABLE HOUSEKEEPER</h5>
        </div>

    </div>

</div>