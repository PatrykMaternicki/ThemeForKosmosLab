var map;

function initMap() {
		var localization = new google.maps.LatLng(53.777,20.487);

			// Styl mapy
			var map_style =	[
    {
        "featureType": "all",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "saturation": 36
            },
            {
                "color": "#333333"
            },
            {
                "lightness": 40
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#ffffff"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#fefefe"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#fefefe"
            },
            {
                "lightness": 17
            },
            {
                "weight": 1.2
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f5f5f5"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f5f5f5"
            },
            {
                "lightness": 21
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#dedede"
            },
            {
                "lightness": 21
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 17
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 29
            },
            {
                "weight": 0.2
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 18
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f2f2f2"
            },
            {
                "lightness": 19
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#e9e9e9"
            },
            {
                "lightness": 17
            }
        ]
    }
]





				var option_map = {
					zoom: 15,
					center: localization,
					mapTypeControl: false,
					navigationControl:false
				};
				map = new google.maps.Map(document.getElementById("map"), option_map);
				map.setOptions({styles: map_style});



				//Właścuwiści markera
				var icon_size = new google.maps.Size(200,200);
				var new_point_start = new google.maps.Point(0,0);
				var new_point_catch = new google.maps.Point(16,16);
				var marker_image = "img/marker.png";
				// Stworzenie nowego markera
				var marker = new google.maps.MarkerImage(marker_image,icon_size,new_point_start, new_point_catch);

				// stworzenie markera właściwości
				var point  = new google.maps.LatLng(53.775,20.486);
				var option_marker =
				{
					position: point,
					map: map,
					title: "Inperium Software House",
					icon: marker
				}

				//Inicjacja API
				var gmp_marker = new google.maps.Marker(option_marker);

}


	/*var local = new google.maps.LatLng(53.770,20.480);
	var option_map =
	{
	center: local,
    zoom: 13,
	};

	map = new google.maps.Map(document.getElementById('map'),option_map);

  var point_map = new google.maps.LatLng(53.770,20.480);

  var gmp_marker_option  =
	{
	position: lat: ident_map;
	map: map,
	title; "Inperium Software House",
	}

}
*/
