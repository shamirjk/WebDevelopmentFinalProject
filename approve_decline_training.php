<?php
    include("my_db.php");
    if(isset($_POST['training_id']) && isset($_POST['coach_id']) && isset($_POST['training_status'])){
        if($_POST['training_status'] == "1") {
            echo"query accept";
        }

        else if($_POST['training_status'] == "2") {
            echo"query declined";
        }

    } else {
        echo "Couldn't issue database query<br>";
        echo mysqli_error($conn);
    }
    mysqli_close($conn);
?>