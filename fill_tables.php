<?php
    include("create_tables.php");

    //fill users table
    if (mysqli_query($conn,
        "INSERT INTO tbl_user_207 (id, user, name, email) VALUES
        (\"283774651\",\"admin\",\"בר קריצלר\",\"ar.bar@gmail.com\"),
        (\"890337461\",\"coach\",\"אבי כהן\",\"avi.cohen@gmail.com\"),
        (\"657448391\",\"client\",\"שי שי\",\"shi.shi@gmail.com\")
        "))
    {
        echo "<p>Table tbl_client_207 filled successfully</p>";
    } else {
        echo "<p>Error filling table: \n" .mysqli_error($conn)."</p>";
    }
    mysqli_close($conn);
?>