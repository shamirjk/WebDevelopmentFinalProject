<?php
    include("my_db.php");
    if (isset($_POST['user'])) {

        $query = "SELECT user_id FROM tbl_user_207
                      WHERE user_name=\"". $_POST['coaname']."\"";

        $response = @mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($response)) {
            $coach_id =$row['user_id'];
        }

        $query1 = "SELECT complex_id FROM tbl_complex_207
                   WHERE complex_name=\"". $_POST['comname']."\"";

        $response2 = @mysqli_query($conn, $query1);

        while ($row2 = mysqli_fetch_array($response2)) {
            $complex_id =$row2['complex_id'];
        }
        if (mysqli_query($conn,
            "INSERT INTO tbl_training_207 (day, hour_start, 
              hour_end, date_start, date_end, training_type, 
              training_genre, complex_id, coach_id, training_status) 
             VALUES (\"9\",\"".$_POST['hstart']."\",\"".$_POST['hend']."\",
                \"".$_POST['dstart']."\",\"".$_POST['dstart']."\",
                \"".$_POST['ttype']."\",\"".$_POST['tgenre']."\",
                ".$complex_id.",\"".$coach_id."\",0)
             ")) {
            echo "true";
        } else {
            echo "<p>Error filling table training: \n". mysqli_error($conn)."</p>";
        }
    } else {
        echo "Couldn't issue database query";
        echo mysqli_error($conn);
    }
    mysqli_close($conn);
?>