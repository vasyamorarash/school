/**
 * Created by Ivan on 27.03.2015.
 */

var map;

function initialize() {

    var mapOptions = {
        zoom: 13,
        mapTypeControl: true,
        mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
        navigationControl: true,
        navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);

    // Try HTML5 geolocation
    if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = new google.maps.LatLng(position.coords.latitude,
                position.coords.longitude);

            var infowindow = new google.maps.InfoWindow({
                map: map,
                position: pos,
                content: 'You'
            });

            map.setCenter(pos);
            var request = {
                location: pos,
                radius: 5000,
                types: ['food']
            };
            infowindow = new google.maps.InfoWindow();
            var service = new google.maps.places.PlacesService(map);
            service.nearbySearch(request, callback);

        }, function() {
            handleNoGeolocation(true);
        });
    } else {
        // Browser doesn't support Geolocation
        handleNoGeolocation(false);
    }
}

function handleNoGeolocation(errorFlag) {
    if (errorFlag) {
        var content = 'Error: The Geolocation service failed.';
    } else {
        var content = 'Error: Your browser doesn\'t support geolocation.';
    }

    var options = {
        map: map,
        position: new google.maps.LatLng(48.309019, 25.944733),
        content: content
    };

    var infowindow = new google.maps.InfoWindow(options);
    map.setCenter(options.position);
}

function callback(results, status) {
    if (status == google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
        }
    }
}

function createMarker(place) {
    var placeLoc = place.geometry.location;
    var marker = new google.maps.Marker({
        map: map,
        position: place.geometry.location
    });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(place.name);
        infowindow.open(map, this);
    });
}


//google.maps.event.addDomListener(window, 'load', initialize);

/*
 function initialize() {
 var coordX = 48.309019;
 var coordY = 25.944733;


 var latlng = new google.maps.LatLng(coordX, coordY);
 var settings = {
 zoom: 12,
 center: latlng ,
 mapTypeControl: true,
 mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
 navigationControl: true,
 navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
 mapTypeId: google.maps.MapTypeId.ROADMAP
 };
 var map = new google.maps.Map(document.getElementById("map_canvas"),
 settings);

 var companyLogo = new google.maps.MarkerImage('img/logo.png',
 new google.maps.Size(100,50),
 new google.maps.Point(0,0),
 new google.maps.Point(50,50)
 );
 var companyShadow = new google.maps.MarkerImage('img/logo_shadow.png',
 new google.maps.Size(130,50),
 new google.maps.Point(0,0),
 new google.maps.Point(65, 50)
 );
 var companyPos = new google.maps.LatLng(coordX, coordY);
 var companyMarker = new google.maps.Marker({
 position: companyPos,
 map: map,
 icon: companyLogo,
 shadow: companyShadow,
 title:"Company Title"
 });
 }
 */