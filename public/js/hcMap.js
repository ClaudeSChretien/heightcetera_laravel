$(document).ready(function () {
    // 
    $(".test").click(function () {
        $(this).fadeOut();

    })
    $("#filters-icon").click(function () {
        if ($(this).hasClass("hidden")) {
            $(".slick-slider").fadeOut();
            $("#mapSettings").animate({
                bottom: "20px"
            }, 500);
            $("#filters-icon").animate({
                bottom: "-100px",
                "z-index": 15,
                "width": "50px",
                "margin-left": "-25px"
            }, {
                duration: 500,
                complete: function () {
                    $("#filters-icon").animate({
                        bottom: "-15px"
                    }, 500);
                }
            })
            $(this).removeClass("hidden")
        } else {
            $("#mapSettings").animate({
                bottom: "-100px"
            }, 1500);
            $("#filters-icon").animate({
                bottom: "-120px",
                "z-index": 5,
                "width": "100px",
                "margin-left": "-50px"
            }, {
                duration: 500,
                complete: function () {
                    $(".slick-slider").fadeIn();
                    $("#filters-icon").animate({
                        bottom: "-40px"
                    }, 1500);
                }
            })
            $(this).addClass("hidden")
        }
    }); //#settings-logo

    $(".filter").click(function () {

        // Verify the state of the filters
        // if all active and one is selected, disable others.
        // if only one is activate and it is disabled. Activate all.

        var filtersNb = $(".filter.active").length
        var categories = []
        var thisFilter = this

        $(".filter.active").each(function () { categories.push(this.id) });

        switch (filtersNb) {
            case 1:
                var activeFilter = $(".filter.active")
                if (this.id == activeFilter[0].id)
                    $(".filter").each(function (index) {
                        if (this.id != activeFilter.id) {
                            $(this).addClass("active");
                            $(this).addClass("btn-primary");
                            categories.push(this.id)
                        }
                    });
                else {
                    $(this).addClass("active")
                    $(this).addClass("btn-primary");
                }
                categories.push(this.id)
                // code block
                break;
            case 3:
                $(".filter").each(function (index) {
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
    }) //.filter

    $("#eventDisplayer").click(function (evt) {
        if (evt.target.id == "location")
            return;
        eventDisplayerContainer.css("display", "none");
        eventDisplayerImg.removeClass("w-100")
        eventDisplayerImg.removeClass("h-100")

        eventDisplayerImgDiv.removeClass("h-100")
        eventDisplayerImgDiv.removeClass("w-100")

        eventDisplayer.css("bottom","")
        
        $('body').css('overflow', '')
    }) // #eventDisplayer
});


/* Google Map */
// Initialize and add the map

var map;
var markers = [];
var markerCluster;
var markersInfos;


function initMarkers() {

    var path = document.location.pathname;


    $.getJSON(path + "/markers", function (data) {
        markersInfos = data;
        initMap();

        markersInfos.forEach((item) => {

            // Create Slider
            var src = item.path
            $(".slider").append("<div><img src='/postsImages/" + src + "' class='sliderimg'></div>")

        });
    });
}

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


    google.maps.event.addListener(map, 'idle', function () {
        //showVisibleMarkers();
    });

    map.setOptions({ gestureHandling: 'greedy' });
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
        google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () {
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
$("#logo").click(function () {

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

    $('.slider').slick({
        slidesToShow: 7,
        slidesToScroll: 3,
        dots: false,
        centerMode: false,
        infinite: false,
        focusOnSelect: true,
        variableWidth: true
    })

    $(".sliderimg").each(function (index) {
        var isDragging = false;
        var gotMouseDown = false;
        $(this)
            .mousedown(function () {
                isDragging = false;
                gotMouseDown = true;
                $(this).mousemove(function () {
                    isDragging = true;
                    $(this).off("mousemove");
                });
            })

            .mouseup(function () {
                var wasDragging = isDragging;
                isDragging = false;
                $(this).off("mousemove");
                if (!wasDragging && gotMouseDown) {
                    displayImage(markersInfos[index]);
                    gotMouseDown = false;
                }
            });

    });
    $(".slider").fadeIn();
    $(".test").fadeOut();
});

var eventDisplayer = $("#eventDisplayer");
var eventDisplayerContainer = $("#eventDisplayerContainer");
var eventDisplayerImg = $("#eventDisplayerImg");
var eventDisplayerImgDiv = $("#eventDisplayerImgDiv");

function displayImage(marker) {
    var img = $("#" + marker.name)
    eventDisplayerImg.attr("src", "/postsImages/" + marker.path);


    eventDisplayerContainer.css("display", "block");

    $("#location").text(marker.name)
    $("#caption").text(marker.text_fr)
    $("#photographer").text(marker.photographer)

    var imgHeight = $("#eventDisplayerImg").height();
    var imgWidth = $("#eventDisplayerImg").width();
    if (imgHeight > imgWidth) {
        eventDisplayer.css("bottom", "10px")
        eventDisplayerImgDiv.addClass("h-100")
        eventDisplayerImg.addClass("h-100")
    }
    else {
        eventDisplayer.css("bottom", "10px")
        eventDisplayerImgDiv.addClass("w-100")
        eventDisplayerImg.addClass("w-100")
    }
    
    $('body').css('overflow', 'hidden')


}