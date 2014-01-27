	var map;
	var sanfran = new google.maps.LatLng(37.771125, -122.401663);
	
	var MY_MAPTYPE_ID = 'custom_style';
	
	function initialize() {
	
	var featureOpts = [
		{
			stylers: [
	        	{ hue: '#0192ce' },
				{ gamma: 0.5 },
				{ weight: 0.5 }
			]
	    },
	    {
	    	featureType: 'water',
	    	stylers: [
	        	{ color: '#0192ce' }
			]
	    }
	];
	
	var mapOptions = {
    	zoom: 15,
		center: sanfran,
		disableDefaultUI: true,
		mapTypeControlOptions: {
			mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
		},
		mapTypeId: MY_MAPTYPE_ID
	};

  map = new google.maps.Map(document.getElementById('sanfran-map'),
      mapOptions);

  var styledMapOptions = {
    name: 'Custom Style'
  };

  var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

  map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
  
  var request = {
    reference: 'CoQBfQAAADRczvjEVpG_c6YDhklJqkDdagoyyW0V2ZLwFJ3ZBdzZo-WeAs0OlqDSq-pLpDYiJJVqMBH-hUb9QUbhXooNMDl-zB8JQbsz9eGg3OF8dTBXntAbccw07IG9Jy270WLe95IADdEiLb8SAA9EhXx7KvXumiCbrU32BdcobS_hfzkFEhCidWwYfJ-xvfOoRp0JcCZ7GhS74FEdEVuxxb4Gb9TsKgKn-jjJ6Q'
  };

  var infowindow = new google.maps.InfoWindow();
  var service = new google.maps.places.PlacesService(map);

  google.maps.event.addListener(sanfran, 'click', function() {
    infowindow.setContent('<h3 style="color:#ff3d3d; margin:0; padding:0 0 .125em 0;">Adobe Headquarters</h3><p style="margin:0; padding:0;"><a style="color:#0192ce; text-decoration:none;"href="https://goo.gl/maps/oXVoF">View on Google Maps</a></p>' ) ;
    infowindow.open(map, this);
  });
}

google.maps.event.addDomListener(window, 'load', initialize);