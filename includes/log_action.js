$(document).ready(function () {
    $("form").submit(function () {
        var userId = $("input[name=userId]").val();
        var user = $("select[name=user]").val();
        console.log(userId + "  " + user);

        $("form").attr("action","index.html?user=" + user + "&id=" + userId);
    });
});