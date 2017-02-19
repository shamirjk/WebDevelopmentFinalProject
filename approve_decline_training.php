<?php
    include("my_db.php");
    if(isset($_POST['training_id']) && isset($_POST['coach_id']) && isset($_POST['training_status'])){
        $query = "";
        if($_POST['training_status'] == "1") {
            $query ="UPDATE tbl_training_207 SET training_status=1 WHERE training_id=".$_POST['training_id'];
            if (mysqli_query($conn,$query)) {
                echo "true";
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }
        else if($_POST['training_status'] == "2") {

            mysqli_query($conn,"START TRANSACTION");

            $query_new_coaches = "SELECT tbl_coach_207.coach_id 
                              FROM tbl_coach_207 
                              WHERE tbl_coach_207.coach_id != \"".$_POST['coach_id']."\"";

            $response_for_new_coaches = mysqli_query($conn, $query_new_coaches);
            $num_rows = mysqli_num_rows($response_for_new_coaches);
            $index = rand(1,$num_rows);

            $row = mysqli_fetch_array($response_for_new_coaches);

            for($i=1; $i<$index; $i++) {
                $row = mysqli_fetch_array($response_for_new_coaches);
            }
            $new_coach_id = $row['coach_id'];

            $query_update_status ="UPDATE tbl_training_207 SET training_status=0 
                                WHERE training_id=".$_POST['training_id'];

            $response_for_new_coaches = mysqli_query($conn, $query_update_status);

            $query_update_coach = "UPDATE tbl_training_207 SET coach_id=\"".$new_coach_id."\"
                                    WHERE training_id=".$_POST['training_id'];

            $response_update_coach = mysqli_query($conn, $query_update_coach);

            if($response_for_new_coaches && $response_for_new_coaches && $response_update_coach){
                mysqli_query($conn,"COMMIT");
                echo 'true';

            } else {
                mysqli_query($conn,"ROLLBACK");
                echo 'Error Occurred<br/>';
                echo mysqli_error($conn);
            }
        }
    } else {
        echo "Couldn't issue database query<br>";
        echo mysqli_error($conn);
    }
    mysqli_close($conn);
?>