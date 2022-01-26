<?php

function strings($string)
{
    global $connect;
    $count = strlen($string);
    if($count >= 1 )
    {
    $str = mysqli_real_escape_string($connect,$string);
    return $str;
    }
    else
    {
        echo "<script>
                alert('Emplty value not allowed');
                window.location.href=window.location.href;
            </script>";
    }

}




?>