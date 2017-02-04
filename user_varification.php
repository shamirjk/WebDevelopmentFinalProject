<?php
    include("my_db.php");
    if(isset($_POST['user'])&&isset($_POST['id'])){
        $query = "SELECT id,user FROM tbl_user_207 WHERE user=\"".$_POST['user']."\" AND id=\"".$_POST['id']."\"";
        $response = @mysqli_query($conn, $query);

        $count = $conn -> num_rows($query);
        if ($count < 1 ) {
            $exists="We couldn't find your ID in DB. Please call the Office";
        }

        else{
            $exists="very good job";
        }
        echo $exists;
    } else {
      echo "Couldn't issue database query<br>";
      echo mysqli_error($conn);
    }

    mysqli_close($conn);
?>