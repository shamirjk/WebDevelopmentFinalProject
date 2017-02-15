var currentUser = (function() {
    var data = window.location.search.substring(1);
    var namesAndValues = data.split("&");
    $.ajax({
        type: 'POST',
        url: 'user_verification.php',
        data: data,
        cache: true,
        success: function(html){
            if(html != "true"){
                window.location.href = "login.html";
            }
        }
    });
    var parameters = [];
    for ( var varPlusVal in namesAndValues) {
        parameters[namesAndValues[varPlusVal].split("=")[0]] = namesAndValues[varPlusVal].split("=")[1];
    }
    return parameters;
})();

$(document).ready( function (){
    $("." + currentUser['user']).each(function(){
        $(this).removeClass("notActiveUser").addClass("activeUser");
    });
    $("#logo,.breadcrumb" + " a[href='index.html']"
    ).attr("href","index.html?user=" + currentUser['user'] + "&id=" +currentUser['id']);

    $("." + currentUser['user'] + " a[href='training.html']," +
        "breadcrumb" + " a[href='training.html']"
    ).attr("href","training.html?user="  + currentUser['user'] + "&id=" +currentUser['id']);

    $("." + currentUser['user'] + " a[href='add_training.html']," +
        "breadcrumb" + " a[href='add_training.html']"
    ).attr("href","add_training.html?user="  + currentUser['user'] + "&id=  " +currentUser['id']);

    loadProfile();
});

var loadProfile = function(){
    var dataString = "user=" + currentUser['user'] + "&id=" +currentUser['id'];
    $.ajax({
        type: "POST",
        url: "get_user_data.php",
        data: dataString,
        cache: true,
        success: function (html) {
            $('#profileData').html(html);

        }
    });

    $.getJSON("includes/user_pic.json", function (data) {
        console.log("in get json");
        $.each(data.profileUrl, function (k, v) {
            console.log("in data json");
            if(v.id == currentUser['id']){
                console.log(v.id);
                var backgroundUrl = v.url;
                console.log($("#profileImg").css(
                    {"background":"url(" + backgroundUrl +") no-repeat",
                    "background-size":"cover"}
                ));
            }
        });
    });
};

