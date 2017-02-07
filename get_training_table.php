<?php
    include("my_db.php");
    if(isset($_POST['user'])){
        if($_POST['user'] == "admin"){
            echo "<table class = \"myTable\">
                                <tr class=\"tags\"> 
                                    <td><a href=\"#\">3</a></td>
                                    <td>מאמן<a href=\"#\" class=\"glyphicon glyphicon-sort-by-attributes-alt\"></a></td>
                                    <td>מקצוע</td>
                                    <td>סוג</td>
                                    <td>מקום</td>
                                    <td>שעה</td>
                                    <td>תאריך</td>
                                    <td><a href=\"#\">1</a></td>
                                    <td><a href=\"#\">2</a></td>
                                </tr>
                                <tr>
                                    <td><a href=\"#\">3</a></td>
                                    <td>אבי כהן</td>
                                    <td>שחיה</td>
                                    <td>טכניקה</td>
                                    <td>מרכז ספורט אוניברסיטת ת\"א</td>
                                    <td>06:00-07:00</td>
                                    <td>2.1.2017</td>
                                    <td><a href=\"#\">1</a></td>
                                    <td><a href=\"#\">2</a></td>
                                </tr>
                                <tr>
                                    <td><a href=\"#\">3</a></td>
                                    <td>אבי כהן</td>
                                    <td>שחיה</td>
                                    <td>טכניקה</td>
                                    <td>מרכז ספורט אוניברסיטת ת\"א</td>
                                    <td>06:00-07:00</td>
                                    <td>2.1.2017</td>
                                    <td><a href=\"#\">1</a></td>
                                    <td><a href=\"#\">2</a></td>
                                </tr><tr>
                                    <td><a href=\"#\">3</a></td>
                                    <td>אבי כהן</td>
                                    <td>שחיה</td>
                                    <td>טכניקה</td>
                                    <td>מרכז ספורט אוניברסיטת ת\"א</td>
                                    <td>06:00-07:00</td>
                                    <td>2.1.2017</td>
                                    <td><a href=\"#\">1</a></td>
                                    <td><a href=\"#\">2</a></td>
                                </tr><tr>
                                    <td><a href=\"#\">3</a></td>
                                    <td>אבי כהן</td>
                                    <td>שחיה</td>
                                    <td>טכניקה</td>
                                    <td>מרכז ספורט אוניברסיטת ת\"א</td>
                                    <td>06:00-07:00</td>
                                    <td>2.1.2017</td>
                                    <td><a href=\"#\">1</a></td>
                                    <td><a href=\"#\">2</a></td>
                                </tr><tr>
                                    <td><a href=\"#\">3</a></td>
                                    <td>אבי כהן</td>
                                    <td>שחיה</td>
                                    <td>טכניקה</td>
                                    <td>מרכז ספורט אוניברסיטת ת\"א</td>
                                    <td>06:00-07:00</td>
                                    <td>2.1.2017</td>
                                    <td><a href=\"#\">1</a></td>
                                    <td><a href=\"#\">2</a></td>
                                </tr>
                            </table>";
            echo "admin table";
        } else if($_POST['user'] == "coach"){
            echo "coach table";
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