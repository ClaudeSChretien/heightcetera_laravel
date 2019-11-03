$(document).ready(function() {

    markersInfos.forEach((item) => {
        
        // Create Slider
            var src = item.path
            $(".slider").append("<div><img src='/img/"+ src + "' class='sliderimg'></div>")
          
          
    });

    // 
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
                        bottom: "-15px"
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
                            $(this).addClass("btn-primary");
                            categories.push(this.id)
                        }
                    });
                else{
                    $(this).addClass("active")
                    $(this).addClass("btn-primary");
                }
                categories.push(this.id)
                    // code block
                break;
            case 3:
                $(".filter").each(function(index) {
                    if (thisFilter.id != this.id) {
                        $(this).removeClass("active");
                        $(this).removeClass("btn-primary");
                        categories.splice(categories.indexOf(this.id), 1);
                    }
                });
                // code block
                break;
            default:
                $(this).toggleClass("active")
                $(this).toggleClass("btn-primary");
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

    $( ".sliderimg" ).each(function(index) {
        $(this).on("click", function(){
            // For the boolean value
            displayImage(markersInfos[index]);
        });
    });
    
});


/* Google Map */
// Initialize and add the map

var map;
var markers = [];
var markerCluster;

function initMap() {

    // where the map is located .. Need to make that responsive
    var mapOptions = {
        center: new google.maps.LatLng(-27.470125, 153.021072),
        zoom: 12,
        disableDefaultUI: true,
        fullscreenControl: false,
        streetViewControl: false

    };

    // create the map
    map = new google.maps.Map(document.getElementById("map"), mapOptions);

    addMarkers(markersInfos);
    // marker cluser. aglomerate markers when close
    markerCluster = new MarkerClusterer(map, markers, { imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m' });
    

    google.maps.event.addListener(map, 'idle', function() {
        //showVisibleMarkers();
    });
}

function addMarkers(markersInfos) {
    
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
        var myLatLng = new google.maps.LatLng(markerInfos.lat, markerInfos.lon),
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
    
    if (typeof markerCluster !== 'undefined') {
        // the variable is defined
        markerCluster.clearMarkers()
        markerCluster.addMarkers(markers)
    }
}
/* function to connect map to gallery.. Could be usefull with 
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
*/

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

    //location.hash = "map";
    //location.hash = null;

    // white hider
    $("#mapHide").fadeOut(1500)

    map.setOptions({ gestureHandling: 'greedy' });
});

var eventDisplayer = $("#eventDisplayer");
var eventDisplayerContainer = $("#eventDisplayerContainer");
var eventDisplayerImg = $("#eventDisplayerImg");

function displayImage(marker) {
    eventDisplayerContainer.css("display", "block");
    var img = $("#" + marker.name)
    eventDisplayerImg.attr("src", "/img/"+marker.path);
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