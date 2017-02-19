<?php
    include("my_db.php");
    if(isset($_POST['user'])){
        if($_POST['user'] == "admin"){
            $query="SELECT tbl_training_207.training_id, tbl_training_207.day, 
                      TIME_FORMAT(tbl_training_207.hour_start,'%H:%i') AS hour_start,
                      TIME_FORMAT(tbl_training_207.hour_end,'%H:%i') AS hour_end,
                      DATE_FORMAT(tbl_training_207.date_start,'%d.%m.%Y') AS date_start,
                      DATE_FORMAT(tbl_training_207.date_end,'%d.%m.%Y') AS date_end,
                      tbl_training_207.training_type, tbl_training_207.training_genre, training_status,
                      tbl_complex_207.complex_name, tbl_complex_207.complex_city, tbl_complex_207.complex_street,
                      tbl_area_207.area_name, tbl_coach_207.coach_id, tbl_coach_207.coach_name
                    FROM tbl_training_207 INNER JOIN tbl_complex_207 ON tbl_training_207.complex_id = tbl_complex_207.complex_id
                      INNER JOIN tbl_area_207 ON tbl_complex_207.complex_area=tbl_area_207.area_code
                      INNER JOIN tbl_coach_207 ON tbl_training_207.coach_id=tbl_coach_207.coach_id
                    ORDER BY tbl_training_207.date_start, tbl_training_207.hour_start;";

            $response = @mysqli_query($conn, $query);
            if ($response) {
                echo "<table class = \"trainingTable\">
                        <tr class=\"tags\"> 
                            <td class=\"info\"></td>
                            <td>מאמן<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></a></td>
                            <td>מקצוע<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                            <td>סוג<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                            <td>מקום<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                            <td>שעה<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                            <td>תאריך<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                            </tr>";
                while ($row=mysqli_fetch_array($response)){
                    echo "<tr id=\"tr".$row['training_id']."\" class=\"list\">
                                    <td class=\"info\">";
                    if($row['training_status'] =="0"){
                        echo "<i class=\"material-icons\">fiber_new</i>";
                    }
                    if($row['training_status'] =="2"){
                        echo "<i class=\"material-icons\">event_busy</i>";
                    }
                    echo "</td>
                            <td class=\"coachTr\">".$row['coach_name']."</td>
                            <td class=\"typeTr\">".$row['training_type']."</td>
                            <td class=\"genreTr\">".$row['training_genre']."</td>
                            <td class=\"placeTr\" >".$row['complex_name']."</tdclas>
                            <td class=\"timeTr\">".$row['hour_start']."-".$row['hour_end']."</td>
                            <td class=\"dayTr\">".$row['date_start']."</td>
                        </tr>
                        <tr class=\"additional addClosed\">
                            <td></td>
                            <td colspan='7'>
                                <section class='addiLabData'>
                                    <article class='addiLabels'>
                                        <p>מקצוע:</p>
                                        <p>סוג:</p>                 
                                        <p>תאריך:</p>
                                        <p>שעה:</p>";
                    if($row['day'] !="9"){
                        echo "<p>חזרות:</p>
                              <p>עד:</p>";
                    }
                    echo "</article>
                                    <article class='addiData'>
                                        <p>".$row['training_type']."</p>
                                        <p>".$row['training_genre']."</p>
                                        <p><i class=\"material-icons\">today</i>".$row['date_start']."</p>
                                        <p><i class=\"material-icons\">access_time</i>".$row['hour_start']."-".$row['hour_end']."</p>";

                    if($row['day'] !="9"){
                        echo "<p><i class=\"material-icons\">loop</i>".$row['training.day']."</p>
                                        <p>".$row['date_end']."</p>";
                    }
                    if($row['training_status'] =="0"){
                        echo "<i class=\"material-icons\">fiber_new</i>";
                    }
                    if($row['training_status'] =="2"){
                        echo "<i class=\"material-icons\">event_busy</i>";
                    }
                    echo "</article>     
                                </section>     
                                <section class='addiAddress'>
                                    <article class='mapGoogle'></article>
                                    <a href=\"https://maps.google.com/?daddr=".$row['complex_street']."+".$row['complex_city']."\" target='_blank'>
                                        <i class=\"material-icons\">place</i>".$row['complex_name']."  
                                    </a>
                                    <p>".$row['complex_street'].", ".$row['complex_city']."</p>
                                </section>
                                <section class='addiCoach'>
                                    <article></article>   
                                    <p><i class=\"material-icons\">person</i>".$row['coach_name']."</p>
                                    <p>".$row['coach_id']."</p>
                                </section>
                                <section class='addiControl'>
                                <a href='#' class=\"editTraining\"><i class=\"material-icons\">mode_edit</i></a>
                                            <a href='#' class=\"deliteTraining\"><i class=\"material-icons\">delete_forever</i></a>";
                    echo  "</section>
                            </td>";
                }
            } else {
                echo "Couldn't issue database query<br>";
                echo mysqli_error($conn);
            }

        } else if($_POST['user'] == "coach") {

            $query = "SELECT tbl_training_207.training_id, tbl_training_207.day,
                        TIME_FORMAT(tbl_training_207.hour_start,'%H:%i') AS hour_start,
                        TIME_FORMAT(tbl_training_207.hour_end,'%H:%i') AS hour_end,
                        DATE_FORMAT(tbl_training_207.date_start,'%d.%m.%Y') AS date_start,
                        DATE_FORMAT(tbl_training_207.date_end,'%d.%m.%Y') AS date_end,
                        tbl_training_207.training_type, tbl_training_207.training_genre, training_status,tbl_complex_207.complex_name,
                        tbl_complex_207.complex_city, tbl_complex_207.complex_street, tbl_area_207.area_name
                      FROM tbl_training_207 INNER JOIN tbl_complex_207 ON tbl_training_207.complex_id = tbl_complex_207.complex_id
                        INNER JOIN tbl_area_207 ON tbl_complex_207.complex_area=tbl_area_207.area_code
                        INNER JOIN tbl_coach_207 ON tbl_training_207.coach_id=tbl_coach_207.coach_id
                      WHERE tbl_training_207.coach_id=".($_POST['id'])." AND training_status<2 
                      ORDER BY tbl_training_207.date_start, tbl_training_207.hour_start;";

            $response = @mysqli_query($conn, $query);
            if ($response) {
                echo "<table class = \"trainingTable\">
                        <tr class=\"tags\"> 
                            <td class=\"info\"></td>
                            <td>מקצוע<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                            <td>סוג<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                            <td>מקום<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                            <td>שעה<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                            <td>תאריך<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                        </tr>";

                while ($row = mysqli_fetch_array($response)) {
                    echo "<tr id=\"tr" . $row['training_id'] . "\" class=\"list\">
                            <td class=\"info\">";
                    if ($row['training_status'] == "0") {
                        echo "<i class=\"icon - icon - xxl material-icons\">fiber_new</i>";
                    }
                    echo "</td>
                            <td class=\"typeTr\">" . $row['training_type'] . "</td>
                            <td class=\"genreTr\">" . $row['training_genre'] . "</td>
                            <td class=\"placeTr\" >" . $row['complex_name'] . "</tdclas>
                            <td class=\"timeTr\">". $row['hour_start'] . "-" . $row['hour_end'] . "</td>
                            <td class=\"dayTr\">". $row['date_start'] . "</td>
                        </tr >
                        <tr class=\"additional addClosed\">
                            <td></td>
                            <td colspan='6'>
                                <section class='addiLabData'>
                                    <article class='addiLabels'>
                                        <p>מקצוע:</p>
                                        <p>סוג:</p>                 
                                        <p>תאריך:</p>
                                        <p>שעה:</p>";
                    if($row['day'] !="9"){
                        echo "<p>חזרות:</p>
                              <p>עד:</p>";
                    }
                        echo "</article>
                             <article class='addiData'>
                                <p>".$row['training_type']."</p>
                                <p>".$row['training_genre']."</p>
                                <p><i class=\"material-icons\">today</i>".$row['date_start']."</p>
                                <p><i class=\"material-icons\">access_time</i>".$row['hour_start']."-".$row['hour_end']."</p>";
                    if($row['day'] !="9"){
                        echo "<p><i class=\"material-icons\">loop</i>".$row['training.day']."</p>
                                <p>".$row['date_end']."</p>";
                    }
                    if($row['training_status'] == "0"){
                        echo "<i class=\"material-icons\">fiber_new</i>";
                    }
                    echo "</article>     
                                </section>
                                <section class='addiAddress'>
                                    <article class='mapGoogle'></article>
                                    <a href=\"https://maps.google.com/?daddr=".$row['complex_street']."+".$row['complex_city']."\" target='_blank'>
                                        <i class=\"material-icons\">place</i>".$row['complex_name']."  
                                    </a>
                                    <p>".$row['complex_street'].", ".$row['complex_city']."</p>
                                </section>
                                <section class='addiCoach'></section>
                                <section class='addiControl'>";
                    if($row['training_status'] =="0"){
                        echo "<a href='#' class=\"acceptTraining\"><i class=\"material-icons\">check_circle</i></a>";
                    }
                    echo"<a href='#' class=\"declinerTraining\"><i class=\"material-icons\">cancel</i></a>
                                 </section>
                            </td>";
                }
            }else {
                echo "Couldn't issue database query<br>";
                echo mysqli_error($conn);
            }
        }else if($_POST['user'] == "client"){
            if(isset($_POST['my'])){
                $query="SELECT tbl_training_207.training_id, tbl_training_207.day, tbl_favorite_207.training_id AS fav_status,
                      TIME_FORMAT(tbl_training_207.hour_start,'%H:%i') AS hour_start,
                      TIME_FORMAT(tbl_training_207.hour_end,'%H:%i') AS hour_end,
                      DATE_FORMAT(tbl_training_207.date_start,'%d.%m.%Y') AS date_start,
                      DATE_FORMAT(tbl_training_207.date_end,'%d.%m.%Y') AS date_end,
                      tbl_training_207.training_type, tbl_training_207.training_genre, training_status,
                      tbl_complex_207.complex_name, tbl_complex_207.complex_city, tbl_complex_207.complex_street,
                      tbl_area_207.area_name, tbl_coach_207.coach_id, tbl_coach_207.coach_name
                    FROM tbl_training_207 INNER JOIN tbl_complex_207 ON tbl_training_207.complex_id = tbl_complex_207.complex_id
                      INNER JOIN tbl_area_207 ON tbl_complex_207.complex_area=tbl_area_207.area_code
                      INNER JOIN tbl_coach_207 ON tbl_training_207.coach_id=tbl_coach_207.coach_id
                      INNER JOIN tbl_favorite_207 ON (tbl_training_207.training_id = tbl_favorite_207.training_id)
                        AND (tbl_favorite_207.client_id = \"".$_POST['id']."\")
                      WHERE training_status=1
                    ORDER BY tbl_training_207.date_start, tbl_training_207.hour_start";
            } else{
                $query="SELECT tbl_training_207.training_id, tbl_training_207.day, tbl_favorite_207.training_id AS fav_status,
                      TIME_FORMAT(tbl_training_207.hour_start,'%H:%i') AS hour_start,
                      TIME_FORMAT(tbl_training_207.hour_end,'%H:%i') AS hour_end,
                      DATE_FORMAT(tbl_training_207.date_start,'%d.%m.%Y') AS date_start,
                      DATE_FORMAT(tbl_training_207.date_end,'%d.%m.%Y') AS date_end,
                      tbl_training_207.training_type, tbl_training_207.training_genre, training_status,
                      tbl_complex_207.complex_name, tbl_complex_207.complex_city, tbl_complex_207.complex_street,
                      tbl_area_207.area_name, tbl_coach_207.coach_id, tbl_coach_207.coach_name
                    FROM tbl_training_207 INNER JOIN tbl_complex_207 ON tbl_training_207.complex_id = tbl_complex_207.complex_id
                      INNER JOIN tbl_area_207 ON tbl_complex_207.complex_area=tbl_area_207.area_code
                      INNER JOIN tbl_coach_207 ON tbl_training_207.coach_id=tbl_coach_207.coach_id
                      LEFT OUTER JOIN tbl_favorite_207 ON (tbl_training_207.training_id = tbl_favorite_207.training_id)
                        AND (tbl_favorite_207.client_id = \"".$_POST['id']."\")
                      WHERE training_status=1
                    ORDER BY tbl_training_207.date_start, tbl_training_207.hour_start";
            }
            $response = @mysqli_query($conn, $query);
            if ($response) {
                echo "<table class = \"trainingTable\">
                        <tr class=\"tags\"> 
                            <td class=\"info\"></td>
                            <td>מקצוע<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                            <td>סוג<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                            <td>מקום<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                            <td>שעה<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                            <td>תאריך<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                      </tr>";
                while ($row=mysqli_fetch_array($response)){
                    echo "<tr id=\"tr".$row['training_id']."\" class=\"list\">
                            <td class=\"info\">";
                    if(!is_null($row['fav_status'])){
                        echo "<i class=\"material-icons\">favorite</i>";
                    }
                    echo"</td>
                            <td class=\"typeTr\">".$row['training_type']."</td>
                            <td class=\"genreTr\">".$row['training_genre']."</td>
                            <td class=\"placeTr\" >".$row['complex_name']."</tdclas>
                            <td class=\"timeTr\">".$row['hour_start']."-".$row['hour_end']."</td>
                            <td class=\"dayTr\">".$row['date_start']."</td>
                                </tr>
                        <tr class=\"additional addClosed\">
                            <td></td>
                            <td colspan='7'>
                                <section class='addiLabData'>
                                    <article class='addiLabels'>
                                        <p>מקצוע:</p>
                                        <p>סוג:</p>                 
                                        <p>תאריך:</p>
                                        <p>שעה:</p>";
                    if($row['day'] !="9"){
                        echo "<p>חזרות:</p>
                              <p>עד:</p>";
                    }
                    echo "</article>
                                    <article class='addiData'>
                                        <p>".$row['training_type']."</p>
                                        <p>".$row['training_genre']."</p>
                                        <p><i class=\"material-icons\">today</i>".$row['date_start']."</p>
                                        <p><i class=\"material-icons\">access_time</i>".$row['hour_start']."-".$row['hour_end']."</p>";
                    if($row['day'] !="9"){
                        echo "<p><i class=\"material-icons\">loop</i>".$row['training.day']."</p>
                                        <p>".$row['date_end']."</p>";
                    }
                    if(!is_null($row['fav_status'])){
                        echo "<i class=\"material-icons\">favorite</i>";
                    }
                    echo "</article>     
                                </section>     
                                <section class='addiAddress'>
                                    <article class='mapGoogle'></article>
                                        <a href=\"https://maps.google.com/?daddr=".$row['complex_street']."+".$row['complex_city']."\" target='_blank'>
                                            <i class=\"material-icons\">place</i>".$row['complex_name']."  
                                        </a>
                                        <p>".$row['complex_street'].", ".$row['complex_city']."</p>
                                </section>
                                <section class='addiCoach'></section>
                                <section class='addiControl'>";
                    if(is_null($row['fav_status'])){
                        echo "<a href = '#' class=\"addToFavorite\"><i class=\"material-icons\">favorite</i><p>+</p></a>";
                    } else {
                        echo "<a href='#' class=\"deleteToFavorite\"><i class=\"material-icons\">favorite_border</i><p>-</p></a>";
                    }
                    echo  "</section>
                           </td>";
                }
            } else {
                echo "Couldn't issue database query<br>";
                echo mysqli_error($conn);
            }
        }
    } else {
        echo "Couldn't issue database query<br>";
        echo mysqli_error($conn);
    }
    mysqli_close($conn);
?>