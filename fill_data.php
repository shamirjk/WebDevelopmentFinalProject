<?php
    //include("db.php");
    include("my_db.php");

    //comlex tabele
    if (mysqli_query($conn,
        "CREATE TABLE tbl_complex_207(
        id INT(6) UNSIGNED AUTO_INCREMENT,
        name VARCHAR(30) NOT NULL,
        city VARCHAR(30) NOT NULL,
        street VARCHAR(30) NOT NULL,
        PRIMARY KEY(id)
        )"))
    {
        echo "<p>Table tbl_complex_207 created successfully</p>";
    } else {
        echo "<p>Error creating table: " .mysqli_error($conn)."</p>";
    }

    //type
   if (mysqli_query($conn,
       "CREATE TABLE tbl_complex_sport_type_207(
        id INT(6) UNSIGNED NOT NULL,
        type VARCHAR(30) NOT NULL,
        FOREIGN KEY (id) REFERENCES tbl_complex_207(id) ON DELETE CASCADE ON UPDATE CASCADE,
        PRIMARY KEY(id, type)
        )"))
   {
       echo "<p>Table tbl_complex_sport_type_207 created successfully</p>";
   } else {
       echo "\nError creating table: " .mysqli_error($conn)."</p>";
   }

   if (mysqli_query($conn,
          "CREATE TABLE tbl_coach_207(
           id VARCHAR(30) NOT NULL,
           name VARCHAR(30) NOT NULL,
           email VARCHAR(30) NOT NULL,
           city VARCHAR(30) NOT NULL,
           street VARCHAR(30) NOT NULL,
           PRIMARY KEY(id)
           )"))
      {
          echo "<p>Table tbl_coach_207 created successfully</p>";
      } else {
          echo "<p>Error creating table: " .mysqli_error($conn)."</p>";
      }
   if (mysqli_query($conn,
             "CREATE TABLE tbl_coach_sport_type_207(
              id VARCHAR(30) NOT NULL,
              type VARCHAR(30) NOT NULL,
              FOREIGN KEY(id) REFERENCES tbl_coach_207(id) ON DELETE CASCADE ON UPDATE CASCADE,
              PRIMARY KEY(id, type)
              )"))
   {
             echo "<p>Table tbl_coach_sport_type_207 created successfully</p>";
   } else {
             echo "<p>Error creating table: " .mysqli_error($conn)."</p>";
   }

   if (mysqli_query($conn,
        "CREATE TABLE tbl_training_207(
        id INT(6) UNSIGNED NOT NULL,
        type VARCHAR(30) NOT NULL,
        genre VARCHAR(30) NOT NULL,
        complex_id INT(6) UNSIGNED NOT NULL,
        coach_id VARCHAR(30) NOT NULL,
        status INT(1) NOT NULL,
        FOREIGN KEY(complex_id) REFERENCES tbl_complex_207(id) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY(coach_id) REFERENCES tbl_coach_207(id) ON DELETE CASCADE ON UPDATE CASCADE,
        PRIMARY KEY(id, complex_id, coach_id)
        )"))
   {
        echo "<p>Table tbl_training_207 created successfully</p>";
   } else {
        echo "<p>Error creating table: " .mysqli_error($conn)."</p>";
   }
    if (mysqli_query($conn,
           "CREATE TABLE tbl_client_207(
           id VARCHAR(30) NOT NULL,
           name VARCHAR(30) NOT NULL,
           phone VARCHAR(30) NOT NULL,
           city VARCHAR(30) NOT NULL,
           street VARCHAR(30) NOT NULL,
           PRIMARY KEY(id)
           )"))
    {
        echo "<p>Table tbl_client_207 created successfully</p>";
    } else {
        echo "<p>Error creating table: \n" .mysqli_error($conn)."</p>";
    }


   mysqli_close($conn);
?>