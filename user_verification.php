<?php
    include("my_db.php");

    if(isset($_POST['user']) && isset($_POST['id'])){
        $query = "SELECT user_id,user_type FROM tbl_user_207 WHERE user_type=\"".$_POST['user']."\" AND user_id=\"".$_POST['id']."\"";
        $response = @mysqli_query($conn, $query);

        $result = mysqli_query($conn, $query);
        $num_rows = mysqli_num_rows($result);

        if ($num_rows < 1 ) {
            echo "false";
        }
        else{
            echo "true";
        }
    } else {
          echo "Couldn't issue database query<br>";
          echo mysqli_error($conn);
    }

    mysqli_close($conn);
?>