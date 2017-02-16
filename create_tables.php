<?php
    //include("db.php");
    include("my_db.php");

    if (mysqli_query($conn,
        "CREATE TABLE IF NOT EXISTS tbl_area_207(
            area_code INT(2) UNSIGNED NOT NULL,
            area_name VARCHAR(30) NOT NULL,
            PRIMARY KEY(area_code)
            )"))
    {
        echo "<p>Table tbl_area_207 created successfully</p>";
    } else {
        echo "\nError creating table: " .mysqli_error($conn)."</p>";
    }


    //complex tabele
    if (mysqli_query($conn,
        "CREATE TABLE IF NOT EXISTS tbl_complex_207(
        complex_id INT(4) UNSIGNED NOT NULL,
        complex_area INT(2) UNSIGNED NOT NULL,
        complex_name VARCHAR(60) NOT NULL,
        complex_city VARCHAR(30) NOT NULL,
        complex_street VARCHAR(40) NOT NULL,
        PRIMARY KEY(complex_id),
        FOREIGN KEY (complex_area) REFERENCES tbl_area_207(area_code) ON DELETE CASCADE ON UPDATE CASCADE
        )"))
    {
        echo "<p>Table tbl_complex_207 created successfully</p>";
    } else {
        echo "<p>Error creating table: " .mysqli_error($conn)."</p>";
    }

    //type
   if (mysqli_query($conn,
       "CREATE TABLE IF NOT EXISTS tbl_complex_sport_type_207(
        complex_id INT(4) UNSIGNED NOT NULL,
        type VARCHAR(30) NOT NULL,
        PRIMARY KEY(complex_id, type),
        FOREIGN KEY (complex_id) REFERENCES tbl_complex_207(complex_id) ON DELETE CASCADE ON UPDATE CASCADE
        )"))
   {
       echo "<p>Table tbl_complex_sport_type_207 created successfully</p>";
   } else {
       echo "\nError creating table: " .mysqli_error($conn)."</p>";
   }

   if (mysqli_query($conn,
          "CREATE TABLE IF NOT EXISTS tbl_coach_207(
           coach_id VARCHAR(30) NOT NULL,
           coach_name VARCHAR(30) NOT NULL,
           coach_email VARCHAR(30) NOT NULL,
           coach_city VARCHAR(30) NOT NULL,
           coach_street VARCHAR(30) NOT NULL,
           PRIMARY KEY(coach_id)
           )"))
      {
          echo "<p>Table tbl_coach_207 created successfully</p>";
      } else {
          echo "<p>Error creating table: " .mysqli_error($conn)."</p>";
      }
   if (mysqli_query($conn,
             "CREATE TABLE IF NOT EXISTS tbl_coach_sport_type_207(
              coach_id VARCHAR(30) NOT NULL,
              type VARCHAR(30) NOT NULL,
              PRIMARY KEY(coach_id, type),
              FOREIGN KEY(coach_id) REFERENCES tbl_coach_207(coach_id) ON DELETE CASCADE ON UPDATE CASCADE
              )"))
   {
             echo "<p>Table tbl_coach_sport_type_207 created successfully</p>";
   } else {
             echo "<p>Error creating table: " .mysqli_error($conn)."</p>";
   }

   if (mysqli_query($conn,
        "CREATE TABLE IF NOT EXISTS tbl_training_207(
        training_id INT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
        day VARCHAR(1) NOT NULL,
        hour_start TIME NOT NULL,
        hour_end TIME NOT NULL,
        date_start DATE NOT NULL,
        date_end DATE NOT NULL,
        training_type VARCHAR(30) NOT NULL,
        training_genre VARCHAR(30) NOT NULL,
        complex_id INT(4) UNSIGNED NOT NULL,
        coach_id VARCHAR(30) NOT NULL,
        training_status INT(1) NOT NULL,
        PRIMARY KEY(training_id),
        FOREIGN KEY(complex_id) REFERENCES tbl_complex_207(complex_id) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY(coach_id) REFERENCES tbl_coach_207(coach_id) ON DELETE CASCADE ON UPDATE CASCADE
        )"))
   {
        echo "<p>Table tbl_training_207 created successfully</p>";
   } else {
        echo "<p>Error creating table: " .mysqli_error($conn)."</p>";
   }
   if (mysqli_query($conn,
           "CREATE TABLE IF NOT EXISTS tbl_client_207(
           client_id VARCHAR(30) NOT NULL,
           client_name VARCHAR(30) NOT NULL,
           client_phone VARCHAR(30) NOT NULL,
           client_city VARCHAR(30) NOT NULL,
           client_street VARCHAR(30) NOT NULL,
           client_email VARCHAR(30) NOT NULL,
           PRIMARY KEY(client_id)
           )"))
   {
        echo "<p>Table tbl_client_207 created successfully</p>";
   } else {
        echo "<p>Error creating table: \n" .mysqli_error($conn)."</p>";
   }
   if (mysqli_query($conn,
               "CREATE TABLE IF NOT EXISTS tbl_user_207(
               user_id VARCHAR(30) NOT NULL,
               user_type VARCHAR(30) NOT NULL,
               user_name VARCHAR(30) NOT NULL,
               user_email VARCHAR(30) NOT NULL,
               PRIMARY KEY(user_id, user_type)
               )"))
   {
        echo "<p>Table tbl_client_207 created successfully</p>";
   } else {
        echo "<p>Error creating table: \n" .mysqli_error($conn)."</p>";
   }

   //mysqli_close($conn);
?>