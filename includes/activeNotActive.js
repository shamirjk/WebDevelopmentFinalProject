var currentUser = (function() {
        var namesAndValues = window.location.search.substring(1).split("&");
        var parameters = [];
        for ( var varPlusVal in namesAndValues) {
            parameters[namesAndValues[varPlusVal].split("=")[0]] = namesAndValues[varPlusVal].split("=")[1];
        }
        console.log(parameters['user']);
        if(parameters['user'] == undefined || (parameters['user'] != "admin" && parameters['user'] != "client" && parameters['user'] != "coach")){
            window.location.href = "login.html";
        }
        return parameters;
})();

$(document).ready( function (){
    $("." + currentUser['user']).each(function(){
        $(this).removeClass("notActiveUser").addClass("activeUser");
    });
    $("#logo").attr("href","index.html?user=" + currentUser['user']);

    loadProfile();
});

var loadProfile = function(){
    var dataString = "user=" + currentUser['user'];
    $.ajax({
        type: "POST",
        url: "get_user_data.php",
        data: dataString,
        cache: true,
        success: function (html) {
            console.log(html);
            $('#profileData').html(html);
        }
    });
};