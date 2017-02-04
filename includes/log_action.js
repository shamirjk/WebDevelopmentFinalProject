$(document).ready(function () {
    $("form").submit(function () {
        var userId = $("input[name=userId]").val();
        var user = $("select[name=user]").val();
        var dataString = "user=" + user + "&id=" + userId;
        console.log(userId + "  " + user);
        $.ajax({
            type: "POST",
            url: "user_varification.php",
            data: dataString,
            cache: true,
            success: function(data){
                if(data == "true"){
                    $("form").attr("action","index.html?user=" + user + "&id=" + userId);
                } else if(data == "false"){
                    $("wrong").html("נתונים שגוים");
                } else{
                    $("wrong").html(data);
                }
            }
        });
    });
});