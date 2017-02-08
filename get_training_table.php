<?php
    include("my_db.php");
    if(isset($_POST['user'])){
        if($_POST['user'] == "admin"){
            echo "<table class = \"trainingTable\">
                                <tr class=\"tags\"> 
                                    <td class=\"control\"></td>
                                    <td>מאמן<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></a></td>
                                    <td>מקצוע<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                                    <td>סוג<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                                    <td>מקום<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                                    <td>שעה<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                                    <td>תאריך<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></td>
                                    <td class=\"control\"></td>
                                    <td class=\"control\"></td>
                                </tr>
                                <tr id=\"tr122345\">
                                    <td class=\"control\"><span>new</span></td>
                                    <td class=\"coachTr\">אבי כהן</td>
                                    <td class=\"typeTr\">שחיה</td>
                                    <td class=\"genreTr\">טכניקה</td>
                                    <td class=\"placeTr\" >מרכז ספורט אוניברסיטת ת\"א</tdclas>
                                    <td class=\"timeTr\">06:00-07:00</td>
                                    <td class=\"dayTr\">2.1.2017</td>
                                    <td class=\"control deleteTr\"><a href=\"#\" i class=\"material-icons\">delete</i></a></td>
                                    <td class=\"control editTr\"><a href=\"#\" i class=\"material-icons\">edit</i></a></td>
                                </tr>
                               <tr id=\"tr122345\">
                                    <td class=\"control\"><span>new</span></td>
                                    <td class=\"coachTr\">אבי כהן</td>
                                    <td class=\"typeTr\">שחיה</td>
                                    <td class=\"genreTr\">טכניקה</td>
                                    <td class=\"placeTr\" >מרכז ספורט אוניברסיטת ת\"א</tdclas>
                                    <td class=\"timeTr\">06:00-07:00</td>
                                    <td class=\"dayTr\">2.1.2017</td>
                                    <td class=\"control deleteTr\"><a href=\"#\" i class=\"material-icons\">delete</i></a></td>
                                    <td class=\"control editTr\"><a href=\"#\" i class=\"material-icons\">edit</i></a></td>
                                </tr><tr id=\"tr122345\">
                                    <td class=\"control\"><span>new</span></td>
                                    <td class=\"coachTr\">אבי כהן</td>
                                    <td class=\"typeTr\">שחיה</td>
                                    <td class=\"genreTr\">טכניקה</td>
                                    <td class=\"placeTr\" >מרכז ספורט אוניברסיטת ת\"א</tdclas>
                                    <td class=\"timeTr\">06:00-07:00</td>
                                    <td class=\"dayTr\">2.1.2017</td>
                                    <td class=\"control deleteTr\"><a href=\"#\" i class=\"material-icons\">delete</i></a></td>
                                    <td class=\"control editTr\"><a href=\"#\" i class=\"material-icons\">edit</i></a></td>
                                </tr><tr id=\"tr122345\">
                                    <td class=\"control\"><span>new</span></td>
                                    <td class=\"coachTr\">אבי כהן</td>
                                    <td class=\"typeTr\">שחיה</td>
                                    <td class=\"genreTr\">טכניקה</td>
                                    <td class=\"placeTr\" >מרכז ספורט אוניברסיטת ת\"א</tdclas>
                                    <td class=\"timeTr\">06:00-07:00</td>
                                    <td class=\"dayTr\">2.1.2017</td>
                                    <td class=\"control deleteTr\"><a href=\"#\" i class=\"material-icons\">delete</i></a></td>
                                    <td class=\"control editTr\"><a href=\"#\" i class=\"material-icons\">edit</i></a></td>
                                </tr><tr id=\"tr122345\">
                                    <td class=\"control\"><span>new</span></td>
                                    <td class=\"coachTr\">אבי כהן</td>
                                    <td class=\"typeTr\">שחיה</td>
                                    <td class=\"genreTr\">טכניקה</td>
                                    <td class=\"placeTr\" >מרכז ספורט אוניברסיטת ת\"א</tdclas>
                                    <td class=\"timeTr\">06:00-07:00</td>
                                    <td class=\"dayTr\">2.1.2017</td>
                                   <td class=\"control deleteTr\"><a href=\"#\" i class=\"material-icons\">delete</i></a></td>
                                    <td class=\"control editTr\"><a href=\"#\" i class=\"material-icons\">edit</i></a></td>
                                </tr><tr id=\"tr122345\">
                                    <td class=\"control\"><span>new</span></td>
                                    <td class=\"coachTr\">אבי כהן</td>
                                    <td class=\"typeTr\">שחיה</td>
                                    <td class=\"genreTr\">טכניקה</td>
                                    <td class=\"placeTr\" >מרכז ספורט אוניברסיטת ת\"א</tdclas>
                                    <td class=\"timeTr\">06:00-07:00</td>
                                    <td class=\"dayTr\">2.1.2017</td>
                                    <td class=\"control deleteTr\"><a href=\"#\" i class=\"material-icons\">delete</i></a></td>
                                    <td class=\"control editTr\"><a href=\"#\" i class=\"material-icons\">edit</i></a></td>
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
                                    <td class=\"control\"><i class=\"material-icons\">fiber_new</i></td>
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
                                    <td class=\"control editTr\"><a href=\"#\" i class=\"glyphicon glyphicon-map-marker\"></a></td>
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