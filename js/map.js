var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;
var my_location;
var trafficLayer = new google.maps.TrafficLayer();
var bounds = new google.maps.LatLngBounds();
var route;
var geocoder = new google.maps.Geocoder();

function resetMap()
{
	map.setZoom(5);
	map.setCenter(centerLng);
	directionsDisplay.setDirection(null);
}
/*
function initialize() {
    directionsDisplay = new google.maps.DirectionsRenderer({
        draggable: true,
        hideRouteList: false,

        polylineOptions: {
            strokeColor: 'red',
            strokeOpacity: 0.7,
            strokeWeight: 5
        }
    });

    /*var styles = [{
        stylers: [{
            hue: "#002bff"
        }, {
            saturation: -20
        }]
    }];

    var styledMap = new google.maps.StyledMapType(styles, {
        name: "Styled Map"
    });


    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            my_location = new google.maps.LatLng(position.coords.latitude,
                position.coords.longitude);




            map.setCenter(my_location);
        }, function() {
            handleNoGeolocation(true);
        });
    } else {
        // Browser doesn't support Geolocation
        handleNoGeolocation(false);
    }


    function handleNoGeolocation(errorFlag) {
        if (errorFlag) {
            var content = 'Error: The Geolocation service failed.';
        } else {
            var content = 'Error: Your browser doesn\'t support geolocation.';
        }
    }

    var myCenter = new google.maps.LatLng(18.8154265, 76.7751435);


    var mapOptions = {
        //center: myCenter,
        zoom: 9,
        panControl: false,
        zoomControl: false,
        scaleControl: true,

        mapTypeControl: false,
        streetViewControl: false,

        mapTypeIds: google.maps.MapTypeId.TERRAIN,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
            position: google.maps.ControlPosition.BOTTOM_RIGHT
        }
    };
    map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);

    directionsDisplay.setMap(map);
    directionsDisplay.setPanel(document.getElementById('MapPanel'));
    trafficLayer.setMap(map);
    map.mapTypes.set('map_style', styledMap);
    map.setMapTypeId('map_style');


    var infowindow = new google.maps.InfoWindow();
    var marker, i;
    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));


    }


}
*/
function codeAddress(conv) {
    var address = conv;
    geocoder.geocode({
        'address': address
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {

            bounds.extend(results[0].geometry.location);
        } else {
            alert("Geocode was not successful for the following reason: " + status);
        }
    });
}

function fitem() {
    map.fitBounds(bounds);
    console.log("fitting");
}


function calcRoute(a) {

    var val = a;
	val = val.substring(0, val.indexOf("<span"));
    console.log(val);
    var start = my_location;
    var end = val;
    console.log(start);
	console.log(end);
    bounds.extend(start);
    codeAddress(a);
    var request = {
        origin: start,
        destination: end,
        travelMode: google.maps.TravelMode.DRIVING,
        provideRouteAlternatives: true,
        durationInTraffic: true
    };
    directionsService.route(request, function(response, status) {
        console.log(status);
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        }
    });
    fitem();

}


function initialize() {
  var myLatlng = new google.maps.LatLng(18.341146,73.3369509);
  var myLatlng2 = new google.maps.LatLng(16.0294888,73.4856669);
  var myLatlng3 = new google.maps.LatLng(17.1530917,73.2782292);
  var myLatlng4 = new google.maps.LatLng(34.1662616,77.5667382);
  var myLatlng5 = new google.maps.LatLng(32.2461365,78.034916);
  var myLatlng6 = new google.maps.LatLng(23.7230394,81.0237107);
  var myLatlng7 = new google.maps.LatLng(15.3331898,76.4633347);
  var centerLng = new google.maps.LatLng(23.3067491, 78.7569735);

	directionsDisplay = new google.maps.DirectionsRenderer({
        draggable: true,
        hideRouteList: false,

        polylineOptions: {
            strokeColor: 'red',
            strokeOpacity: 0.7,
            strokeWeight: 5
        }
    });
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            my_location = new google.maps.LatLng(position.coords.latitude,
                position.coords.longitude);
        }, function() {
            handleNoGeolocation(true);
        });
    } else {
        // Browser doesn't support Geolocation
        handleNoGeolocation(false);
    }


    function handleNoGeolocation(errorFlag) {
        if (errorFlag) {
            var content = 'Error: The Geolocation service failed.';
        } else {
            var content = 'Error: Your browser doesn\'t support geolocation.';
        }
    }
	
  var mapOptions = {
    zoom: 5,
    center: centerLng,
	panControl: false,
        zoomControl: false,
        scaleControl: true,

        mapTypeControl: false,
        streetViewControl: false,

        mapTypeIds: google.maps.MapTypeId.TERRAIN
  }
  map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);

	directionsDisplay.setMap(map);
    trafficLayer.setMap(map);
	
  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Hello World!'
  });
  var marker1 = new google.maps.Marker({
      position: myLatlng2,
      map: map,
      title: 'Hello World!'
  });
  var marker2 = new google.maps.Marker({
      position: myLatlng3,
      map: map,
      title: 'Hello World!'
  });
  var marker3 = new google.maps.Marker({
      position: myLatlng4,
      map: map,
      title: 'Hello World!'
  });
  var marker4 = new google.maps.Marker({
      position: myLatlng5,
      map: map,
      title: 'Hello World!'
  });
  var marker5 = new google.maps.Marker({
      position: myLatlng6,
      map: map,
      title: 'Hello World!'
  });
  var marker6 = new google.maps.Marker({
      position: myLatlng7,
      map: map,
      title: 'Hello World!'
  });

var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
      '<div id="bodyContent">'+
      '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
      'sandstone rock formation in the southern part of the '+
      'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
      'south west of the nearest large town, Alice Springs; 450&#160;km '+
      '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
      'features of the Uluru - Kata Tjuta National Park. Uluru is '+
      'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
      'Aboriginal people of the area. It has many springs, waterholes, '+
      'rock caves and ancient paintings. Uluru is listed as a World '+
      'Heritage Site.</p>'+
      '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
      'https://en.wikipedia.org/w/index.php?title=Uluru</a> '+
      '(last visited June 22, 2009).</p>'+
      '</div>'+
      '</div>';

  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });
  google.maps.event.addListener(marker, 'click', function() {
    	infowindow.open(map,marker);
  });
}
google.maps.event.addDomListener(window, 'load', initialize);