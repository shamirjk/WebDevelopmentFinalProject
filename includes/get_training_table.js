$(document).ready( function () {
    var dataString = "user=" + currentUser['user'] + "&id=" +currentUser['id'];
    $.ajax({
        type: "POST",
        url: "get_training_table.php",
        data: dataString,
        cache: true,
        success: function (html) {
            $("." + currentUser['user'] + " .trainigTable" ).html(html);
            openCloseTraining();
        }
    });
});

var openCloseTraining = function(){
    var trTraining = $(".list");
        trTraining.each(function () {
            var tr =$(this);
            tr.click(function (){
                if($(this).attr('class') == "list"){
                    trTraining.each(function () {
                        $(this).removeClass("list").addClass("notFull");
                        console.log($(this).attr('class'));
                    });
                    $(this).removeClass("notFull").addClass("full");

                    $(".addTraining").css("display","none");
                    console.log(tr.attr('class'));
                    $("#hamburger").parent().removeClass("lead").addClass();
                    $("#back").parent().addClass("lead");
                }
                // <ul class="hambBack">
                //     <li><a id="back" href="#"></a></li>
                //     <li class="lead"><a href="#" id="hamburger"></a></li>
                //     </ul>

            });
        });
};

// $("#hamburger, .overlay").click(function(){
//     $("header").toggleClass(function(){
//         if($(this).is(".closed")){
//             return "opened";
//         }else return "closed";
//     });
// });