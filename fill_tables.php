<?php
    include("create_tables.php");

    //fill users table
    if (mysqli_query($conn,
        "INSERT INTO tbl_user_207 (id, user, name, email) VALUES
        (\"283774651\",\"admin\",\"בר קריצלר\",\"bar.bar@gmail.com\"),
        (\"890337461\",\"coach\",\"אבי כהן\",\"avi.cohen@gmail.com\"),
        (\"890337461\",\"coach\",\"משה אשכנזי\",\"moshe.ash@gmail.com\"),
        (\"890337461\",\"coach\",\"יובל מנדלוביץ\",\"yoval.mendel@gmail.com\"),
        (\"657448391\",\"client\",\"שי לוי\",\"shai.shai@gmail.com\"),
        (\"890337461\",\"client\",\"משה גרוס\",\"moshe.moshe@gmail.com\"),
        "))
    {
        echo "<p>Table tbl_client_207 filled successfully</p>";
    } else {
        echo "<p>Error filling table: \n" .mysqli_error($conn)."</p>";
    }
    mysqli_close($conn);
?>