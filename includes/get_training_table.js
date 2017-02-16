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
            approveDeclineTraining();
        }
    });
});

var approveDeclineTraining = function() {
    $(".acceptTraining").each(function () {
        $(this).click(function () {
            var trainingId=($(this).closest('.additional').prev('tr').attr('id')).replace("tr","");
            console.log(trainingId);
            var dataString="coach_id="+currentUser['id']+"&training_id="+trainingId+"&training_status=1";
            $.ajax({
                type: "POST",
                url: "approve_decline_training.php",
                data: dataString,
                cache: true,
                success: function (html) {
                    console.log(html);
                    location.reload();
                }
            });
        });

    });
    $(".declinerTraining").each(function () {

        $(this).click(function () {
            var trainingId=($(this).closest('.additional').prev('tr').attr('id')).replace("tr","");
            console.log(trainingId);
            var dataString="coach_id="+currentUser['id']+"&training_id="+trainingId+"&training_status=2";
            $.ajax({
                type: "POST",
                url: "approve_decline_training.php",
                data: dataString,
                cache: true,
                success: function (html) {
                    console.log(html);
                    location.reload();
                }
            });
        });

    });
};


var openCloseTraining = function () {
    var allTrainingTr = $("tr[id^='tr']").each(function () {

        $(this).click(function () {
            var nextTrThis = $(this).next();
            if (nextTrThis.hasClass('addClosed')) {
                if(!nextTrThis.hasClass('withMap')){
                    enterAdditionalData(nextTrThis);
                    nextTrThis.addClass('withMap');
                }
                nextTrThis.removeClass('addClosed').addClass('addOpened');
                $("#hamburger").parent().removeClass("lead").addClass();
                $("#back").parent().addClass("lead");
            } else {
                nextTrThis.removeClass('addOpened').addClass('addClosed');
            }
            allTrainingTr.each(function () {
                var nextTr = $(this).next();
                if (!nextTrThis.is(nextTr)) {
                    if (nextTr.hasClass('addOpened')) {
                        nextTr.removeClass('addOpened').addClass('addClosed');
                    }
                }
            });
        });
    });
};

var enterAdditionalData = function(trOb) {
    var address = trOb.find('.addiAddress');
    var jasonPath = (address.children('p').eq(1).html() + "," + address.children('p').eq(2).html()).split(" ").join("+");

    jasonPath = "https://maps.googleapis.com/maps/api/geocode/json?address=" +
        jasonPath + "&key=AIzaSyBIxztqzoBiEWON80fImWSA6WY1D7yx2GY";

    $.getJSON(jasonPath, function (data) {
        if (data.status == "OK") {
            var location = data.results[0];
            initMap(location,address.find('.mapGoogle')[0])
        }
    });
    $.getJSON("includes/user_pic.json", function (data) {
        var coachId = trOb.find(".addiCoach p").next().html();
        $.each(data.profileUrl, function (k, v) {
            if(v.id == coachId){
                var backgroundUrl = v.url;
                trOb.find('.addiCoach article').css(
                    {"background":"url(" + backgroundUrl +") no-repeat",
                        "background-size":"cover"}
                );
            }
        });
    });
};

function initMap(location,trOb) {
    var map = new google.maps.Map(trOb, {
        center: {lat: location.geometry.location.lat , lng: location.geometry.location.lng},
        zoom: 15
    });

    var infowindow = new google.maps.InfoWindow();
    var service = new google.maps.places.PlacesService(map);

    service.getDetails({
        placeId: location.place_id
    }, function(place, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
            var marker = new google.maps.Marker({
                map: map,
                position: place.geometry.location
            });
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.setContent(place.name);
                infowindow.open(map, this);
            });
        }
    });
}

