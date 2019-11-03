$(document).ready(function() {
    console.log("ready!");

    markersInfos.forEach((item) => {
        
            var src = item.path
            $(".slider").append("<div>\
            <img src='/img/"+ src + "'>\
          </div>")
          $(".slider").append("<div>\
            <img src='/img/"+ src + "'>\
          </div>")
          $(".slider").append("<div>\
            <img src='/img/"+ src + "'>\
          </div>")
          $(".slider").append("<div>\
            <img src='/img/"+ src + "'>\
          </div>")
          
    });

    $("#settings-logo").click(function() {
        if ($(this).hasClass("hidden")) {

            $("#mapSettings").animate({
                bottom: "20px"
            }, 500);
            $("#settings-logo").animate({
                bottom: "-100px",
                "z-index": 15,
                "width": "50px",
                "margin-left": "-25px"
            }, {
                duration: 500,
                complete: function() {
                    $("#settings-logo").animate({
                        bottom: "-5px"
                    }, 500);
                }
            })
            $(this).removeClass("hidden")
        } else {
            $("#mapSettings").animate({
                bottom: "-100px"
            }, 1500);
            $("#settings-logo").animate({
                bottom: "-120px",
                "z-index": 5,
                "width": "100px",
                "margin-left": "-50px"
            }, {
                duration: 500,
                complete: function() {
                    $("#settings-logo").animate({
                        bottom: "-20px"
                    }, 1500);
                }
            })
            $(this).addClass("hidden")
        }
    });


    $(".filter").click(function() {

        // Verify the state of the filters
        // if all active and one is selected, disable others.
        // if only one is activate and it is disabled. Activate all.

        var filtersNb = $(".filter.active").length
        var categories = []
        var thisFilter = this

        $(".filter.active").each(function() { categories.push(this.id) });

        switch (filtersNb) {
            case 1:
                var activeFilter = $(".filter.active")
                if (this.id == activeFilter[0].id)
                    $(".filter").each(function(index) {
                        if (this.id != activeFilter.id) {
                            $(this).addClass("active");
                            categories.push(this.id)
                        }
                    });
                else
                    $(this).addClass("active")
                categories.push(this.id)
                    // code block
                break;
            case 3:
                $(".filter").each(function(index) {
                    if (thisFilter.id != this.id) {
                        $(this).removeClass("active");
                        categories.splice(categories.indexOf(this.id), 1);
                    }
                });
                // code block
                break;
            default:
                $(this).toggleClass("active")
                if ($(this).hasClass("active")) categories.push(this.id)
                else categories.splice(categories.indexOf(this.id), 1);
                // code block
        }
        var markerTemp = []
        markersInfos.forEach((item, index) => {
            if (categories.indexOf(item.type) >= 0)
                markerTemp.push(item)
        });
        addMarkers(markerTemp)
    })
});


/* Google Map */
// Initialize and add the map

var map;
var markers = [];
var markerCluster;

function initMap() {

    var mapOptions = {
        center: new google.maps.LatLng(-27.470125, 153.021072),
        zoom: 12,
        disableDefaultUI: true,
        fullscreenControl: false,
        streetViewControl: false

    };

    map = new google.maps.Map(document.getElementById("map"), mapOptions);

    addMarkers(markersInfos);
    markerCluster = new MarkerClusterer(map, markers, { imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m' });
    google.maps.event.addListener(map, 'idle', function() {
        showVisibleMarkers();
    });
}

function addMarkers(markersInfos) {
    if (typeof variable !== 'undefined') {
        markerCluster.setMap(null);
    }

    for (var i = 0; i < markers.length; i++) {

        markers[i].setMap(null);
    }

    // Reset the markers array
    markers = [];
    var markerIcon = {
        scaledSize: new google.maps.Size(35, 35), // scaled size
        origin: new google.maps.Point(0, 0), // origin
        anchor: new google.maps.Point(0, 0) // anchor
    };

    for (var i = 0; i < markersInfos.length; i++) {
        var markerInfos = markersInfos[i]
        markerIcon["url"] = '/img/icon/' + markerInfos.type + ".png"
        var myLatLng = new google.maps.LatLng(markerInfos.Position),
            marker = new google.maps.Marker({
                position: myLatLng,
                title: markerInfos.name,
                map: map,
                icon: markerIcon
            });
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                //map.panTo(locations[i][1]);
                displayImage(markersInfos[i]);
            }
        })(marker, i));
        // Keep marker instances in a global array
        markers.push(marker);
    }
    if (typeof variable !== 'undefined') {
        // the variable is defined
        markerCluster.setMap(null);

    }
    if (typeof markerCluster !== 'undefined') {
        // the variable is defined
        markerCluster.clearMarkers()
        markerCluster.addMarkers(markers)
    }
}

function showVisibleMarkers() {
    var bounds = map.getBounds()
    for (var i = 0; i < markers.length; i++) {
        var marker = markers[i],
            infoPanel = $('#' + marker.title + "Div"); // array indexes start at zero, but not our class names :)

        if (bounds.contains(marker.getPosition()) === true) {
            infoPanel.show();
        } else {
            infoPanel.hide();
        }
    }
}

/* Lock */
$("#logo").click(function() {

    $("#logo").animate({
        top: "-10px",
        width: "100px",
        "margin-left": "-50px"
    }, 1500);
    $("#logo-text").animate({
        top: "30px",
        width: "200px",
        "margin-left": "-100px"
    }, 1500);
    $("#logo-letter").animate({
        top: "7px",
        width: "140px",
        "margin-left": "-70px"
    }, 1500);

    location.hash = "map";
    location.hash = null;

    $("#mapHide").fadeOut(300)

    map.setOptions({ gestureHandling: 'greedy' });
});

var eventDisplayer = $("#eventDisplayer");
var eventDisplayerContainer = $("#eventDisplayerContainer");
var eventDisplayerImg = $("#eventDisplayerImg");

function displayImage(marker) {
    eventDisplayerContainer.css("display", "block");
    var img = $("#" + marker.name)
    eventDisplayerImg.attr("src", img.attr("src"));
    var imgHeight = $("#eventDisplayerImg").height();
    var imgWidth = $("#eventDisplayerImg").width();
    if (imgHeight > imgWidth)
        eventDisplayerImg.addClass("h-100")
    else
        eventDisplayerImg.addClass("w-100")
    $("#location").text(marker.name)
        //$("#rating").text(marker.rating)
    $("#caption").text(marker.text)

    $("#photographer").text(marker.Photographer)
    $('body').css('overflow', 'hidden')
}
$("#eventDisplayer").click(function(evt) {
    if (evt.target.id == "location")
        return;
    eventDisplayerContainer.css("display", "none");
    eventDisplayerImg.removeClass("w-100")
    eventDisplayerImg.removeClass("h-100")
    $('body').css('overflow', '')
})