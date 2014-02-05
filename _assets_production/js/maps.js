var map_sf;
var map_chi;

var sanfran = new google.maps.LatLng(37.771125, -122.401663);
var chicago = new google.maps.LatLng(41.88335, -87.628633);
 
var MY_MAPTYPE_ID = 'custom_style';
 
function initialize() {
 
  var featureOpts_sf = [{stylers: [{ hue: '#0192ce' },{ gamma: 0.5 },{ weight: 0.5 }]},{featureType: 'water',stylers: [{ color: '#0192ce' }]}];

  var mapOptions_sf = {
    zoom: 15,
    center: sanfran,
    disableDefaultUI: true,
    mapTypeControlOptions: {
      mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
    },
    mapTypeId: MY_MAPTYPE_ID
  };

  map_sf = new google.maps.Map(document.getElementById('sanfran-map'), mapOptions_sf);

  var sf_info = '<h3 style="color:#ff3d3d; margin:0; padding:0 0 .125em 0;">Adobe Headquarters</h3><p style="margin:0; padding:0;"><a style="color:#0192ce; text-decoration:none;"href="https://goo.gl/maps/oXVoF">View on Google Maps</a></p>';

  var infowindow_sf = new google.maps.InfoWindow({content: sf_info});

  var marker_sf = new google.maps.Marker({position: sanfran, map: map_sf, title: 'Adobe', icon: 'wp-content/themes/Hike/_assets_production/images/pin-sanfran.png'});

  google.maps.event.addListener(marker_sf, 'click', function(){
  	infowindow_sf.open(map_sf, marker_sf);
  });

  var styledMapOptions_sf = { name: 'Custom Style' };

  var customMapType_sf = new google.maps.StyledMapType(featureOpts_sf, styledMapOptions_sf);

  map_sf.mapTypes.set(MY_MAPTYPE_ID, customMapType_sf);




 
  var featureOpts_chi = [{stylers: [{ hue: '#06a84f' },{ gamma: 0.5 },{ weight: 0.5 }]},{featureType: 'water',stylers: [{ color: '#06a84f' }]}];

  var mapOptions_chi = {
    zoom: 15,
    center: chicago,
    disableDefaultUI: true,
    mapTypeControlOptions: {
      mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
    },
    mapTypeId: MY_MAPTYPE_ID
  };

  map_chi = new google.maps.Map(document.getElementById('chicago-map'), mapOptions_chi);

  var chi_info = '<h3 style="color:#ff3d3d; margin:0; padding:0 0 .125em 0;">Morning Star Inc.</h3><p style="margin:0; padding:0;"><a style="color:#0192ce; text-decoration:none;"href="https://goo.gl/maps/Giw86">View on Google Maps</a></p>';

  var infowindow_chi = new google.maps.InfoWindow({content: chi_info});

  var marker_chi = new google.maps.Marker({position: chicago, map: map_chi, title: 'Morning Star', icon: 'wp-content/themes/Hike/_assets_production/images/pin-chi.png'});

  google.maps.event.addListener(marker_chi, 'click', function(){
  	infowindow_chi.open(map_chi, marker_chi);
  });
 
  var styledMapOptions_chi = { name: 'Custom Style' };
 
  var customMapType_chi = new google.maps.StyledMapType(featureOpts_chi, styledMapOptions_chi);
 
  map_chi.mapTypes.set(MY_MAPTYPE_ID, customMapType_chi);

}
 
google.maps.event.addDomListener(window, 'load', initialize);