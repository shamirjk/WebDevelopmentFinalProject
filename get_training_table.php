<?php
    include("my_db.php");
    if(isset($_POST['user'])){

        if($_POST['user'] == "admin"){
            $query="SELECT tbl_training_207.training_id, tbl_training_207.day, 
                  TIME_FORMAT(tbl_training_207.hour_start,'%H:%i') AS hour_start,
                  TIME_FORMAT(tbl_training_207.hour_end,'%H:%i') AS hour_end,
                  DATE_FORMAT(tbl_training_207.date_start,'%d.%m.%Y') AS date_start,
                  DATE_FORMAT(tbl_training_207.date_end,'%d.%m.%Y') AS date_end,
                  tbl_training_207.training_type, tbl_training_207.training_genre, training_status,tbl_complex_207.complex_name, 
                  tbl_complex_207.complex_city, tbl_complex_207.complex_street, tbl_area_207.area_name, tbl_coach_207.coach_name
                FROM tbl_training_207 INNER JOIN tbl_complex_207 ON tbl_training_207.complex_id = tbl_complex_207.complex_id
                  INNER JOIN tbl_area_207 ON tbl_complex_207.complex_area=tbl_area_207.area_code
                  INNER JOIN tbl_coach_207 ON tbl_training_207.coach_id=tbl_coach_207.coach_id
                ORDER BY tbl_training_207.date_start, tbl_training_207.hour_start;";

            $response = @mysqli_query($conn, $query);
            if ($response){
                echo "<table class = \"trainingTable\">
                    <tr class=\"tags\"> 
                        <td class=\"control\"></td>
                        <td>מאמן<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></a></td>
                        <td>מקצוע<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                        <td>סוג<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                        <td>מקום<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                        <td>שעה<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                        <td>תאריך<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                        <!--<td class=\"control\"></td>
                        <td class=\"control\"></td>-->
                        </tr>";

                while ($row=mysqli_fetch_array($response)){
                    echo "<tr id=\"tr".$row['training_id']." class=\"list\">
                                    <td class=\"control info\"><span class=\"glyphicon glyphicon-trash\"></span></td>
                                    <td class=\"coachTr\">".$row['coach_name']."</td>
                                    <td class=\"typeTr\">".$row['training_type']."</td>
                                    <td class=\"genreTr\">".$row['training_genre']."</td>
                                    <td class=\"placeTr\" >".$row['complex_name']."</tdclas>
                                    <td class=\"timeTr\">".$row['hour_start']."-".$row['hour_end']."</td>
                                    <td class=\"dayTr\">".$row['date_start']."</td>
                                    <!--<td class=\"control deleteTr\"><a href=\"#\" class=\"glyphicon glyphicon-trash\"></a></td>
                                    <td class=\"control editTr\"><a href=\"#\" class=\"glyphicon glyphicon-pencil\"></a></td>-->
                                </tr>
                                <tr class=\"additional addClosed\">
                                    <td></td>
                                    <td colspan='2'>
                                        <section class='addiCoach'>
                                            <section>
                                            
                                           </section>   
                                            <p>בלה</p>
                                            <p>בלה</p>
                                            <p>תבלה</p>
                                        </section>
                                    </td>
                                    <td colspan='2'>
                                        <section class='addiAddress'>
                                            <article class='mapGoogle'></article>
                                            <p>בלה</p>
                                            <p>בלה</p>
                                            <p>תבלה</p>
                                        </section>    
                                    </td>
                                    <td >
                                        <section class='addiData'>
                                            <p>".$row['training_type']."</p>
                                            <p>".$row['training_genre']."</p>
                                            <p>".$row['date_start']."</p>
                                            <p>".$row['hour_start']."-".$row['hour_end']."</p>
                                            <p>בלה</p>
                                            <p>".$row['date_end']."</p>
                                        </section>
                                        </section>
                                    </td>
                                    <td>
                                        <section  class='addiLabels'>
                                            <p>מקצוע:</p>
                                            <p>סוג:</p>                   
                                            <p>תאריך:</p>
                                            <p>שעה:</p>
                                            <p>חזרות:</p>
                                            <p>עד:</p>
                                        </section>
                                    </td>
                                </tr>";

                }
            } else {
                echo "Couldn't issue database query<br>";
                echo mysqli_error($conn);
            }

            echo "<table class = \"trainingTable\">
                                <tr class=\"tags\"> 
                                    <td class=\"control\"></td>
                                    <td>מאמן<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></a></td>
                                    <td>מקצוע<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                                    <td>סוג<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                                    <td>מקום<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                                    <td>שעה<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                                    <td>תאריך<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                                    <!--<td class=\"control\"></td>
                                    <td class=\"control\"></td>-->
                                </tr>
                                <tr id=\"tr122345\" class=\"list\" style='cursor:pointer'>
                                    <td class=\"control info\"><span class=\"glyphicon glyphicon-trash\"></span></td>
                                    <td class=\"coachTr\">אבי כהן</td>
                                    <td class=\"typeTr\">שחיה</td>
                                    <td class=\"genreTr\">טכניקה</td>
                                    <td class=\"placeTr\" >מרכז ספורט אוניברסיטת ת\"א</tdclas>
                                    <td class=\"timeTr\">06:00-07:00</td>
                                    <td class=\"dayTr\">2.1.2017</td>
                                    <!--<td class=\"control deleteTr\"><a href=\"#\" class=\"glyphicon glyphicon-trash\"></a></td>
                                    <td class=\"control editTr\"><a href=\"#\" class=\"glyphicon glyphicon-pencil\"></a></td>-->
                                </tr>
                                <tr class=\"additional addClosed\">
                                    <td></td>
                                    <td colspan='3'>
                                        <section class='addiCoach'>
                                            <section>
                                            
                                           </section>   
                                            <p>בלה</p>
                                            <p>בלה</p>
                                            <p>תבלה</p>
                                        </section>
                                    </td>
                                    <td>
                                        <section class='addiAddress'>
                                            <article class='mapGoogle'></article>
                                            <p>בלה</p>
                                            <p>בלה</p>
                                            <p>תבלה</p>
                                        </section>    
                                    </td>
                                    <td >
                                        <section class='addiData'>
                                            <p>בלה</p>
                                            <p>בלה</p>
                                            <p>תבלה</p>
                                            <p>בלה</p>
                                            <p>בלה</p>
                                            <p>בלה</p>
                                        </section>
                                        </section>
                                    </td>
                                    <td>
                                        <section  class='addiLabels'>
                                            <p>סוג:</p>
                                            <p>מקצוע:</p>
                                            <p>תאריך:</p>
                                            <p>שעה:</p>
                                            <p>חזרות:</p>
                                            <p>עד:</p>
                                        </section>
                                    </td>
                                </tr>
                                <tr id=\"tr122345\" class=\"list\" style='cursor:pointer'>
                                    <td class=\"control info\"><span class=\"glyphicon glyphicon-trash\"></span></td>
                                    <td class=\"coachTr\">אבי כהן</td>
                                    <td class=\"typeTr\">שחיה</td>
                                    <td class=\"genreTr\">טכניקה</td>
                                    <td class=\"placeTr\" >מרכז ספורט אוניברסיטת ת\"א</tdclas>
                                    <td class=\"timeTr\">06:00-07:00</td>
                                    <td class=\"dayTr\">2.1.2017</td>
                                    <!--<td class=\"control deleteTr\"><a href=\"#\" class=\"glyphicon glyphicon-trash\"></a></td>
                                    <td class=\"control editTr\"><a href=\"#\" class=\"glyphicon glyphicon-pencil\"></a></td>-->
                                </tr>
                                <tr class=\"additional addClosed\">
                                    <td></td>
                                    <td colspan='3'>
                                        <section class='addiCoach'>
                                            <section>
                                            
                                           </section>   
                                            <p>בלה</p>
                                            <p>בלה</p>
                                            <p>תבלה</p>
                                        </section>
                                    </td>
                                    <td>
                                        <section class='addiAddress'>
                                            <article class='mapGoogle'></article>
                                            <p>בלה</p>
                                            <p>בלה</p>
                                            <p>תבלה</p>
                                        </section>    
                                    </td>
                                    <td >
                                        <section class='addiData'>
                                            <p>בלה</p>
                                            <p>בלה</p>
                                            <p>תבלה</p>
                                            <p>בלה</p>
                                            <p>בלה</p>
                                            <p>בלה</p>
                                        </section>
                                        </section>
                                    </td>
                                    <td>
                                        <section  class='addiLabels'>
                                            <p>סוג:</p>
                                            <p>מקצוע:</p>
                                            <p>תאריך:</p>
                                            <p>שעה:</p>
                                            <p>חזרות:</p>
                                            <p>עד:</p>
                                        </section>
                                    </td>
                                </tr>
                                
                                <tr id=\"tr122345\" class=\"list\" style='cursor:pointer'>
                                    <td class=\"control info\"><span class=\"glyphicon glyphicon-trash\"></span></td>
                                    <td class=\"coachTr\">אבי כהן</td>
                                    <td class=\"typeTr\">שחיה</td>
                                    <td class=\"genreTr\">טכניקה</td>
                                    <td class=\"placeTr\" >מרכז ספורט אוניברסיטת ת\"א</tdclas>
                                    <td class=\"timeTr\">06:00-07:00</td>
                                    <td class=\"dayTr\">2.1.2017</td>
                                    <!--<td class=\"control deleteTr\"><a href=\"#\" class=\"glyphicon glyphicon-trash\"></a></td>
                                    <td class=\"control editTr\"><a href=\"#\" class=\"glyphicon glyphicon-pencil\"></a></td>-->
                                </tr>
                                <tr class=\"additional addClosed\">
                                    <td></td>
                                    <td colspan='3'>
                                        <section class='addiCoach'>
                                            <section>
                                            
                                           </section>   
                                            <p>בלה</p>
                                            <p>בלה</p>
                                            <p>תבלה</p>
                                        </section>
                                    </td>
                                    <td>
                                        <section class='addiAddress'>
                                            <article class='mapGoogle'></article>
                                            <p>בלה</p>
                                            <p>בלה</p>
                                            <p>תבלה</p>
                                        </section>    
                                    </td>
                                    <td >
                                        <section class='addiData'>
                                            <p>בלה</p>
                                            <p>בלה</p>
                                            <p>תבלה</p>
                                            <p>בלה</p>
                                            <p>בלה</p>
                                            <p>בלה</p>
                                        </section>
                                        </section>
                                    </td>
                                    <td>
                                        <section  class='addiLabels'>
                                            <p>סוג:</p>
                                            <p>מקצוע:</p>
                                            <p>תאריך:</p>
                                            <p>שעה:</p>
                                            <p>חזרות:</p>
                                            <p>עד:</p>
                                        </section>
                                    </td>
                                </tr>
                                
                                <tr id=\"tr122345\" class=\"list\" style='cursor:pointer'>
                                    <td class=\"control info\"><span class=\"glyphicon glyphicon-trash\"></span></td>
                                    <td class=\"coachTr\">אבי כהן</td>
                                    <td class=\"typeTr\">שחיה</td>
                                    <td class=\"genreTr\">טכניקה</td>
                                    <td class=\"placeTr\" >מרכז ספורט אוניברסיטת ת\"א</tdclas>
                                    <td class=\"timeTr\">06:00-07:00</td>
                                    <td class=\"dayTr\">2.1.2017</td>
                                    <!--<td class=\"control deleteTr\"><a href=\"#\" class=\"glyphicon glyphicon-trash\"></a></td>
                                    <td class=\"control editTr\"><a href=\"#\" class=\"glyphicon glyphicon-pencil\"></a></td>-->
                                </tr>
                                <tr class=\"additional addClosed\">
                                    <td></td>
                                    <td colspan='3'>
                                        <section class='addiCoach'>
                                            <section>
                                            
                                           </section>   
                                            <p>בלה</p>
                                            <p>בלה</p>
                                            <p>תבלה</p>
                                        </section>
                                    </td>
                                    <td>
                                        <section class='addiAddress'>
                                            <article class='mapGoogle'></article>
                                            <p>בלה</p>
                                            <p>בלה</p>
                                            <p>תבלה</p>
                                        </section>    
                                    </td>
                                    <td >
                                        <section class='addiData'>
                                            <p>בלה</p>
                                            <p>בלה</p>
                                            <p>תבלה</p>
                                            <p>בלה</p>
                                            <p>בלה</p>
                                            <p>בלה</p>
                                        </section>
                                        </section>
                                    </td>
                                    <td>
                                        <section  class='addiLabels'>
                                            <p>סוג:</p>
                                            <p>מקצוע:</p>
                                            <p>תאריך:</p>
                                            <p>שעה:</p>
                                            <p>חזרות:</p>
                                            <p>עד:</p>
                                        </section>
                                    </td>
                                </tr>
                                
                                <tr id=\"tr122345\" class=\"list\" style='cursor:pointer'>
                                    <td class=\"control info\"><span class=\"glyphicon glyphicon-trash\"></span></td>
                                    <td class=\"coachTr\">אבי כהן</td>
                                    <td class=\"typeTr\">שחיה</td>
                                    <td class=\"genreTr\">טכניקה</td>
                                    <td class=\"placeTr\" >מרכז ספורט אוניברסיטת ת\"א</tdclas>
                                    <td class=\"timeTr\">06:00-07:00</td>
                                    <td class=\"dayTr\">2.1.2017</td>
                                    <!--<td class=\"control deleteTr\"><a href=\"#\" class=\"glyphicon glyphicon-trash\"></a></td>
                                    <td class=\"control editTr\"><a href=\"#\" class=\"glyphicon glyphicon-pencil\"></a></td>-->
                                </tr>
                                <tr class=\"additional addClosed\">
                                    <td></td>
                                    <td colspan='3'>
                                        <section class='addiCoach'>
                                            <section>
                                            
                                           </section>   
                                            <p>בלה</p>
                                            <p>בלה</p>
                                            <p>תבלה</p>
                                        </section>
                                    </td>
                                    <td>
                                        <section class='addiAddress'>
                                            <article class='mapGoogle'></article>
                                            <p>בלה</p>
                                            <p>בלה</p>
                                            <p>תבלה</p>
                                        </section>    
                                    </td>
                                    <td >
                                        <section class='addiData'>
                                            <p>בלה</p>
                                            <p>בלה</p>
                                            <p>תבלה</p>
                                            <p>בלה</p>
                                            <p>בלה</p>
                                            <p>בלה</p>
                                        </section>
                                        </section>
                                    </td>
                                    <td>
                                        <section  class='addiLabels'>
                                            <p>סוג:</p>
                                            <p>מקצוע:</p>
                                            <p>תאריך:</p>
                                            <p>שעה:</p>
                                            <p>חזרות:</p>
                                            <p>עד:</p>
                                        </section>
                                    </td>
                                </tr>
                            </table>";
        } else if($_POST['user'] == "coach"){
            echo "<table class = \"trainingTable\">
                                <tr class=\"tags\"> 
                                    <td class=\"control\"></td>
                                    <td>מקצוע<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                                    <td>סוג<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                                    <td>מקום<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                                    <td>שעה<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                                    <td>תאריך<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                                    <td class=\"control\"></td>
                                    <td class=\"control\"></td>
                                </tr>
                                <tr id=\"tr122345\">
                                    <td class=\"control\"></td>
                                    <td class=\"typeTr\">שחיה</td>
                                    <td class=\"genreTr\">טכניקה</td>
                                    <td class=\"placeTr\" >מרכז ספורט אוניברסיטת ת\"א</tdclas>
                                    <td class=\"timeTr\">06:00-07:00</td>
                                    <td class=\"dayTr\">2.1.2017</td>
                                    <td class=\"control deleteTr\"><a href=\"#\" class=\"glyphicon glyphicon-remove\"></a></td>
                                    <td class=\"control editTr\"><a href=\"#\" class=\"glyphicon glyphicon-ok\"></a></td>
                                </tr>
                              <tr id=\"tr122345\">
                                    <td class=\"control\"><span>new</span></td>
                                    <td class=\"typeTr\">שחיה</td>
                                    <td class=\"genreTr\">טכניקה</td>
                                    <td class=\"placeTr\" >מרכז ספורט אוניברסיטת ת\"א</tdclas>
                                    <td class=\"timeTr\">06:00-07:00</td>
                                    <td class=\"dayTr\">2.1.2017</td>
                                    <td class=\"control deleteTr\"><a href=\"#\" class=\"glyphicon glyphicon-remove\"></a></td>
                                    <td class=\"control editTr\"><a href=\"#\" class=\"glyphicon glyphicon-map-marker\"></a></td>
                                </tr><tr id=\"tr122345\">
                                    <td class=\"control\"></td>
                                    <td class=\"typeTr\">שחיה</td>
                                    <td class=\"genreTr\">טכניקה</td>
                                    <td class=\"placeTr\" >מרכז ספורט אוניברסיטת ת\"א</tdclas>
                                    <td class=\"timeTr\">06:00-07:00</td>
                                    <td class=\"dayTr\">2.1.2017</td>
                                    <td class=\"control deleteTr\"><a href=\"#\" class=\"glyphicon glyphicon-remove\"></a></td>
                                    <td class=\"control editTr\"><a href=\"#\" class=\"glyphicon glyphicon-ok\"></a></td>
                                </tr>
                              <tr id=\"tr122345\">
                                    <td class=\"control\"><span>new</span></td>
                                    <td class=\"typeTr\">שחיה</td>
                                    <td class=\"genreTr\">טכניקה</td>
                                    <td class=\"placeTr\" >מרכז ספורט אוניברסיטת ת\"א</tdclas>
                                    <td class=\"timeTr\">06:00-07:00</td>
                                    <td class=\"dayTr\">2.1.2017</td>
                                    <td class=\"control deleteTr\"><a href=\"#\" class=\"glyphicon glyphicon-remove\"></a></td>
                                    <td class=\"control editTr\"><a href=\"#\" class=\"glyphicon glyphicon-map-marker\"></a></td>
                                </tr><tr id=\"tr122345\">
                                    <td class=\"control\"></td>
                                    <td class=\"typeTr\">שחיה</td>
                                    <td class=\"genreTr\">טכניקה</td>
                                    <td class=\"placeTr\" >מרכז ספורט אוניברסיטת ת\"א</tdclas>
                                    <td class=\"timeTr\">06:00-07:00</td>
                                    <td class=\"dayTr\">2.1.2017</td>
                                    <td class=\"control deleteTr\"><a href=\"#\" class=\"glyphicon glyphicon-remove\"></a></td>
                                    <td class=\"control editTr\"><a href=\"#\" class=\"glyphicon glyphicon-ok\"></a></td>
                                </tr>
                              <tr id=\"tr122345\">
                                    <td class=\"control\"><span>new</span></td>
                                    <td class=\"typeTr\">שחיה</td>
                                    <td class=\"genreTr\">טכניקה</td>
                                    <td class=\"placeTr\" >מרכז ספורט אוניברסיטת ת\"א</tdclas>
                                    <td class=\"timeTr\">06:00-07:00</td>
                                    <td class=\"dayTr\">2.1.2017</td>
                                    <td class=\"control deleteTr\"><a href=\"#\" class=\"glyphicon glyphicon-remove\"></a></td>
                                    <td class=\"control editTr\"><a href=\"#\" class=\"glyphicon glyphicon-map-marker\"></a></td>
                                </tr><tr id=\"tr122345\">
                                    <td class=\"control\"></td>
                                    <td class=\"typeTr\">שחיה</td>
                                    <td class=\"genreTr\">טכניקה</td>
                                    <td class=\"placeTr\" >מרכז ספורט אוניברסיטת ת\"א</tdclas>
                                    <td class=\"timeTr\">06:00-07:00</td>
                                    <td class=\"dayTr\">2.1.2017</td>
                                    <td class=\"control deleteTr\"><a href=\"#\" class=\"glyphicon glyphicon-remove\"></a></td>
                                    <td class=\"control editTr\"><a href=\"#\" class=\"glyphicon glyphicon-ok\"></a></td>
                                </tr>
                              <tr id=\"tr122345\">
                                    <td class=\"control\"><span>new</span></td>
                                    <td class=\"typeTr\">שחיה</td>
                                    <td class=\"genreTr\">טכניקה</td>
                                    <td class=\"placeTr\" >מרכז ספורט אוניברסיטת ת\"א</tdclas>
                                    <td class=\"timeTr\">06:00-07:00</td>
                                    <td class=\"dayTr\">2.1.2017</td>
                                    <td class=\"control deleteTr\"><a href=\"#\" class=\"glyphicon glyphicon-remove\"></a></td>
                                    <td class=\"control editTr\"><a href=\"#\" class=\"glyphicon glyphicon-map-marker\"></a></td>
                                </tr><tr id=\"tr122345\">
                                    <td class=\"control\"></td>
                                    <td class=\"typeTr\">שחיה</td>
                                    <td class=\"genreTr\">טכניקה</td>
                                    <td class=\"placeTr\" >מרכז ספורט אוניברסיטת ת\"א</tdclas>
                                    <td class=\"timeTr\">06:00-07:00</td>
                                    <td class=\"dayTr\">2.1.2017</td>
                                    <td class=\"control deleteTr\"><a href=\"#\" class=\"glyphicon glyphicon-remove\"></a></td>
                                    <td class=\"control editTr\"><a href=\"#\" class=\"glyphicon glyphicon-ok\"></a></td>
                                </tr>
                              <tr id=\"tr122345\">
                                    <td class=\"control\"><span>new</span></td>
                                    <td class=\"typeTr\">שחיה</td>
                                    <td class=\"genreTr\">טכניקה</td>
                                    <td class=\"placeTr\" >מרכז ספורט אוניברסיטת ת\"א</tdclas>
                                    <td class=\"timeTr\">06:00-07:00</td>
                                    <td class=\"dayTr\">2.1.2017</td>
                                    <td class=\"control deleteTr\"><a href=\"#\" class=\"glyphicon glyphicon-remove\"></a></td>
                                    <td class=\"control editTr\"><a href=\"#\" class=\"glyphicon glyphicon-map-marker\"></a></td>
                                </tr><tr id=\"tr122345\">
                                    <td class=\"control\"></td>
                                    <td class=\"typeTr\">שחיה</td>
                                    <td class=\"genreTr\">טכניקה</td>
                                    <td class=\"placeTr\" >מרכז ספורט אוניברסיטת ת\"א</tdclas>
                                    <td class=\"timeTr\">06:00-07:00</td>
                                    <td class=\"dayTr\">2.1.2017</td>
                                    <td class=\"control deleteTr\"><a href=\"#\" class=\"glyphicon glyphicon-remove\"></a></td>
                                    <td class=\"control editTr\"><a href=\"#\" class=\"glyphicon glyphicon-ok\"></a></td>
                                </tr>
                              <tr id=\"tr122345\">
                                    <td class=\"control\"><span>new</span></td>
                                    <td class=\"typeTr\">שחיה</td>
                                    <td class=\"genreTr\">טכניקה</td>
                                    <td class=\"placeTr\" >מרכז ספורט אוניברסיטת ת\"א</tdclas>
                                    <td class=\"timeTr\">06:00-07:00</td>
                                    <td class=\"dayTr\">2.1.2017</td>
                                    <td class=\"control deleteTr\"><a href=\"#\" class=\"glyphicon glyphicon-remove\"></a></td>
                                    <td class=\"control editTr\"><a href=\"#\" class=\"glyphicon glyphicon-map-marker\"></a></td>
                                </tr><tr id=\"tr122345\">
                                    <td class=\"control\"></td>
                                    <td class=\"typeTr\">שחיה</td>
                                    <td class=\"genreTr\">טכניקה</td>
                                    <td class=\"placeTr\" >מרכז ספורט אוניברסיטת ת\"א</tdclas>
                                    <td class=\"timeTr\">06:00-07:00</td>
                                    <td class=\"dayTr\">2.1.2017</td>
                                    <td class=\"control deleteTr\"><a href=\"#\" class=\"glyphicon glyphicon-remove\"></a></td>
                                    <td class=\"control editTr\"><a href=\"#\" class=\"glyphicon glyphicon-ok\"></a></td>
                                </tr>
                              <tr id=\"tr122345\">
                                    <td class=\"control\"><span>new</span></td>
                                    <td class=\"typeTr\">שחיה</td>
                                    <td class=\"genreTr\">טכניקה</td>
                                    <td class=\"placeTr\" >מרכז ספורט אוניברסיטת ת\"א</tdclas>
                                    <td class=\"timeTr\">06:00-07:00</td>
                                    <td class=\"dayTr\">2.1.2017</td>
                                    <td class=\"control deleteTr\"><a href=\"#\" class=\"glyphicon glyphicon-remove\"></a></td>
                                    <td class=\"control editTr\"><a href=\"#\" class=\"glyphicon glyphicon-map-marker\"></a></td>
                                </tr>
                            </table>";
        }else if($_POST['user'] == "client"){
            echo "client table";
        }
        /*$query = "SELECT user,name,email FROM tbl_user_207 WHERE user=\"".$_POST['user']."\" AND id=\"".$_POST['id']."\"";

        $response = @mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($response)){
            echo
                "<li>" .$row['name'] ."</li>" .
                "<li>" .$row['email'] ."</li>" .
                "<li>" .$row['user'] ."</li>" .
                "<li><a href='#'>edit</a></li>"
            ;
        }
        echo "<li><a href='index.html'>Log Out</a></li>";*/
    } else {
        echo "Couldn't issue database query<br>";
        echo mysqli_error($conn);
    }
    mysqli_close($conn);
?>