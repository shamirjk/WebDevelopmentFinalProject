$(document).ready(function () {
    $("form").submit(function (e) {
        e.preventDefault();
        var userId = $("input[name=userId]").val();
        var user = $("select[name=user]").val();
        var dataString = "user=" + user + "&id=" + userId;
        console.log(userId + "  " + user);
        $.ajax({
            type: 'POST',
            url: 'user_verification.php',
            data: dataString,
            cache: true,
            success: function(data){
                if(data == "true"){
                    window.location.href = "index.html?user=" + user + "&id=" + userId;
                } else if(data == "false"){
                    $("#wrong").html("!!!נתונים שגויים");
                } else{
                    $("#wrong").html(data);
                }
            }
        });
    });
});