<?php
    include("my_db.php");
    if(isset($_POST['user'])){
        $query = "SELECT user_type, user_name, user_email 
                  FROM tbl_user_207 
                  WHERE user_type=\"".$_POST['user']."\" AND user_id=\"".$_POST['id']."\"";

        $response = @mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($response)){
            echo
                "<li>" .$row['user_name'] ."</li>" .
                "<li>" .$row['user_email'] ."</li>" .
                "<li>" .$row['user_type'] ."</li>" .
                "<li><a href='#'>edit</a></li>"
            ;
        }
        echo "<li><a href='index.html'>Log Out</a></li>";
    } else {
        echo "Couldn't issue database query<br>";
        echo mysqli_error($conn);
    }
    mysqli_close($conn);
?>