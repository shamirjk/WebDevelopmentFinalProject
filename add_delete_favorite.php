<?php
    include("my_db.php");
    if(isset($_POST['training_id']) && isset($_POST['client_id']) && isset($_POST['training_status'])){
        if($_POST['training_status'] == "1") {
            $query ="INSERT INTO tbl_favorite_207 (client_id, training_id) 
                        VALUES (\"".$_POST['client_id']."\", ".$_POST['training_id'].")";
            if (mysqli_query($conn,$query)) {
                echo "true";
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }
        else if($_POST['training_status'] == "2") {
            $query ="DELETE FROM tbl_favorite_207 WHERE client_id=\"".$_POST['client_id']."\"
                        AND training_id=".$_POST['training_id'];
            if (mysqli_query($conn,$query)) {
                echo "true";
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Couldn't issue database query<br>";
        echo mysqli_error($conn);
    }
    mysqli_close($conn);
?>
