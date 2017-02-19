$(document).ready(function () {

    var allLi = $("#mapSection li").each(function () {
        var curLi = $(this);
        curLi.click(function(){
            allLi.each(function () {
                $(this).css({"background-color":"#ffffff","color":"#777777","font-weight":"normal"});
            });
            curLi.css({"background-color":"#777777","color":"#ffffff", "font-weight":"bold"});
        });
    });

    $("#coachWindow a").each(function() {
        $(this).click(function (){
            $("input[name=coach]").val($(this).find("h2").html());
        });
    });

    $("#repeatsCheck input").click(function (){
        if($(this).is(':checked')) {
            $(".repeats").css("display","block");
        }
        else{
            $(".repeats").css("display","none");
            $(".repeats p").each(function (){
                $(this).css({"background-color":"#ffffff","color":"#777777","font-weight":"normal"});
            });
        }
    });

    $(".repeats a").each(function (){
        var day = $(this)
        day.click(function (e) {
            e.preventDefault();
            if(day.parent().css("background-color") != "rgb(119, 119, 119)"){
                day.parent().css({"background-color":"#777777"});
                day.css({"color":"#ffffff","font-weight":"bold"});
            }
            else{
                day.parent().css({"background-color":"#ffffff"});
                day.css({"color":"#777777","font-weight":"normal"});
            }
        });
    });

    $("#newTraining form").submit(function (e) {
        e.preventDefault();
        var hourStart = $("input[name=fromTime]").val();
        var hourEnd = $("input[name=toTime]").val();
        var dateStart = $("input[name=startDate]").val();
        var trainingType =$("input[name=sport]").val();
        var trainingGenre =$("input[name=type]").val();
        var complexName =$("input[name=place]").val();
        var coachName = $("input[name=coach]").val();

        var dataString = "hstart=" + hourStart + "&hend=" + hourEnd + "&dstart=" + dateStart
            + "&ttype=" + trainingType + "&tgenre=" + trainingGenre
            + "&comname=" + complexName + "&coaname=" + coachName + "&user=" + currentUser['user'];
        $.ajax({
            type: 'POST',
            url: 'add_new_training.php',
            data: dataString,
            cache: true,
            success: function(data){
                if(data == "true"){
                    window.location.href = "training.html?user=" + currentUser['user'] + "&id=" + currentUser['id'];
                } else {
                    location.reload();
                }
            }
        });
    });
});
