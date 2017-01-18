window.onload = function(){

    var loc = window.location.pathname;

    $("nav").find("a").each(function() {
        if((loc.indexOf($(this).attr("href"))) != -1){
            $(this).css({"background-color":"#ffffff","color":"#777777"});
            $("nav ~ section").css("background-color","#ffffff");
        }
    });

    $("#coachWindow a").each(function() {
        $(this).click(function (){
            $("input[name=coach]").val($(this).find("h2").html());
        });
    });

    var allLi = $("#mapSection li").each(function () {
        var curLi = $(this);
        curLi.click(function(){
                allLi.each(function () {
                    $(this).css({"background-color":"#ffffff","color":"#777777","font-weight":"normal"});
                });
            curLi.css({"background-color":"#777777","color":"#ffffff", "font-weight":"bold"});
        });
    });

    $("#repetions input").click(function (){
        if($(this).is(':checked')) {
            $("#repeats").css("display","block");
        }
        else{
            $("#repeats").css("display","none");
            $("#repeats p").each(function (){
                $(this).css({"background-color":"#ffffff","color":"#777777","font-weight":"normal"});
            });
        }
    });

    $("#repeats p").each(function (){
        var day = $(this)
        day.click(function () {
            if(day.css("background-color") != "rgb(119, 119, 119)"){
                day.css({"background-color":"#777777","color":"#ffffff","font-weight":"bold"});
            }
            else{
                day.css({"background-color":"#ffffff","color":"#777777","font-weight":"normal"});
            }
        });
    });

    $('.mySubmit').click(function() {
        window.location.href = "new_training.html"
    })
};

var topSite = function() {
    document.write(
        "   <div id=\"wrapper\">"+
        "           <header>"+
        "               <a href=\"index.html\" id=\"logo\"></a>"+
        "               <a href=\"#\" id = \"profile\"></a>"+
        "               <form>"+
        "                   <input type=\"text\" name=\"search\" placeholder=\"Search...\">"+
        "               </form>"+
        "               <nav>"+
        "                   <ul>"+
        "                       <li><a href=\"training.html\">אימונים</a></li>"+

        "                       <li><a href=\"#\">מאמנים</a></li>"+
        "                       <li><a href=\"#\">מתקנים</a></li>"+
        "                       <li><a href=\"#\">מתאמנים</a></li>"+
        "                       <li><a href=\"#\">דוחות</a></li>"+
        "                       <li>"+
        "                           <a href=\"#\">הודעות</a>"+
        "                           <a href=\"#\" id =\"messageCounter\">2</a>"+
        "                       </li>"+
        "                   </ul>"+
        "               </nav>"+
        "               <section></section>"+
        " "+
        "           </header>"+
        "           <main>"
    );
};

var bottomSite = function() {
    document.write(
        "           </main>"+
        "   </div>"
    );
};