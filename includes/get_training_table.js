$(document).ready( function () {
    var dataString = "user=" + currentUser['user'] + "&id=" +currentUser['id'];
    $.ajax({
        type: "POST",
        url: "get_training_table.php",
        data: dataString,
        cache: true,
        success: function (html) {
            $("." + currentUser['user'] + " .trainigTable" ).html(html);
        }
    });
});
