<?php
    include("my_db.php");

    if(isset($_POST['user']) && isset($_POST['id'])){
        $query = "SELECT id,user FROM tbl_user_207 WHERE user=\"".$_POST['user']."\" AND id=\"".$_POST['id']."\"";
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