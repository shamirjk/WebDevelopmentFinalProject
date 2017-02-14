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

var openCloseTraining = function () {
    var allTrainingTr = $("tr[id^='tr']").each(function () {
        console.log("in function each");
        $(this).click(function () {
            var nextTrThis = $(this).next();
            //initMap(nextTrThis.find(".addiAddress"));
            jasonMap(nextTrThis.find('.addiAddress'));
            if (nextTrThis.hasClass('addClosed')) {
                nextTrThis.removeClass('addClosed').addClass('addOpened');
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


var jasonMap = function(trOb) {
    //mapGoogle

    console.log(trOb.find(".mapGoogle").attr('class'));

    var jasonPath = (trOb.children('p').eq(1).html() + "," + trOb.children('p').eq(2).html()).split(" ").join("+");

    jasonPath = "https://maps.googleapis.com/maps/api/geocode/json?address=" +
        jasonPath + "&key=AIzaSyBIxztqzoBiEWON80fImWSA6WY1D7yx2GY";

    console.log(jasonPath);

    $.getJSON(jasonPath, function (data) {
        console.log(data.status);
        if (data.status == "OK") {

            var location = data.results[0];//.geometry.location;

            console.log(typeof location.lat);
            console.log(typeof location.lng);
            initMap(location,trOb.find('.mapGoogle')[0])
        }
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

