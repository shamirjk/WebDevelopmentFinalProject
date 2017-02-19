<?php
    include("create_tables.php");

    if (mysqli_query($conn,
        "INSERT INTO tbl_area_207 (area_code, area_name) VALUES
                    (\"1\",\"צפון\"),               
                                       (\"2\",\"חיפה\"),
                    (\"3\",\"השרון\"),
                    (\"4\",\"גוש דן\"),
 (\"5\",\"שפלה\"),
                    (\"6\",\"ירושלים\"),
                    (\"7\",\"דרום\")
                    "))
    {
        echo "<p>Table tbl_area_207 filled successfully</p>";
    } else {
        echo "<p>Error filling table complex_sport_type: \n" .mysqli_error($conn)."</p>";
    }

//fill users table
    if (mysqli_query($conn,
        "INSERT INTO tbl_user_207 (user_id, user_type, user_name, user_email) VALUES
        (\"283774651\",\"admin\",\"בר קריצלר\",\"bar.bar@gmail.com\"),
        (\"890337461\",\"coach\",\"אבי כהן\",\"avi.cohen@gmail.com\"),
        (\"765489777\",\"coach\",\"משה אשכנזי\",\"moshe.ash@gmail.com\"),
        (\"654321789\",\"coach\",\"יובל מנדלוביץ\",\"yoval.mendel@gmail.com\"),
        (\"657448391\",\"client\",\"שי לוי\",\"shai.shai@gmail.com\"),
        (\"589723060\",\"client\",\"מרינה פבלובה\",\"marina.pav@gmail.com\")
        "))
    {
        echo "<p>Table tbl_user_207 filled successfully</p>";
    } else {
        echo "<p>Error filling table user: \n" .mysqli_error($conn)."</p>";
    }

    //fill Complex table
    if (mysqli_query($conn,
        "INSERT INTO tbl_complex_207 (complex_id, complex_area, complex_name, complex_city, complex_street) VALUES
                    (\"100\",\"4\",\"מרכז ספורט אוניברסיטת תא\",\"תל אביב\",\"חיים לבנון 60\"),
                    (\"200\",\"4\",\"מועדון זאוס\",\"רמת גן\",\"זאב זבוטינסקי 7\"),
                    (\"300\",\"4\",\"רנסנס הגוש הגדול\",\"תל אביב\",\"יחזקאל שטרייכמן 9\"),
                                        (\"400\",\"2\",\"ספורטן חיפה\",\"חיפה\",\"התשבי 9\"),
                    (\"500\",\"4\",\"קאנטרי נוה אביבים\",\"תל אביב\",\"יהודה הנשיא 34\")
            "))
    {
        echo "<p>Table tbl_complex_207 filled successfully</p>";
    } else {
        echo "<p>Error filling table complex: \n" .mysqli_error($conn)."</p>";
    }

    //fill Complex sport type table
if (mysqli_query($conn,
        "INSERT INTO tbl_complex_sport_type_207 (complex_id, type) VALUES
                (\"100\",\"שחיה\"),
                (\"200\",\"שחיה\"),
                (\"300\",\"שחיה\"),
                                (\"400\",\"שחיה\"),
                (\"500\",\"שחיה\")
                "))
    {
        echo "<p>Table tbl_complex_sport_type_207 filled successfully</p>";
    } else {
        echo "<p>Error filling table complex_sport_type: \n" .mysqli_error($conn)."</p>";
    }

    //fill Coach table
if (mysqli_query($conn,
    "INSERT INTO tbl_coach_207 (coach_id, coach_name, coach_email, coach_city, coach_street) VALUES
(\"890337461\",\"אבי כהן\",\"avi.cohen@gmail.com\",\"רמת גן\",\"אלימלך 13\"),
        (\"765489777\",\"משה אשכנזי\",\"moshe.ash@gmail.com\",\"גבעתיים\",\"רמבם 10\"),
        (\"654321789\",\"יובל מנדלוביץ\",\"yoval.mendel@gmail.com\",\"תל אביב\",\"בן יהודה 60\")
         "))
    {
        echo "<p>Table tbl_coach_207 filled successfully</p>";
    } else {
    echo "<p>Error filling table coach: \n" .mysqli_error($conn)."</p>";
    }

if (mysqli_query($conn,
    "INSERT INTO tbl_coach_sport_type_207 (coach_id, type) VALUES
(\"890337461\",\"שחיה\"),
        (\"765489777\",\"שחיה\"),
        (\"654321789\",\"שחיה\")
         "))
    {
        echo "<p>Table tbl_coach_sport_type__207 filled successfully</p>";
    } else {
        echo "<p>Error filling table coach_sport_type: \n" .mysqli_error($conn)."</p>";
    }

    //fill Client table
if (mysqli_query($conn,
    "INSERT INTO tbl_client_207 (client_id, client_name, client_phone, client_city, client_street, client_email) VALUES
(\"657448391\",\"שי לוי\",\"050-2224455\",\"תל אביב\",\"ארנון 5\",\"shai.shai@gmail.com\"),
        (\"589723060\",\"מרינה פבלובה\",\"052-9798855\",\"רמת גן\",\"החשמונאים 23\",\"moshe.moshe@gmail.com\")
         "))
    {
        echo "<p>Table tbl_client_207 filled successfully</p>";
    } else {
        echo "<p>Error filling table Client: \n" .mysqli_error($conn)."</p>";
    }

//fill Training table
if (mysqli_query($conn,
    "INSERT INTO tbl_training_207 (day, hour_start, hour_end, date_start, date_end, training_type, training_genre, complex_id, coach_id, training_status) VALUES
            (\"9\",\"06:00:00\",\"07:00:00\",\"2017-02-20\",\"2017-02-20\",\"שחיה\",\"טכניקה\",\"100\",\"890337461\",\"1\"),
                        (\"9\",\"07:00:00\",\"08:00:00\",\"2017-02-20\",\"2017-02-20\",\"שחיה\",\"כושר\",\"100\",\"890337461\",\"1\"),
            (\"9\",\"08:00:00\",\"09:00:00\",\"2017-02-20\",\"2017-02-20\",\"שחיה\",\"כושר\",\"100\",\"890337461\",\"1\"),
            (\"9\",\"07:00:00\",\"08:00:00\",\"2017-02-21\",\"2017-02-21\",\"שחיה\",\"כושר\",\"200\",\"654321789\",\"1\"),
            (\"9\",\"08:00:00\",\"09:00:00\",\"2017-02-23\",\"2017-02-23\",\"שחיה\",\"כושר\",\"300\",\"765489777\",\"1\"),
(\"9\",\"07:00:00\",\"08:00:00\",\"2017-02-23\",\"2017-02-23\",\"שחיה\",\"כושר\",\"100\",\"765489777\",\"1\"),
          (\"9\",\"07:00:00\",\"08:00:00\",\"2017-02-23\",\"2017-02-23\",\"שחיה\",\"כושר\",\"300\",\"765489777\",\"1\"),
            (\"9\",\"07:00:00\",\"08:00:00\",\"2017-02-23\",\"2017-02-23\",\"שחיה\",\"כושר\",\"500\",\"765489777\",\"1\"),
            (\"9\",\"07:00:00\",\"08:00:00\",\"2017-02-23\",\"2017-02-22\",\"שחיה\",\"כושר\",\"300\",\"765489777\",\"1\"),
            (\"9\",\"07:00:00\",\"08:00:00\",\"2017-02-23\",\"2017-02-23\",\"שחיה\",\"כושר\",\"200\",\"890337461\",\"1\")
            "))
    {
        echo "<p>Table tbl_training_207 filled successfully</p>";
    } else {
        echo "<p>Error filling table training: \n" .mysqli_error($conn)."</p>";
    }
    mysqli_close($conn);
?>